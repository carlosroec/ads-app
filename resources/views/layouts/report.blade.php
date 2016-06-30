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

        <style>
            body {
                padding-top: 0;
            }
            .page-content {
                margin-left: 0;
            }
        </style>
	</head>

	<body class="tooltips">


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

                <script>
                    $('#print').on('click', function() {
                        $(this).hide();
						$('#back').hide();

						setTimeout(function (){
							$('#print').show();
							$('#back').show();
						}, 200);
						
                        window.print();
                    });
                </script>

	</body>
</html>
