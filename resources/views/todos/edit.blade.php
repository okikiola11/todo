@extends('layouts.dashboard')

@section('dashcontent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Todos Form') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('todos.update') }}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="todo_id" value="{{ $todo -> id}}" />
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="title"
                            value="{{ $todo->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" cols="5" rows="5" required
                            >{{ $todo->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deadline</label>
                            <input class="form-control" type="date" name="deadline" value="{{ $todo->deadline }}" id="deadline" />
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="is_completed" class="form-control" required>
                                <option disabled selected> Select Option </option>

                                @foreach ($options as $option)
                                    <option value="{{ $option['value'] }}" {{ $todo->is_completed == $option['value'] ? 'selected' : '' }}>{{ $option['label'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" onclick="updateTodo()">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function updateTodo() {
        console.log('hello there =====');
        // $.ajax({
        //     type: "post",
        //     url: "todos/update",
        //     data: "data",
        //     dataType: "dataType",
        //     success: function (response) {
        //         if (response.status == 200) {
        //             console.log(response, '-----------display res=======');
        //         }
        //     }
        // });
    }
</script>
