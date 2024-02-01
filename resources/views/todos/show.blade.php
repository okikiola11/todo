@extends('layouts.app')

@section('dashcontent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <b> {{$todo -> title}} </b>
                    <b> {{$todo -> description}} </b>
                </div>
            </div> -->













            









                <!-- @extends('layouts.layout')

@section('layoutContent') -->

<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Ashish S. Maharjan" />
    <meta name="robots" content="index, follow" />

    <link
      rel="manifest"
      href="https://asis2016.github.io/bootstrap-5-admin-template/manifest.json"
    />
    <meta
      name="description"
      content="adminAM - Bootstrap 5 Admin Template with Dashboard Demo"
    />
    <meta
      name="keywords"
      content="adminAM, Bootstrap 5.3.2, HTML, CSS, SASS, JavaScript, Admin template, Dashboard template"
    />
    <!-- for PWA -->
    <meta name="theme-color" content="white" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Hello World App" />
    <meta
      name="msapplication-TileImage"
      content="{{ asset('static/img/favicons/android-chrome-192x192.png') }}"
    />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    
    <title>Todo Template | Dashboard</title>
    <!-- <meta http-equiv="refresh" content="5"/> -->

    <!-- CSS -->
    <link href="{{ asset('static/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('static/css/style.css') }}" rel="stylesheet" />

    <!-- Favicons -->
    <link href="{{ asset('static/css/app.css') }}" rel="stylesheet">
    <link
      rel="apple-touch-icon"
      href="{{ asset('static/img/favicons/apple-touch-icon.png') }}"
      sizes="120x120"
    />
    <link
      rel="icon"
      href="{{ asset('static/img/favicons/favicon-32x32.png') }}"
      sizes="32x32"
      type="image/png"
    />
    <link
      rel="icon"
      href="{{ asset('static/img/favicons/favicon-16x16.png') }}"
      sizes="16x16"
      type="image/png"
    />
    <link rel="icon" href="{{ asset('static/img/favicons/favicon.ico') }}" />

    <!-- jvectormap -->
    <link
      rel="stylesheet"
      href="{{ asset('static/css/jquery-jvectormap-2.0.5.css') }}"
      type="text/css"
      media="screen"
    />

    <!-- google sitemap -->
    <meta
      name="google-site-verification"
      content="QI5mxFBO2xqf2NLOetb1-a68pb2gXVZpWgBnWKIN8RQ"
    />
  </head>

  <body>
    <div class="wrapper d-flex h-100">
      <!-- #mainSidebar -->

      <nav id="mainSidebar" class="h-100">
        <div class="d-flex flex-column flex-shrink-0 p-3">
          <!-- first a -->
          <div
            class="d-flex align-items-center justify-content-between mb-3 mb-md-0 me-md-auto w-100"
          >
            <!-- logo for LG screen -->
            <span class="fs-4 logo-lg only-d-lg">
              <a href="index.html">
                <img src="{{ asset('static/img/logo-100x25.png') }}" alt="" />
              </a>
            </span>
            <!-- logo for SM screen -->
            <span class="fs-4 logo-sm only-d-sm">
              <img src="{{ asset('static/img/logo-40x25.png') }}" alt="" />
            </span>
            
            <!-- for SM screen - close -->
            <span class="d-none" id="sidebarUntoggleBtn">
              <i class="bi bi-x-circle-fill"></i>
            </span>
          </div>
          <!-- first a ends -->
          <hr />
          <ul class="nav nav-pills flex-column mb-auto">
            <!-- accounts -->
            <p class="mt-2 mb-1 text-secondary text-small">DASHBOARD</p>
            <li class="nav-item">
              <a href="index.html" class="nav-link active" aria-current="page">
                <i class="bi bi-house-door-fill me-2"></i>
                Home
              </a>
            </li>
            <!-- products -->
            <p class="mt-2 mb-1 text-secondary text-small">Todos</p>
            <li>
              <a href="products/index.html" class="nav-link">
                <i class="bi bi-table me-2"></i>
                Todos
              </a>
            </li>
            <li>
              <a href="sales/index.html" class="nav-link">
                <i class="bi bi-bank me-2"></i>
                Create Todo
              </a>
            </li>
            <li>
              <a href="expenses/index.html" class="nav-link">
                <i class="bi bi-receipt me-2"></i>
                View Todo
              </a>
            </li>

            <!-- accounts -->
            <p class="mt-2 mb-1 text-secondary text-small">ACCOUNTS</p>
            <li>
              <a href="accounts/login/index.html" class="nav-link">
                <i class="bi bi-box-arrow-right me-2"></i>
                Sign in
              </a>
            </li>
            <li>
              <a href="profile/index.html" class="nav-link">
                <i class="bi bi-person-circle me-2"></i>
                My Profile
              </a>
            </li>
            <li>
              <a href="accounts/registration/index.html" class="nav-link">
                <i class="bi bi-at me-2"></i>
                Registration
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- #mainSidebar ends -->

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


          <!-- For messenger, and order status -->
          <div class="row">
            
            <div class="col-lg-9">
              <div class="card mt-4 sm-mt-3">
                <div class="card-body table-responsive">
                  <h6 class="card-title">Todo Status</h6>
                  <div class="table-responsive">
                    <table class="table overflow-scroll table-hover">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Task</th>
                          <th>Todos</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <input class="form-check-input" type="checkbox" />
                          </td>
                          <td class="d-flex align-items-center">
                            <span class="nameInitial">JD</span>&nbsp;&nbsp;John
                            Doe
                          </td>
                          <td>{{$todo -> title}}</td>
                          <td>{{$todo -> description}}</td>
                          <!-- <td>
                            <div class="badge badge-outline-success">
                              Approved
                            </div>
                          </td> -->
                        </tr>

                      </tbody>
                    </table>
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

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- bootstrap.bundle.min.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jvectormap -->
    <script src="{{ asset('static/js/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('static/js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- ploty -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <!-- script.js -->
    <script src="{{ asset('static/js/script.js') }}"></script>

    <script src="{{ asset('static/js/dashboard.js') }}"></script>
    <script src="{{ asset('static/js/user-demographics.js') }}"></script>
  </body>
</html>

@endsection



















        </div>
    </div>
</div>
@endsection
