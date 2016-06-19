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
			<h4 class="small-title">CAMPAÑAS</h4>
			<div id="c3-pie" style="height: 300px;"></div>
		</div>
	</div>

	<script>
		var columns = [
    		['Inversion', 300, 350, 300, 0, 0, 0],
    		['Ganancia', 130, 100, 140, 200, 150, 50]
    	];

		var pie = [
    		['data1', 30],
    		['data2', 120],
    	];
	</script>
@stop
