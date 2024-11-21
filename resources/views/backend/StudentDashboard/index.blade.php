<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.bootstrapdash.com/star-admin2-free/template/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 05:25:21 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Dashboard </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs4/dataTables.bootstrap4.html')}}">
    <link rel="stylesheet" href="{{asset('js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <script src="https://kit.fontawesome.com/c9cb99f12f.js" crossorigin="anonymous"></script>
</head>


<body>

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">

            </div>
            <div>
                <a class="navbar-brand brand-logo" href="{{route('home')}}">
                    <span>BIT</span>
                </a>

            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Welcome, <span class="text-black fw-bold">{{session('student')->name}}</span></h1>




                </li>
            </ul>
            <ul class="navbar-nav ms-auto">




                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bell"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                        <a class="dropdown-item py-3">

                            <span class="badge badge-pill badge-primary float-right">View all</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow py-2">
                                <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow py-2">
                                <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                            </div>
                        </a>

                    </div>
                </li>


                <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="{{asset('pictures/'.session('student')->image)}}" alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle" style="height: 30px; width:30px" src="{{asset('pictures/'.session('student')->image)}}" alt="Profile image">
                            <p class="mb-1 mt-3 font-weight-semibold">{{session('student')->name}}</p>
                            <p class="fw-light text-muted mb-0">{{session('student')->email}}</p>
                        </div>
                        <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Edit Profile <span class="badge badge-pill badge-danger">1</span></a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                        <form action="{{route('logout.student')}}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</button>
                        </form>
                    </div>
                </li>
            </ul>


            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>



    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <div class="theme-setting-wrapper">

        </div>




        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">




                <li class="nav-item">
                    <form class="nav-link" data-bs-toggle="collapse" action="{{route('payments.status')}}">

                        <i class="fa-solid fa-gauge  menu-icon "></i>
                        <button type="submit" style="border: none; outline:none; background:transparent;" class="menu-title">Dashboard</button>
                        <i class="menu-arrow"></i>
                    </form>
                </li>

                <li class="nav-item">
                    <form class="nav-link" data-bs-toggle="collapse" action="{{route('payments.status')}}">

                        <i class="fa-solid fa-money-check menu-icon"></i>
                        <button type="submit" style="border: none; outline:none; background:transparent;" class="menu-title">payemnt</button>
                        <i class="menu-arrow"></i>
                    </form>

                </li>
                <li class="nav-item">
                    <form class="nav-link" data-bs-toggle="collapse" action="{{route('blog.index3')}}">

                    <i class="fa-solid fa-blog menu-icon"></i>
                        <button type="submit" style="border: none; outline:none; background:transparent;" class="menu-title">Blogs</button>
                        <i class="menu-arrow"></i>
                    </form>

                </li>

                <li class="nav-item">
                    <form class="nav-link" data-bs-toggle="collapse" action="{{route('events.index3')}}">

                    <i class="fa-regular fa-calendar-days menu-icon"></i>
                        <button type="submit" style="border: none; outline:none; background:transparent;" class="menu-title">events</button>
                        <i class="menu-arrow"></i>
                    </form>

                </li>

                <li class="nav-item">
                    <form class="nav-link" data-bs-toggle="collapse" action="{{route('gallery.student')}}">

                    <i class="fas fa-images menu-icon"></i>

                        <button type="submit" style="border: none; outline:none; background:transparent;" class="menu-title">Galleries</button>
                        <i class="menu-arrow"></i>
                    </form>

                </li>




            </ul>
        </nav>
        <!-- partial -->


        <div class="main-panel">
            <div class="content-wrapper">
                @yield('paymentStats')
                @yield('profiledit')
                @yield('blog')
                @yield('blogedit')
                @yield('createblog')
                @yield('event')
                @yield('gallery')
                @yield('paymentcrete')

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('vendors/progressbar.js/progressbar.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>

    <!-- End custom js for this page-->
</body>


<!-- Mirrored from demo.bootstrapdash.com/star-admin2-free/template/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 05:25:31 GMT -->

</html>