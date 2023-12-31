
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/assets/plugins/pace/pace.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('dashboard_assets') }}/assets/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/assets/css/custom.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dashboard_assets') }}/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard_assets') }}/assets/images/neptune.png" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     @livewireStyles
    <![endif]-->
</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        <img src="{{ asset('uploads/profile') }}/{{auth()->user()->image}}">
                        <span class="activity-indicator"></span>
                        <span class="user-info-text">{{ auth()->user()->name }}<br><span class="user-state-info">{{ auth()->user()->email }}</span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Apps
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'home') ? 'active-page' : '' }}">
                        <a href="{{ route('home') }}" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'profile.index') ? 'active-page' : '' }}">
                        <a href="{{ route('profile.index') }}" class="active"><i class="material-icons-two-tone">face</i>Profile</a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'index') ? 'active-page' : '' }}">
                        <a href="{{ route('index') }}" target="_blank" class="active"><i class="material-icons-two-tone">web</i>web view</a>
                    </li>
                    @can('author')
                        @can('viewer')
                        <li class="{{ (\Request::route()->getName() == 'role.management') ? 'active-page' : '' }}">
                            <a href="{{ route('role.management') }}" class="active"><i class="material-icons-two-tone">key</i>Role Management</a>
                        </li>
                        @endcan
                    @endcan
                    <li>
                        <a href="mailbox.html"><i class="material-icons-two-tone">inbox</i>Mailbox<span class="badge rounded-pill badge-danger float-end">87</span></a>
                    </li>

                    @if (auth()->user()->role == 'admin')
                        <li class="{{ (\Request::route()->getName() == 'category') ? 'active-page' : '' }}">
                            <a href=""><i class="material-icons-two-tone">star</i>Categories<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('category') }}">Category Show</a>
                                </li>

                            </ul>
                        </li>

                    @endif

                    <li class="{{ (\Request::route()->getName() == 'tags') ? 'active-page' : '' }}">
                        <a href=""><i class="material-icons-two-tone">star</i>Tags<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('tags') }}">Tags Show</a>
                            </li>

                        </ul>
                    </li>

                    <li class="{{ (\Request::route()->getName() == 'blog' || 'blog.insert') ? 'active-page' : '' }}">
                        <a href=""><i class="material-icons-two-tone">star</i>Blog Post<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('blog') }}">Blog Lists</a>
                            </li>
                            <li>
                                <a href="{{ route('blog.insert') }}">Blog Insert</a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons">add</i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                        <li><a class="dropdown-item" href="#">New Workspace</a></li>
                                        <li><a class="dropdown-item" href="#">New Board</a></li>
                                        <li><a class="dropdown-item" href="#">Create Project</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons-outlined">explore</i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                                        <li>
                                            <h6 class="dropdown-header">Repositories</h6>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune iOS
                                                    <span class="badge badge-warning">1.0.2</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune Android
                                                    <span class="badge badge-info">dev</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-btn-item d-grid">
                                            <button class="btn btn-primary">Create new repository</button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    <button class="nav-link active btn btn-danger mt-1" type="submit"><i class="material-icons-two-tone ps-2">
                                        logout
                                        </i>LOGOUT</button>
                                    </form>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
                                </li>
                                <li class="nav-item hidden-on-mobile d-flex">
                                    <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown"><img src="{{ asset('uploads/profile') }}/{{ auth()->user()->image }}" alt=""></a>
                                        <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                                            <li><a class="dropdown-item d-flex flex-colomn" href="{{ route('home') }}"><i class="material-icons-two-tone me-2 " style="font-size: 22px; padding-top:0px !important;">dashboard</i> Dashboard</a></li>
                                            <li><a class="dropdown-item d-flex flex-colomn" href="{{ route('profile.index') }}"><i class="material-icons-two-tone me-2" style="font-size: 22px; padding-top:0px !important;">face</i> Profile</a></li>
                                            {{-- <li><a class="dropdown-item" href="#"><img src="{{ asset('dashboard_assets') }}/assets/images/flags/china.png" alt="">Chinese</a></li> --}}
                                        </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">

                        @yield('content')


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    {{-- <script src="{{ asset('dashboard_assets') }}/assets/plugins/jquery/jquery-3.5.1.min.js"></script> --}}
    <script src="{{ asset('dashboard_assets') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/js/main.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/js/custom.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/js/pages/dashboard.js"></script>
    @yield('footer_content')
    @livewireScripts
</body>
</html>
