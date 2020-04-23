<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminFAI | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="/front/img/vavicon.png" type="image/x-icon">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! Html::style('css/font-awesome.css') !!}
  <!-- Ionicons -->
  {!! Html::style('css/ionicons.min.css') !!}
  <!-- Theme style -->
  {!! Html::style('css/AdminLTE.min.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {!! Html::style('css/_all-skins.min.css') !!}
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
    <a href="/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>UNINUS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Admin<b>FAI</b></span>
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
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

          <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="/front/img/vavicon.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="/front/img/vavicon.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="/front/img/vavicon.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="/front/img/vavicon.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="/front/img/vavicon.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
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
        <li class="header">MAIN NAVIGATION</li>
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
            <i class="glyphicon glyphicon-user"></i> <span>Sambutan Dekan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('sambutan-dekan/index')}}"><i class="glyphicon glyphicon-user"></i>Sambutan Dekan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bullhorn"></i> <span>Visi Misi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('visimisi/index')}}"><i class="fa fa-bullhorn"></i>Visi Misi</a></li>
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
            <i class="fa fa-bank"></i> <span>Kemahasiswaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('kemahasiswaan/index')}}"><i class="fa fa-bank"></i> Kemahasiswaan</a></li>
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
            <li><a href="{{URL::to('category-galleri/index')}}"><i class="glyphicon glyphicon-list"></i>Kategori Galeri</a></li>
            <li><a href="{{URL::to('/gallery/index')}}"><i class="glyphicon glyphicon-picture"></i>Galeri</a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i> <span>Profil Pimpinan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('/profil-pimpinan/index')}}"><i class="fa fa-group"></i>Profil Pimpinan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user" aria-hidden="true"></i><span>Data Dosen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('/data-dosen/index')}}"><i class="fa fa-user"></i>Data Dosen</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-calendar"></i> <span>Agenda</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/agenda/index"><i class="glyphicon glyphicon-calendar"></i>Agenda</a></li>
            <li><a href="/kategori-events/index"><i class="glyphicon glyphicon-calendar"></i>Category Agenda</a></li>
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
            <li><a href="{{URL::to('kategori-berita/index')}}"><i class="fa fa-circle-o"></i>Kategori Berita</a></li>
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
            <li><a href="{{URL::to('kategori-pengumuman/index')}}"><i class="fa fa-circle-o"></i>Kategori Pengumuman</a></li>
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
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
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
{!! Html::script('js/jquery-2.2.3.min.js') !!}
<!-- jQuery UI 1.11.4 -->
{!! Html::script('js/jquery-ui.min.js') !!}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
{!! Html::script('js/bootstrap.js') !!}
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
<!-- AdminLTE App -->
{!! Html::script('js/adminlte.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<!-- {!! Html::script('js/demo.js') !!} -->
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/select2.full.min.js') !!}
{!! Html::script('js/jquery.inputmask.js') !!}
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/bootstrap-datepicker.min.js') !!}
{!! Html::script('js/bootstrap-colorpicker.min.js') !!}
{!! Html::script('js/icheck.min.js') !!}
@yield('js')

</body>
</html>
