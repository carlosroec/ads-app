@extends('layouts.master')

@section('content')
	<h1 class="page-heading">DASHBOARD</h1>

	<div class="col-sm-6">
		<div class="the-box">
			<h4 class="small-title">ROI GLOBAL</h4>
			<div id="c3-spline" style="height: 300px;"></div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="the-box">
			<h4 class="small-title">CAMPAÑAS ROI</h4>
			<div id="c3-pie" style="height: 300px;"></div>
		</div>
	</div>

	<script>
		var columns = [
    		['Inversion', {{$lastFive[0][0]}}, {{$lastFive[1][0]}}, {{$lastFive[2][0]}}, {{$lastFive[3][0]}}, {{$lastFive[4][0]}}],
    		['Ganancia', {{$lastFive[0][1]}}, {{$lastFive[1][1]}}, {{$lastFive[2][1]}}, {{$lastFive[3][1]}}, {{$lastFive[4][1]}}]
    	];

		var pie = [
    		['Positivo', {{$positiveROI}}],
    		['Negativo', {{$negativeROI}}],
    	];
	</script>
@stop
