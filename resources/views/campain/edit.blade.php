@extends('layouts.master')

@section('content')

<div class="row">
	<h1></h1>
	<div class="col-sm-12">
		<div class="the-box">
		<h4 class="small-title">EDITAR</h4>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<form role="form" method="POST" action="/campain/{{ $campain->id }}">
                <input name="_method" type="hidden" value="PUT">
			  <div class="form-group">
				<label>Inicio</label>
				<input type="text" name="start_at" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="{{ $campain->start_at }}">
			  </div>
			  <div class="form-group">
				<label>Fin</label>
				<input type="text" name="end_at" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="{{ $campain->end_at }}">
			  </div>
			  <div class="form-group">
				<label>Descripción</label>
				<input type="text" name="description" class="form-control" value="{{ $campain->description }}">
			  </div>
			  <div class="form-group">
				<label>Costo</label>
				<input type="text" name="cost" class="form-control" value="{{ $campain->cost }}">
			  </div>
			  <div class="form-group">
				<label>Beneficio</label>
				<input type="text" name="gain" class="form-control" value="{{ $campain->gain }}">
			  </div>
			  <div class="form-group">
				<label>Objetivo</label>
				<input type="text" name="target" class="form-control" value="{{ $campain->target }}">
			  </div>
			  <div class="form-group">
				<label>Texto</label>
				<textarea name="advert" class="form-control">{{ $campain->advert }}</textarea>
			  </div>

			  <div class="form-group">
				<label>Empresa</label>
				<select class="form-control" name="company_id">
					@foreach($companies as $company)
                        @if ($company->id == $campain->company_id)
						  <option value="{{$company->id}}" selected>{{$company->name}}</option>
                        @else
                          <option value="{{$company->id}}">{{$company->name}}</option>
                        @endif
					@endforeach
				</select>
			  </div>

			  <input type="hidden" name="_token" value="{{ csrf_token() }}">

			  <button type="submit" class="btn btn-danger"><i class="fa fa-sign-in"></i> Guardar</button>
			</form>
		</div><!-- /.the-box -->
	</div>
</div>

@stop
