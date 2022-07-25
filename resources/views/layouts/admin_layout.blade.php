<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    
    <title>Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../admin_assets/images/favicon.png">
    <link rel="stylesheet" href="../admin_assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../admin_assets/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="../admin_assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
    <link href="../admin_assets/css/style.css" rel="stylesheet">
    <link href="../admin_assets/css/mystyle.css" rel="stylesheet">


<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{route('admin.dashboard')}}" class="brand-logo">
                <img class="logo-abbr" src="../admin_assets/images/logo.png" alt="">
                <img class="logo-compact" src="../admin_assets/images/logo-text.png" alt="">
                <img class="brand-title" src="../admin_assets/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="{{route('admin.profile')}}" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('admin.profile')}}" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    
                                    <a href="{{route('admin.logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li class="nav-label">Main Menu</li> -->
                    
                    
                    <li><a href="{{route('admin.dashboard')}}" aria-expanded="false"><i class="fa fa-list"></i><span class="nav-text">Dashboard</span></a></li>
                    <li><a href="{{route('admin.categories')}}" aria-expanded="false"><i class="fa fa-list"></i><span class="nav-text">Categories</span></a></li>
                    <li><a href="{{route('admin.users')}}" aria-expanded="false"><i class="fa fa-users"></i><span class="nav-text">Users</span></a></li>
                    <li><a href="{{route('admin.delivery_boys')}}" aria-expanded="false"><i class="fa fa-motorcycle"></i><span class="nav-text">Delivery Boys</span></a></li>
                    <li><a href="{{route('admin.coupen_codes')}}" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="nav-text">Coupen Codes</span></a></li>
                    <li><a href="{{route('admin.foods')}}" aria-expanded="false"><i class="fa fa-cutlery"></i><span class="nav-text">Foods</span></a></li>
                    <li><a href="{{route('admin.orders')}}" aria-expanded="false"><i class="fa fa-cutlery"></i><span class="nav-text">Orders</span></a></li>
                    <li><a href="{{route('admin.pages')}}" aria-expanded="false"><i class="fa fa-cutlery"></i><span class="nav-text">Pages</span></a></li>
                    <li><a href="{{route('admin.quick_links')}}" aria-expanded="false"><i class="fa fa-cutlery"></i><span class="nav-text">Quick Links</span></a></li>
                    <li><a href="{{route('admin.contacts')}}" aria-expanded="false"><i class="fa fa-envelope"></i><span class="nav-text">Contacts</span></a></li>


                    
                    

                    
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Developed by Abdul Razzaq</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../admin_assets/vendor/global/global.min.js"></script>
    <script src="../admin_assets/js/quixnav-init.js"></script>
    <script src="../admin_assets/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="../admin_assets/vendor/raphael/raphael.min.js"></script>
    <script src="../admin_assets/vendor/morris/morris.min.js"></script>


    <script src="../admin_assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../admin_assets/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="../admin_assets/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="../admin_assets/vendor/flot/jquery.flot.js"></script>
    <script src="../admin_assets/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="../admin_assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="../admin_assets/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="../admin_assets/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="../admin_assets/vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="../admin_assets/js/dashboard/dashboard-1.js"></script>

    <script src="../admin_assets/js/myscripts.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/zbomkieruxayt6t65vgb7lsyblhjy7xssb5vdl46zh62lswb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '.mytextarea'
      });
</script>

</body>

</html>