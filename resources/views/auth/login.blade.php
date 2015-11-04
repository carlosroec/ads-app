<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title>SENTIR - Responsive admin and dashboard UI kits template</title>


		<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
        {!! HTML::style('css/bootstrap.min.css') !!}

		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
        {!! HTML::style('plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! HTML::style('css/style.css') !!}
        {!! HTML::style('css/style-responsive.css') !!}

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login tooltips">

        <!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="login-header text-center">
			<!-- <img src="assets/img/logo-login.png" class="logo" alt="Logo"> -->
		</div>
		<div class="login-wrapper">
            @if (count($errors) > 0)
                <div class="alert alert-warning alert-bold-border fade in alert-dismissable">
    			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
    			</div>
            @endif

			<form role="form" method="POST" action="/auth/login">
                {!! csrf_field() !!}

				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="email" name="email" class="form-control no-border input-lg rounded" placeholder="Enter email" autofocus value="{{ old('email') }}">
				  <span class="fa fa-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="password" name="password" class="form-control no-border input-lg rounded" placeholder="Enter password" id="password">
				  <span class="fa fa-unlock-alt form-control-feedback"></span>
				</div>
				<div class="form-group">
				  <div class="checkbox">
					<label>
					  <input type="checkbox" name="remember" class="i-yellow-flat"> Remember me
					</label>
				  </div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-warning btn-lg btn-perspective btn-block">LOGIN</button>
				</div>
			</form>

		</div><!-- /.login-wrapper -->
		<!--
		===========================================================
		END PAGE
		===========================================================
		-->


		<!--
		===========================================================
		Placed at the end of the document so the pages load faster
		===========================================================
		-->
		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
        {!! HTML::script('js/jquery.min.js') !!}
        {!! HTML::script('js/bootstrap.min.js') !!}
        {!! HTML::script('plugins/retina/retina.min.js') !!}
        {!! HTML::script('plugins/nicescroll/jquery.nicescroll.js') !!}
        {!! HTML::script('plugins/slimscroll/jquery.slimscroll.min.js') !!}
        {!! HTML::script('plugins/backstretch/jquery.backstretch.min.js') !!}


		<!-- MAIN APPS JS -->
        {!! HTML::script('js/apps.js') !!}

	</body>
</html>
