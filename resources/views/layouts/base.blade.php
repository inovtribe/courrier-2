
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <meta name="description" content="Dipvision Editor">
	    <meta name="author" content="Conids Sarl">
	    <link rel="icon" href="{{ asset('imgs/conids-logo_black_85x85.png') }}">

	    <title>MINDDEVEL-COURRIER</title>

		<!-- Bootstrap core CSS -->
	    <link href="{{ asset('bootstrap-4.3.1/css/bootstrap.min.css') }}" rel="stylesheet">
	    <!-- FontAwesome CSS -->
	    <link href="{{ asset('fontawesome-5.8.2/css/all.css') }}" rel="stylesheet"/>
	    <!-- Custom styles for X template -->
    	<link rel="stylesheet" href="{{ asset('shards/css/shards-dashboards.1.1.0.css') }}">
    	<link rel="stylesheet" href="{{ asset('shards/css/extras.1.1.0.min.css') }}">
	    <!-- Custom styles for conids template -->
      <link rel="stylesheet" type="text/css" href="DataTables/datatables.css"/>

      <script src="jquery/jquery-3.4.1.min.js"></script>
      <script src="bootstrap-4.3.1/js/bootstrap.bundle.min.js"></script>
      <script src="DataTables/datatables.js"></script>

      @yield('customCSS')



	</head>
	<body class="h-100">
		<div class="container-fluid">
			<div class="row">
			<!-- Main Sidebar -->
			<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
			  <div class="main-navbar">
			    <nav class="navbar align-items-stretch navbar-light cds-bg-gold flex-md-nowrap border-bottom p-0">
			      <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
			        <div class="d-table m-auto">
			          <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="">
			          <span class="d-none d-md-inline ml-1" id="cds-title-top">MINDDEVEL-COURRIER</span>
			        </div>
			      </a>
			      <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
			        <i class="material-icons">&#xE5C4;</i>
			      </a>
			    </nav>
			  </div>
			  <!-- Menu left: start -->

	    <div class="nav-wrapper">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="fas fa-folder"></i>
              <span>Tous les Courriers</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="#" disabled>
                <i class="fas fa-upload"></i>
              <span>Courriers Non Traités</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="fas fa-vr-cardboard"></i>
                <span>Courriers Traités</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="far fa-square"></i>
              <span>Courriers Archivés</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">
            <i class="far fa-images"></i>
            <span>Courriers Supprimés</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">
            <i class="fas fa-exchange-alt"></i>
            <span>Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">
            <i class="fas fa-crosshairs"></i>
            <span>Contact</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">
              <i class="fas fa-cog"></i>
              <span>Configuration</span>
            </a>
          </li>
        </ul>
      </div>
			  <!-- Menu left: end -->
			</aside>
			<!-- End Main Sidebar -->
			<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
			  <div class="main-navbar sticky-top cds-bg-gray3">
			    <!-- Main Navbar -->
			    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
			      <div class="main-navbar__search w-100 d-none d-md-flex d-lg-flex"
			      style="margin: auto; padding-left: 15px">
				  <!-- -->
				  <i class="fas fa-folder" id="cds-cur-project"></i> &nbsp;&nbsp;
			      <span class="cds-font-white" style="font-weight: 500; font-size: 17px">
					&nbsp; GESTION NUMERIQUE DU COURRIER  &nbsp; </span>
	              </div>
			      <ul class="navbar-nav cds-border-left flex-row">
			        <li class="nav-item dropdown">
			          <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
			            <img class="user-avatar rounded-circle mr-2" src="" alt="User Avatar">
			            <span class="d-none d-md-inline-block cds-font-white">bojiko</span>
			          </a>
			          <div class="dropdown-menu dropdown-menu-small">
			            <a class="dropdown-item" href="#">
			              <i class="fas fa-user"></i>&nbsp;&nbsp; Profil</a>
			            <div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger" href="#">
			              <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp; Logout</a>
			          </div>
			        </li>
			      </ul>
			      <nav class="nav"><div style="width:40px"></div></nav>
			      <nav class="nav">
			        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center cds-border-left" data-toggle="collapse" data-target=".header-navbar" style="color:white"
			        aria-expanded="false" aria-controls="header-navbar">
			          <i class="fas fa-bars"></i>
			        </a>
			      </nav>
			    </nav>
			  </div>
        <!-- / .main-navbar -->


			  <div class="main-content-container container-fluid px-4">

          @yield('content')

				<!-- End Default Light Table -->
			  </div>
			  <footer class="main-footer d-flex p-2 px-3 cds-bg-gray6 border-top" style="font-size: 14px; font-weight: 400">
			    <span class="copyright ml-auto my-auto mr-2" style="color:white">Copyright © 2019 - All Rights Reserved,
			      <a href='http://www.conids.cm' style="color:#D8D200">SCS-Services </a>
			    </span>
			  </footer>
			</main>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
	    ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->


      @yield('customJS')

	</body>
</html>