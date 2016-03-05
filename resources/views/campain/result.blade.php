@extends('layouts.master')

@section('content')
<h1 class="page-heading">CAMPAÑAS</h1>

<div class="row">
	@foreach($results as $result)
		<div class="col-lg-3">
			<div class="panel panel-danger panel-square panel-no-border text-center">
				<div class="panel-heading">
					<h3 class="panel-title">{{ $result['keyword'] }}</h3>
				</div>
				<div class="panel-body">
					<h1 class="bolded tiles-number text-danger">{{ $result['relevance'] * 100 }} %</h1>
					<p class="text-muted"><small>CONTADOR <strong>{{ $result['count'] }}</strong></small></p>
				</div>
			</div>
		</div>
	@endforeach
</div>

@stop