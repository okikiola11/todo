@extends('layouts.dashboard')

@section('dashcontent')
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet" />
    <style>
        .hidden {
            display: none;
        }
    </style>

    <div class="row sm-pt-0">
        <div class="col">
            <div class="card">
                <div class="card-bo dy table-responsive">
                    <div class="table-responsive">

                        @if (Session::has('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('alert-success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif


                        {{-- @if ($todos . length >= 1) --}}
                        <table class="table overflow-scroll table-hover" id="todo-tbl">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $todo)
                                    <tr id="taskID-{{$todo->id  }}">
                                        <td class="index-column" id='todoID'>{{ $loop->iteration }}</td>
                                        {{-- <td class="hidden">{{ $todo->id }}</td> --}}
                                        <td>
                                            <input class="form-check-input" type="checkbox" value="{{ $todo->id }}" name="todoID[]"
                                                onclick="strikeData({{ $todo->id }})" />
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <img src="https://placehold.co/50x50.png" class="productImg me-2"
                                                alt="" />
                                            {{ $todo->title }}
                                        </td>
                                        <td>{{ $todo->description }}</td>
                                        <td>{{ $todo->deadline }}</td>
                                        <td>
                                            {!! $todo->is_completed == 1
                                                ? '<a class="btn btn-sm btn-success" href="#">Completed</a>'
                                                : '<a class="btn btn-sm btn-danger" href="#">Incomplete</a>' !!}
                                        </td>
                                        <td class="red">
                                            <a href="{{ route('todos.show', $todo->id) }}" class="amj-a me-2">
                                                <i class="bi bi-link-45deg"></i>
                                            </a>
                                            <a href="{{ route('todos.edit', $todo) }}" class="amj-a me-2">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            {{-- <form method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="todo_id" value="{{ $todo->id }}" />
                                                <input type="submit" class="badge badge-outline-warning" value="Delete" />
                                                <a href="/todos/{{ $todo->id }}/destroy" class="amj-a me-2">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script-section')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
        // $(document).ready(function() {
            $('#todo-tbl').DataTable({
                // Your DataTable options here
            });
        // });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function strikeData(id) {
            console.log(id, '======= no records ------');

            var selectedTaskIDs = [];

            $('input:checkbox[name="todoID[]"]:checked').each(function() {
                selectedTaskIDs.push($(this).val());
            });
            console.log(selectedTaskIDs, 'display task id');

            if (selectedTaskIDs.length === 0) {
                alertify.error('Please select at least one record to complete.');
                return;
            }


            $.ajax({
                url: '/completeTodo',
                type: 'POST',
                data: {
                    todoId: selectedTaskIDs,
                },
                success: function(response) {
                    console.log(response, '-------- response ------====');
                    console.log(response.results, '====== result ---------');
                    selectedTaskIDs.forEach(function(todoID) {
                        $("#taskID-" + todoID).fadeOut('slow', function() {
                            $(this).remove();

                             // Reassign indexes
                            $('#todo-tbl tbody tr').each(function(index) {
                                $(this).find('td.index-column').html(index + 1);
                            });
                        });
                    });
                    // $("#taskID" + billID).hide();
                    // alertify.success('Todo has been completed successfully');
                },
                error: function(xhr, status, error) {
                    // alertify.error('Error completing todo task', error);
                }
            });
        }
    </script>
@endsection

