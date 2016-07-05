@extends('layouts.master')

@section('content')

<div class="row">
	<h1></h1>
	<div class="col-sm-12">
		<div class="the-box">
		<h4 class="small-title">AGREGAR</h4>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<form role="form" method="POST" action="/campain/">
			  <div class="form-group">
				<label>Inicio</label>
				<input type="text" name="start_at" class="form-control datepicker" value="{{ old('start_at') }}" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
			  </div>
			  <div class="form-group">
				<label>Fin</label>
				<input type="text" name="end_at" class="form-control datepicker" value="{{ old('end_at') }}" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
			  </div>
			  <div class="form-group">
				<label>Descripción</label>
				<input type="text" name="description" value="{{ old('description') }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Costo</label>
				<input type="text" name="cost" value="{{ old('cost') }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Beneficio</label>
				<input type="text" name="gain" value="{{ old('gain') }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Objetivo</label>
				<input type="text" name="target" value="{{ old('target') }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Texto</label>
				<textarea name="advert" class="form-control">{{ old('advert') }}</textarea>
			  </div>

			  <div class="form-group">
				<label>Empresa</label>
				<select class="form-control" name="company_id">
					@foreach($companies as $company)
						<option value="{{$company->id}}">{{$company->name}}</option>
					@endforeach
				</select>
			  </div>

			  <input type="hidden" name="_token" value="{{ csrf_token() }}">

			  <button type="submit" class="btn btn-danger"><i class="fa fa-sign-in"></i> Agregar</button>
			</form>
		</div><!-- /.the-box -->
	</div>
</div>

@stop
