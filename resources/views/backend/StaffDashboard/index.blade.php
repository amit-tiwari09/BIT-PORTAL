@if(Auth::guard('staff')->check())

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/material-dashboard/pages/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Oct 2024 17:07:08 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
  <title>
    @yield('title', 'Staff Dashboard')
  </title>


  <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard" />

  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, Material Dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, free dashboard, free admin dashboard, free bootstrap 5 admin dashboard">
  <meta name="description" content="Material Dashboard 2 is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">


  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />

  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <link id="pagestyle" href="{{asset('assets/css/material-dashboard.mine63c.css?v=3.1.0')}}" rel="stylesheet" />

  <style>
    .async-hide {
      opacity: 0 !important
    }

    .graph-container {
      width: 100%;
      max-width: 600px;
      height: 300px;
      /* Set a fixed height */
      margin: 20px auto;
    }
  </style>

</head>

<body class="g-sidenav-show  bg-gray-200">




  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{route('home')}}" target="_blank">
        <img src="{{asset('assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">BIT</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a id="dashboardLink" class="nav-link text-white {{ request()->routeIs('dashboard.graph') ? 'active bg-gradient-primary' : '' }}" href="{{ route('dashboard.graph') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard1</span>
          </a>

        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ request()->routeIs('site-settings.edit') ? 'active bg-gradient-primary' : '' }}" href="{{ route('site-settings.edit') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Site Setting</span>
          </a>

        </li>

        <!-- admin.view -->
        <li class="nav-item">
          <a class="nav-link text-white {{ request()->routeIs('admin.view') ? 'active bg-gradient-primary' : '' }}  {{ request()->routeIs('applicants.details') ? 'active bg-gradient-primary' : '' }} " href="{{route('applicants.details')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Applicant</span>

          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ request()->routeIs('events.index') ? 'active bg-gradient-primary' : '' }}  {{ request()->routeIs('events.create') ? 'active bg-gradient-primary' : '' }} {{ request()->routeIs('events.show') ? 'active bg-gradient-primary' : '' }} {{ request()->routeIs('events.edit') ? 'active bg-gradient-primary' : '' }} " href="{{route('events.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Events</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ request()->routeIs('gallery.index') ? 'active bg-gradient-primary' : '' }}  {{ request()->routeIs('gallery.create') ? 'active bg-gradient-primary' : '' }}  {{ request()->routeIs('gallery.edit') ? 'active bg-gradient-primary' : '' }}   {{ request()->routeIs('category.create') ? 'active bg-gradient-primary' : '' }}" href="{{route('gallery.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Gallery</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white   {{ request()->routeIs('studentpayment.status') ? 'active bg-gradient-primary' : '' }}" href="{{route('studentpayment.status')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">payment</i>
            </div>
            <span class="nav-link-text ms-1">Payments & Fees</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ request()->routeIs('staff.show') ? 'active bg-gradient-primary' : '' }} {{ request()->routeIs('staff.edit') ? 'active bg-gradient-primary' : '' }} " href="{{route('staff.show')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>

      </ul>
    </div>

    </div>
  </aside>




  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">


        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <a class="btn btn-outline-primary btn-sm mb-0 me-3 {{ request()->routeIs('blog.index') ? 'active bg-gradient-primary' : '' }}" href="{{route('blog.index')}}">Blog editor</a>
          </li>


          <li class="nav-item px-3 d-flex align-items-center">
            <a href="{{route('settings')}}" class="nav-link text-body p-0">
              <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </a>
          </li>
          
          <li class="nav-item d-flex align-items-center">
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
              @csrf <!-- Include the CSRF token -->
              <button style="border: none; outline:none;" type="submit" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Logout</span>
              </button>
            </form>
          </li>

        </ul>
      </div>
      </div>
    </nav>




    <div class="container-fluid py-4">



      @yield('content')
      @yield('blog')
      @yield('applicants')
      @yield('applicantsview')
      @yield('settings')
      @yield('events')
      @yield('createevent')
      @yield('editevent')
      @yield('showevent')
      @yield('gallery')
      @yield('studentPayment')
      @yield('feestructure')
      @yield('feeedit')
      @yield('feecreate')
      @yield('editgallery')
      @yield('galleryCategory')
      @yield('createsec')
      @yield('showprofilestaff')
      @yield('staffedit')

      @yield('expenditure')
      @yield('dashboard')
      @yield('createexpense')
      @yield('indexexpense')
      @yield('showexpense')
      @yield('jobVacancy')
      

    </div>
  </main



    <script src="{{asset('assets/js/core/popper.min.js')}}">
  </script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>




  <script src="{{asset('assets/js/material-dashboard.mine63c.js?v=3.1.0')}}"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8d525cd31cda9e7a","version":"2024.10.1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"1b7cbb72744b40c580f8633c6b62637e","b":1}' crossorigin="anonymous"></script>
</body>

</html>

@endif