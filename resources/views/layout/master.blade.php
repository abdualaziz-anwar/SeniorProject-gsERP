<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
        <title>Petroleum Management System</title>

    </head>

    <body>
        <div class="d-flex" id="wrapper">
            {{-- sidebar Options on the left --}}
            <div class="Sidebar" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                    <img src="{{asset('images/whitelogo.png')}}" alt="" class="img-fluid" width="80px"></i>PMS

                </div>
                <div class="list-group list-group-flush my-3">
                    {{-- TDOD LATER FOR PAGES --}}
                    <a href="{{route('property-managment')}}"
                        class="list-group-item  {{ $slug == 'property-managment'?'active':'' }}">Property Management</a>

                    <a href="{{route('gsm')}}" class="list-group-item  {{ $slug == 'gsm'?'active':'' }}">GasStation
                        Managment</a>

                    <a href="{{route('leaseholder-management')}}"
                        class="list-group-item {{ $slug == 'leaseholder'?'active':'' }}">LeaseHolders</a>

                    <a href="{{route('contracts')}}"
                        class="list-group-item {{ @$slug == 'contracts'?'active':''}} ">Contracts</a>

                    <a href="/" class="list-group-item">Report Management</a>

                    <a href="/" class="list-group-item">Add Employee Report</a>

                    <a href="{{route('employee-management')}}"
                        class="list-group-item {{ $slug == 'employee'?'active':''}}">Employee Management</a>

                </div>
            </div>
            {{-- ##sidebar Options on the left --}}

            {{-- Page Content --}}
            <div id="page-content-wrapper">
                {{-- burger sign on the left {menu-toggle} --}}
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        {{-- pageTitle yield --}}
                        <h2 class="fs-2 m-0">@yield('pagetitle')</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    {{-- ##burger sign on the left --}}

                    {{-- login&logout options --}}
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i>Admin
                                </a>
                                {{-- TODO logout page --}}
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                {{-- ##login&logout options --}}

                {{-- loading popUp --}}
                <span id="dashboard_loader" style="display: none;">
                    <img src="{{asset('images/loader-3.gif')}}" />
                </span>

                {{-- pageContent --}}
                @yield('pagecontent')

            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('js/script.js')}}"></script>
    </body>

</html>