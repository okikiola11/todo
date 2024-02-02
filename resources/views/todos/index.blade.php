@extends('layouts.dashboard')

@section('dashcontent')

    <!-- table -->
          <div class="row sm-pt-0">
            <div class="col">
              <div class="card">
                <div class="card-body table-responsive">
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


                    @if (count($todos) > 0)
                    <table class="table overflow-scroll table-hover">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Title</th>
                            <th>Description</th>
                            <th>Completed</th>
                            <!-- <th>Date</th> -->
                            <th>Actions</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($todos as $todo)
                        
                        <tr>
                          <td>
                            <input
                              class="form-check-input"
                              type="checkbox"
                              value=""
                              id="flexCheckDefault"
                            />
                          </td>
                          <td class="d-flex align-items-center">
                            <img
                              src="https://placehold.co/50x50.png"
                              class="productImg me-2"
                              alt=""
                            />
                            {{ $todo->title }}
                          </td>
                          <td>{{ $todo->description }}</td>
                          <td>
                            {!!
                                $todo->is_completed == 1 ? '<a class="btn btn-sm btn-success" href="#">Completed</a>' 
                                                        : '<a class="btn btn-sm btn-danger" href="#">Incomplete</a>' 
                            !!}
                          </td>
                          <td>
                            <a
                            href="{{ route('todos.show', $todo -> id) }}"
                              class="amj-a me-2"

                            >
                              <i class="bi bi-link-45deg"></i>
                            </a>
                            <a
                              href="{{ route('todos.edit', $todo) }}"
                              class="amj-a me-2"
                            >
                              <i class="bi bi-pencil-square"></i>
                            </a>
                            
                            <form method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="todo_id" value="{{ $todo -> id }}" />
                                <input type="submit" class="badge badge-outline-warning" value="Delete" />
                                <a
                                    href="index.html#"
                                    class="amj-a me-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteConfirmation"
                                    >
                                    <i class="bi bi-trash"></i>
                                </a>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                
                    <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center my-3">
                    {{ $todos->onEachSide(1)->links() }}
                    </ul>
                    </nav>
                    @else
                        <h4>No todos</h4>
                    @endif

                  </div>

                  <!-- pagination -->
                  <style></style>
                  <!-- <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center my-3">
                      <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="index.html#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="index.html#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="index.html#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="index.html#">Next</a>
                      </li>
                    </ul>
                  </nav> -->



                  <!-- pagination ends -->
                </div>
              </div>
            </div>
          </div>
    <!-- table ends -->
 
@endsection

