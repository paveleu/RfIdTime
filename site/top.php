<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">M...</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MTCP</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">MENU</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"><?= $_SESSION['nameuser'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="?s=logout" class="btn btn-default btn-flat">Wyloguj</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  
  <aside class="main-sidebar">
    <section class="sidebar">

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        
		<li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Panel Główny</span></a></li>
    <li><a href="index.php?s=workerlist"><i class="fa fa-group"></i> <span>Lista Pracowników</span></a></li>
		
		
        
        <li class="header">SYSTEM</li>
        <li><a href="index.php"><i class="fa fa-circle-o text-red"></i> <span>Użytkownicy</span></a></li>
        <li><a href="?s=logout"><i class="fa fa-circle-o text-yellow"></i> <span>Wyloguj</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  
  
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>