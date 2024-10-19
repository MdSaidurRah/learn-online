<!DOCTYPE html>
<html lang="en">

<head>
    <title>IUICMS | Dashboard System</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <link rel="icon" href="{{url('/assets/images/favicon.ico')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{url('/assets/lib/bootstrap/4.1.1/css/bootstrap.min.css')}}"  id="bootstrap-css">
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/assets/lib/datatable/jquery.dataTables.css')}}" >
    <link rel="stylesheet" href="{{url('/custom/css/common.css')}}">

    <style>
        .error
        {
            color:orangered;
        }
    </style>



</head>

<body class="">

<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>

<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{url('/uploads/images/persons/dummy-person-photo.png')}}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>{{ session('userName') }}</span>
                        <div id="more-details">
                            {{ session('userRole') }}
                            <i class="fa fa-chevron-down m-l-5"></i>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link" >
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="{{url('/userprofile/user-profile')}}"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="{{url('/userprofile/password-change')}}"><i class="feather icon-settings m-r-5"></i>Password Change</a></li>
                        <li class="list-group-item"><a href="{{url('/sign-out')}}"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar " >

                @if(session('userRole')=="Admin")
                    <li class="nav-item pcoded-menu-caption">
                        <label>Admin Navigation</label>
                    </li>

                    </li>
                    <li class="nav-item">
                        <a href="{{url('/dashboard')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>


                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">User Management</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{url('/user/all-user')}}">All Users</a></li>
                            <li><a href="{{url('/configurations/role-permission')}}">Role & Permission</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Quiz</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{url('/quiz/question')}}">Question </a></li>
                            <li><a href="{{url('/quiz/answerkey')}}">Answer </a></li>
                        </ul>
                    </li>
                    
                @elseif(session('userRole')=="User")
               

                
                @endif
            </ul>

        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">


    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="{{url('assets/images/logo.png')}}" alt="" class="logo">
            <img src="{{url('assets/images/logo-icon.png')}}" alt="" class="logo-thumb">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse" style="background: #ffffff">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
            <li class="">
                <a href="{{url('system-monitoring/clear-cache')}}" class="btn btn-outline-success btn-sm"><i class="fas fa-tasks"></i> Clear Cache</a>
            </li>
            <li class="">
                <a href="http://127.0.0.1:8000/" target="_blank" class="btn btn-outline-success btn-sm"><i class="fas fa-globe"></i> Website</a>
            </li>
            <li class="">
                <a href="{{url('logs')}}" target="_blank" class="btn btn-outline-danger btn-sm"><i class="fas fa-exclamation-triangle"></i> Error Logs</a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="icon feather icon-bell"></i>
                        <span class="badge badge-pill badge-danger">5</span>
                    </a>

                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{url('/uploads/images/persons/dummy-person-photo.png')}}" class="img-radius" alt="User-Profile-Image">
                            <span>{{session('userName')}}</span>
                            <a href="{{url('sign-out')}}" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="{{url('sign-out')}}" class="dropdown-item"><i class="feather icon-mail"></i> Logout</a></li>

                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>


</header>
<!-- [ Header ] end -->



<!-- [ Main Content ] start -->


<div class="pcoded-main-container">
    <div class="pcoded-content">


        @yield('page-content')

        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade
        <br/>to any of the following web browsers to access this website.
    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (11 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->


<!-- Required Js -->
<script src="{{url('/assets/js/jquery.js')}}"></script>
<script src="{{url('/assets/js/vendor-all.min.js')}}"></script>
<script src="{{url('assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/pcoded.js')}}"></script>

<!-- Apex Chart -->
<script src="{{url('assets/js/plugins/apexcharts.min.js')}}"></script>


<!-- custom-chart js -->
<script src="{{url('/assets/js/pages/dashboard-main.js')}}"></script>

<!-- Data table -->
<script src="{{url('/assets/lib/datatable/jquery.dataTables.js')}}"></script>
{{--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
<!-- Validation -->
<script src="{{url('/assets/lib/jquery-validate/1.19.0/jquery.validate.min.js')}}"></script>



</body>
@yield('page-script')


</html>
