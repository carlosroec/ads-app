<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title>Ads App</title>


		<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
        {!! HTML::style('css/bootstrap.min.css') !!}

		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
		{!! HTML::style('plugins/c3-chart/c3.min.css') !!}
        {!! HTML::style('plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! HTML::style('plugins/datepicker/datepicker.min.css') !!}
        {!! HTML::style('css/style.css') !!}
        {!! HTML::style('css/style-responsive.css') !!}
				{!! HTML::style('plugins/datatable/css/bootstrap.datatable.min.css') !!}

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->


	</head>

	<body class="tooltips">
        <div class="wrapper">
            <div class="top-navbar">
				<div class="top-navbar-inner">

					<!-- Begin Logo brand -->
					<div class="logo-brand">
						<a href="index.html">
                            <!-- <img src="assets/img/sentir-logo-primary.png" alt="Sentir logo"> -->
                        </a>
					</div><!-- /.logo-brand -->
					<!-- End Logo brand -->

					<div class="top-nav-content no-right-sidebar">

						<!-- Begin button sidebar left toggle -->
						<div class="btn-collapse-sidebar-left">
							<i class="fa fa-bars"></i>
						</div><!-- /.btn-collapse-sidebar-left -->
						<!-- End button sidebar left toggle -->

						<!-- Begin button nav toggle -->
						<div class="btn-collapse-nav" data-toggle="collapse" data-target="#main-fixed-nav">
							<i class="fa fa-plus icon-plus"></i>
						</div><!-- /.btn-collapse-sidebar-right -->
						<!-- End button nav toggle -->


						<!-- Begin user session nav -->
						<ul class="nav-user navbar-right full">
							<li class="dropdown">
							  <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">
								<!-- <img src="assets/img/avatar/avatar-1.jpg" class="avatar img-circle" alt="Avatar"> -->
								Hola, <strong>{{ $userName }}</strong>
							  </a>
							  <ul class="dropdown-menu square primary margin-list-rounded with-triangle">
								<!-- <li><a href="#fakelink">Mi cuenta</a></li> -->
								<!-- <li class="divider"></li> -->
								<li>{!! HTML::link('auth/logout', 'Logout') !!}</li>
							  </ul>
							</li>
						</ul>
						<!-- End user session nav -->

						<!-- Begin Collapse menu nav -->
						<div class="collapse navbar-collapse" id="main-fixed-nav">
							<!-- Begin nav search form -->
							<!-- <form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search">
								</div>
							</form> -->
							<!-- End nav search form -->

						</div><!-- /.navbar-collapse -->
						<!-- End Collapse menu nav -->
					</div><!-- /.top-nav-content -->
				</div><!-- /.top-navbar-inner -->
			</div><!-- /.top-navbar -->

            <!-- BEGIN SIDEBAR LEFT -->
			<div class="sidebar-left sidebar-nicescroller">
				<ul class="sidebar-menu">
					<li>
						<a href="{!! URL::route('dashboard') !!}">
							<i class="fa fa-dashboard icon-sidebar"></i>
							Inicio
						</a>
					</li>
					<li>
						<a href="{!! URL::route('user') !!}">
							<i class="fa fa-bomb icon-sidebar"></i>
							Usuarios
						</a>
						<ul class="submenu">
							<li><a href="{!! URL::route('login.index') !!}">Listar</a></li>
							<li><a href="{!! URL::route('login.create') !!}">Agregar</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-flask icon-sidebar"></i>
							Empresas
						</a>
						<ul class="submenu">
							<li><a href="{!! URL::route('company.index') !!}">Listar</a></li>
							<li><a href="{!! URL::route('company.create') !!}">Agregar</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-desktop icon-sidebar"></i>
							Campañas
						</a>
						<ul class="submenu">
							<li><a href="{!! URL::route('campain.index') !!}">Listar</a></li>
							<li><a href="{!! URL::route('campain.create') !!}">Agregar</a></li>
						</ul>
					</li>

					<li>
						<a href="#">
							<i class="fa fa-folder icon-sidebar"></i>
							Reportes
						</a>
						<ul class="submenu">
							<li><a href="{!! URL::route('report_campains') !!}">Campañas</a></li>
							<li><a href="{!! URL::route('report_companies') !!}">Empresas</a></li>
							<li><a href="{!! URL::route('report_keywords') !!}">Palabras Clave</a></li>
							<li><a href="{!! URL::route('report_global') !!}">Promedio</a></li>
							<li><a href="{!! URL::route('report_roi') !!}">Palabras Clave por ROI</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.sidebar-left -->
			<!-- END SIDEBAR LEFT -->
        </div>

        <!-- BEGIN PAGE CONTENT -->
		<div class="page-content">

			<div class="container-fluid">
                 @yield('content')
            </div>

        </div><!-- /.page-content -->

		<!-- BEGIN BACK TO TOP BUTTON -->
		<div id="back-top">
			<a href="#top"><i class="fa fa-chevron-up"></i></a>
		</div>
		<!-- END BACK TO TOP -->


		<!--
		===========================================================
		END PAGE
		===========================================================
		-->

		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
				{!! HTML::script('js/jquery.min.js') !!}
				{!! HTML::script('js/bootstrap.min.js') !!}
				{!! HTML::script('plugins/retina/retina.min.js') !!}
				{!! HTML::script('plugins/nicescroll/jquery.nicescroll.js') !!}
				{!! HTML::script('plugins/slimscroll/jquery.slimscroll.min.js') !!}
				{!! HTML::script('plugins/backstretch/jquery.backstretch.min.js') !!}
				{!! HTML::script('plugins/datepicker/bootstrap-datepicker.js') !!}

				{!! HTML::script('plugins/datatable/js/jquery.dataTables.js') !!}
				{!! HTML::script('plugins/datatable/js/bootstrap.datatable.js') !!}


				{!! HTML::script('plugins/c3-chart/d3.v3.min.js', array('charset' => 'utf-8')) !!}
				{!! HTML::script('plugins/c3-chart/c3.min.js') !!}
				{!! HTML::script('plugins/c3-chart/example.js') !!}

		<!-- MAIN APPS JS -->
				{!! HTML::script('js/apps.js') !!}

	</body>
</html>
