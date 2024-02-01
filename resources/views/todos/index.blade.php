@extends('layouts.dashboard')

@section('dashcontent')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if (Session::has('alert-success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                    
                    @if (count($todos) > 0)
                        <table class="table caption-top"> -->
                            <!-- <caption>List Todos</caption> -->

                            <!-- <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Completed</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $todo)
                                    <tr>
                                        <td> {{ $todo->title }}</td>
                                        <td>{{ $todo->description }}</td>
                                        <td>
                                            {!!
                                                $todo->is_completed == 1 ? '<a class="btn btn-sm btn-success" href="#">Completed</a>' 
                                                                        : '<a class="btn btn-sm btn-danger" href="#">Incomplete</a>' 
                                            !!}
                                        </td>
                                        <td id="outer">
                                            <a class="d-inline" href="{{ route('todos.show', $todo -> id) }}">View</a>
                                            <a class="d-inline" href="">Edit</a>
                                            <form action="">
                                                <input type="hidden" name="todo_id" value="{{ $todo -> id }}" />
                                                <input type="submit" class="btn-danger" value="Delete" />
                                            </form>
                                        </td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4>No todos</h4>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div> -->




































<!-- @extends('layouts.layout')

@section('layoutContent') -->


    <div class="wrapper d-flex h-100">

      <!-- #pageContent -->
      <div id="pageContent" class="d-flex flex-column">
        <!-- topnav -->

        <div id="topNavigation" class="px-3 py-2">
          <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
              <!-- nav-left, breadcrumb -->
              <a
                href="index.html#"
                class="nav-left d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none"
              >
                <i class="bi bi-list" id="sidebarToggleBtn"></i>
              </a>

              <div class="d-flex justify-content-end align-items-center">
                <!-- search form -->
                <form
                  class="col-xl-4 col-md-auto col-lg-auto mb-0 me-xl-3"
                  role="search"
                >
                  <div class="input-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="search here"
                    />
                    <a class="btn" href="search-results/index.html">
                      <i class="bi bi-search"></i>
                    </a>
                  </div>
                </form>

                <!-- nav-right -->
                <div class="nav-right col-md-auto col-lg-auto my-2">
                  <!-- nav -->
                  <ul class="nav">
                    <!-- Home icon for sm screen -->
                    <li class="only-d-sm">
                      <a href="index.html" class="nav-link text-white">
                        <i class="bi bi-house-door-fill"></i>
                      </a>
                    </li>

                    <!-- Email -->
                    <li>
                      <a href="mail/index.html" class="nav-link text-white">
                        <i class="bi bi-envelope">
                          <span
                            class="position-absolute top-0 start-100 translate-middle p-1 bg-info rounded-circle"
                          >
                            <span class="visually-hidden">New alerts</span>
                          </span>
                        </i>
                      </a>
                    </li>
                    <!-- notification -->
                    <li>
                      <a
                        href="index.html#"
                        class="nav-link text-white"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <i class="bi bi-bell">
                          <span
                            class="position-absolute top-0 start-100 translate-middle p-1 bg-info rounded-circle"
                          >
                            <span class="visually-hidden">New alerts</span>
                          </span>
                        </i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                          <a class="dropdown-item" href="messenger/index.html">
                            <small
                              ><i class="bi bi-envelope me-2"></i>10 new
                              messages</small
                            >
                          </a>
                        </li>
                        
                      </ul>
                    </li>
                    <!-- for profile page -->
                    <li>
                      <a
                        href="index.html#"
                        class="nav-link text-white"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <i class="bi bi-person-circle"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                          <a class="dropdown-item" href="profile/index.html">
                            <small>
                              <i class="bi bi-person-fill me-2"></i>My Profile
                            </small>
                          </a>
                        </li>
                        <!-- <hr class="my-1"> -->
                        <div class="divider my-1"></div>
                        <li>
                          <a
                            class="dropdown-item"
                            href="accounts/login/index.html"
                          >
                            <small>
                              <i class="bi bi-box-arrow-right me-2"></i>Sign out
                            </small>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <!-- for modal applications -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- topnav ends -->

        <div class="container-fluid px-4">
          <!-- section searchForMobile -->
          <div class="row my-4 sm-my-3 sm-mt-0" id="searchForMobile">
            <div class="col">
              <form>
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control form-control-dark text-bg-dark text-white"
                    value="search here"
                  />
                  <a class="btn" href="search-results/index.html">
                    <i class="bi bi-search"></i>
                  </a>
                </div>
              </form>
            </div>
          </div>
          <!-- section searchForMobile ends -->

          <!-- main_content -->

          <!-- page title -->
          <div class="pageTitle pt-3 pb-3 md-pt-0">
            <h3 class="md-mb-0">Dashboard</h3>
            <div class="btn-toolbar mb-2">
              <div class="btn-group me-2">
                
                <a href="{{ url() -> previous() }}" type="button" class="btn btn-sm btn-outline-secondary">
                  Back
                </a>
              </div>
              <button
                type="button"
                class="btn btn-sm btn-outline-secondary dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <span data-feather="calendar"></span>
                More options
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="index.html#">
                    <small>
                      <i class="bi bi-1-square me-2"></i>
                      Option one
                    </small>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="index.html#">
                    <small>
                      <i class="bi bi-2-square me-2"></i>
                      Option two
                    </small>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- page title ends -->

          <!-- For messenger, and order status -->
          <div class="row">
            
            <div class="col-lg-9">
              <div class="card mt-4 sm-mt-3">
                <div class="card-body table-responsive">
                  <h6 class="card-title">Todo Status</h6>
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Completed</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                            @foreach ($todos as $todo)
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" />
                                    </td>
                                    <td class="d-flex align-items-center"> {{ $todo->title }}</td>
                                    <td>{{ $todo->description }}</td>
                                    <td>
                                        {!!
                                            $todo->is_completed == 1 ? '<a class="btn btn-sm btn-success" href="#">Completed</a>' 
                                                                    : '<a class="btn btn-sm btn-danger" href="#">Incomplete</a>' 
                                        !!}
                                    </td>
                                    <td id="outer">
                                        <a class="d-inline badge badge-outline-success"
                                            href="{{ route('todos.show', $todo -> id) }}"
                                        > View
                                        </a>
                                        <a class=" badge badge-outline-success" 
                                            href="{{ route('todos.edit', $todo -> id) }}"
                                        >   Edit
                                        </a>
                                        <form action="">
                                            <input type="hidden" name="todo_id" value="{{ $todo -> id }}" />
                                            <input type="submit" class="badge badge-outline-warning" value="Delete" />
                                        </form>
                                    </td>
                                </tr> 
                            @endforeach

                      </tbody>
                    </table>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- main_content ends -->
        </div>

        <!-- footer -->
        <!-- divider for footer -->
        <div class="mt-4 sm-mt-3"></div>
        <!-- divider for footer ends -->
        <footer class="py-3 mt-auto container-fluid">
          <div class="row">
            <div class="col text-small">
              <span class="mb-3 mb-md-0">© 01-02 | 2024</span>
            </div>
            
          </div>
        </footer>
        <!-- footer ends -->
      </div>
      <!-- #pageContent ends -->
    </div>

    <!-- modal for application -->
    <div class="modal" id="modalApplication" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h6 class="modal-title">All Applications</h6>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

          <!-- todo -->
          <div class="modal-body modal-body-sm">
            <ul class="list-group">
              <li class="list-group-item">
                <a href="index.html#" class="amj-a">
                  <i class="bi bi-door-open"></i>
                  Authentication
                </a>
              </li>

              <li class="list-group-item">
                <a href="index.html#" class="amj-a">
                  <i class="bi bi-person-badge"></i>
                  Profile
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- modal for application ends -->

    
@endsection

