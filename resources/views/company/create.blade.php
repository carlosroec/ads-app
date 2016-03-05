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
			<form role="form" method="POST" action="/company/">
			  <div class="form-group">
				<label>Nombre</label>
				<input type="text" name="name" value="{{ old('name') }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Descripción</label>
				<input type="text" name="description" value="{{ old('description') }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Teléfono</label>
				<input type="text" name="phone" value="{{ old('phone') }}" class="form-control phone_us_masking" placeholder="00 0000000">
			  </div>
			  <div class="form-group">
				<label>Email</label>
				<input type="email" name="email" value="{{ old('email') }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Usuario Coordinador</label>
				<select class="form-control" name="user">
					@foreach($users as $user)
						<option value="{{$user->id}}">{{$user->name}}</option>
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
