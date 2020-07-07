<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reviewer Pilmapres | @yield('title', 'Dashboard')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="icon" href="/front/img/vavicon.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    {!! Html::style('vendor/twitter/bootstrap/dist/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('vendor/fortawesome/font-awesome/css/font-awesome.min.css') !!}
    <!-- Ionicons -->
    {!! Html::style('css/ionicons.min.css') !!}
    <!-- Theme style -->
    {!! Html::style('vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css') !!}
    <!-- AdminLTE Skins -->
    {!! Html::style('vendor/almasaeed2010/adminlte/dist/css/skins/skin-blue.min.css') !!}
    <!-- DataTables -->
    {!! Html::style('vendor/datatables/datatables/media/css/dataTables.bootstrap.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ URL::to('reviewer/home') }}" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>JURI PILMAPRES</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/front/img/vavicon.png" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/front/img/vavicon.png" class="img-circle" alt="User Image">
                                <p>{{ Auth::user()->name }}
                                    <small>Juri PILMAPRES</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/front/img/vavicon.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info" style="white-space: normal">
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu tree" data-widget="tree">
                <li><a href="{{ URL::to('reviewer/home/') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
                <li><a href="{{ URL::to('reviewer/portofolio/') }}"><i class="fa fa-check-circle"></i> <span>Penilaian Portofolio</span></a></li>
                <li><a href="{{ URL::to('logout') }}"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content')
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">Theme by Almsaeed Studio</div>
        <strong>&copy; 2020 <a href="https://www.kemdikbud.go.id">KEMDIKBUD</a></strong>. All rights reserved.
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <!-- <div class="control-sidebar-bg"></div> -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
{!! Html::script('vendor/components/jquery/jquery.min.js') !!}
<!-- jQuery UI 1.11.4 -->
{!! Html::script('js/jquery-ui.min.js') !!}
<!-- Bootstrap 3.3.7 -->
{!! Html::script('vendor/twitter/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- DataTables -->
{!! Html::script('vendor/datatables/datatables/media/js/jquery.dataTables.min.js') !!}
{!! Html::script('vendor/datatables/datatables/media/js/dataTables.bootstrap.min.js') !!}
<!-- AdminLTE App -->
{!! Html::script('vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js') !!}
@yield('js')

</body>
</html>
