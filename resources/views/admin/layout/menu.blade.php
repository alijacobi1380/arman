<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="{{url('images/logo.png')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('assets/admin/css/bootstrap-theme.css')}}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{url('assets/admin/css/rtl.css')}}">


    <link rel="stylesheet" href="{{url('assets/admin/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('assets/admin/Ionicons/css/ionicons.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('assets/admin/css/AdminLTE.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="https://metaluxe.ir/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="https://metaluxe.ir/login" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">پنل</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>


            </nav>
        </header>
        <!-- right side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-right image">
                        <img src="{{url('images/logo.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-right info">
                        <p>{{Auth()->user()->name}}</p>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">منو</li>




                    <form action="{{route('logout')}}" id="logout" method="POST">
                        @csrf
                    </form>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa bi bi-shop"></i> <span>محصولات</span>
                            <span class="pull-left-container">
                                <i class="fa fa-angle-right pull-left"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(url()->current() == route('productlist')) active @endif"><a href="{{route('productlist')}}"><i class="fa fa-th-large"></i>لیست محصولات</a></li>
                            <li class="@if(url()->current() == route('addproduct')) active @endif"><a href="{{route('addproduct')}}"><i class="fa fa-plus-circle"></i>افزودن محصول</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa bi bi-collection"></i> <span>دسته بندی ها</span>
                            <span class="pull-left-container">
                                <i class="fa fa-angle-right pull-left"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(url()->current() == route('categoryslist')) active @endif"><a href="{{route('categoryslist')}}"><i class="fa fa-th-large"></i>لیست دسته ها</a></li>
                            <li class="@if(url()->current() == route('addcategory')) active @endif"><a href="{{route('addcategory')}}"><i class="fa fa-plus-circle"></i>افزودن دسته بندی</a></li>
                        </ul>
                    </li>
                    <li><a class="logout" style="cursor: pointer;"><i class="fa fa-power-off"></i> <span>خروج</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            @yield('content')

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer text-left">
        </footer>


        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{url('assets/admin/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{url('assets/admin/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{url('assets/admin/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('assets/admin/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('assets/admin/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('assets/admin/js/demo.js')}}"></script>

    <script>
        $('.logout').click(function() {
            $('#logout').submit();
        })
    </script>
</body>

</html>