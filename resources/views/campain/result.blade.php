@extends('layouts.master')

@section('content')

<div class="row">
	<h1></h1>
	<div class="col-sm-12">
		<div class="alert alert-warning alert-bold-border fade in alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p><strong>Artículo</strong></p>
			<p class="text-muted">
				{{ $textArticle }}
			</p>
		</div>
	</div>
</div>
<div class="row">
	@foreach($keywords as $keyword)
		<div class="col-sm-3">
			<div class="the-box no-border {{ $keyword['color'] }} tiles-information">
				<i class="fa fa-users icon-bg"></i>
				<div class="tiles-inner text-center">
					<p>{{ $keyword["text"] }}</p>
					<h1 class="bolded">{{ $keyword["relevance"] }}</h1>
					<div class="progress no-rounded progress-xs">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
					</div>
					<p><small>{{ $keyword["isRegistered"] }}</small></p>
				</div>
			</div>
		</div>
	@endforeach
</div>
@stop
