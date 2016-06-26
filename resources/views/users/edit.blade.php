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
			<form role="form" method="POST" action="/login/{{ $user->id }}">
                <input name="_method" type="hidden" value="PUT">
			  <div class="form-group">
				<label>Nombre</label>
				<input type="text" name="name" value="{{ $user->name }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Email</label>
				<input type="email" name="email" value="{{ $user->email }}" class="form-control">
			  </div>
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">

			  <button type="submit" class="btn btn-danger"><i class="fa fa-sign-in"></i> Guardar</button>
			</form>
		</div>
	</div>
</div>

@stop
