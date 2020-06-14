<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Pilmapres | @yield('title', 'Dashboard')</title>
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
    <!-- Morris chart -->
    {!! Html::style('css/morris.css') !!}
    <!-- jvectormap -->
    {!! Html::style('css/jquery-jvectormap.css') !!}
    <!-- Date Picker -->
    {!! Html::style('css/bootstrap-datepicker.min.css') !!}
    <!-- Daterange picker -->
    {!! Html::style('css/daterangepicker.css') !!}
    <!-- bootstrap wysihtml5 - text editor -->
    {!! Html::style('css/bootstrap3-wysihtml5.min.css') !!}
    {!! Html::style('css/bootstrap-colorpicker.min.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    {!! Html::style('vendor/datatables/datatables/media/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('css/sweetalert.css') !!}

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
        <a href="/admin" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>PILMAPRES</b></span>
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
                                <p>
                                    {{ Auth::user()->name }}
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
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
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/user-groups')}}"><i class="fa fa-circle-o"></i> User Groups</a></li>
                        <li><a href="{{URL::to('/groups')}}"><i class="fa fa-circle-o"></i> Groups </a></li>
                        <li><a href="{{URL::to('/group-roles')}}"><i class="fa fa-circle-o"></i> Groups Roles</a></li>
                        <li><a href="{{URL::to('/roles')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="{{URL::to('slider/index')}}">
                        <i class="fa fa-object-group"></i> <span>Slider</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('slider/index')}}"><i class="fa fa-circle-o"></i> Slider</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-comment-o"></i> <span>Testimoni</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/testimony/index')}}"><i class="fa fa-comment-o"></i> Testimoni</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-picture"></i> <span>Galeri</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('category-galleri/index')}}"><i class="glyphicon glyphicon-list"></i>Kategori
                                Galeri</a></li>
                        <li><a href="{{URL::to('/gallery/index')}}"><i
                                        class="glyphicon glyphicon-picture"></i>Galeri</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span>Berita</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('kategori-berita/index')}}"><i class="fa fa-circle-o"></i>Kategori Berita</a>
                        </li>
                        <li><a href="{{URL::to('berita/index')}}"><i class="fa fa-circle-o"></i>Berita</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i> <span>Pengumuman</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/pengumuman/index')}}"><i class="fa fa-circle-o"></i>Pengumuman</a></li>
                        <li><a href="{{URL::to('kategori-pengumuman/index')}}"><i class="fa fa-circle-o"></i>Kategori
                                Pengumuman</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-group"></i> <span>Peserta</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('admin/peserta/register')}}"><i class="fa fa-user-plus"></i>Peserta
                                Registrasi</a></li>
                        <li><a href="{{URL::to('admin/peserta')}}"><i class="fa fa-list"></i>Data Peserta</a></li>
                        <li><a href="{{URL::to('admin/peserta/rejected')}}"><i class="fa fa-user-times"></i>Peserta
                                Direject</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>User</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/user-request')}}"><i class="fa fa-circle-o"></i>User Request</a></li>
                        <li><a href="{{URL::to('/user-approved')}}"><i class="fa fa-circle-o"></i>User Request Disetujui</a>
                        </li>
                        <li><a href="{{URL::to('/user-rejected')}}"><i class="fa fa-circle-o"></i>User Request
                                Ditolak</a></li>
                    </ul>
                </li>

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
        <div class="pull-right hidden-xs">
            Theme by Almsaeed Studio
        </div>
        <strong>&copy; 2020 <a href="https://www.kemdikbud.go.id">KEMDIKBUD</a>.</strong> All rights
        reserved.
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
{!! Html::script('js/adminlte.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<!-- {!! Html::script('js/demo.js') !!} -->
<!-- Morris.js charts -->
<!-- {!! Html::script('js/raphael.min.js') !!} -->
<!-- {!! Html::script('js/morris.min.js') !!} -->
<!-- Sparkline -->
<!-- {!! Html::script('js/jquery.sparkline.min.js') !!} -->
<!-- jvectormap -->
<!-- jQuery Knob Chart -->
<!-- {!! Html::script('js/jquery.knob.min.js') !!} -->
<!-- daterangepicker -->
<!-- {!! Html::script('js/moment.min.js') !!} -->
{!! Html::script('js/daterangepicker.js') !!}
<!-- datepicker -->
{!! Html::script('js/bootstrap-datepicker.min.js') !!}
<!-- Bootstrap WYSIHTML5 -->
<!-- {!! Html::script('js/bootstrap3-wysihtml5.all.min.js') !!} -->
<!-- Slimscroll -->
<!-- {!! Html::script('js/jquery.slimscroll.min.js') !!} -->
<!-- FastClick -->
<!-- {!! Html::script('js/fastclick.js') !!} -->
{!! Html::script('js/sweetalert.min.js') !!}
{!! Html::script('js/select2.full.min.js') !!}
{!! Html::script('js/jquery.inputmask.js') !!}
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/bootstrap-colorpicker.min.js') !!}
{!! Html::script('js/icheck.min.js') !!}

@yield('js')

</body>
</html>
