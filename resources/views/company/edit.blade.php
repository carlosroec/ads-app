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
			<form role="form" method="POST" action="/company/{{ $company->id }}">
                <input name="_method" type="hidden" value="PUT">
			  <div class="form-group">
				<label>Nombre</label>
				<input type="text" name="name" value="{{ $company->name }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Descripción</label>
				<input type="text" name="description" value="{{ $company->description }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Teléfono</label>
				<input type="text" name="phone" value="{{ $company->phone }}" class="form-control phone_us_masking" placeholder="00 0000000">
			  </div>
			  <div class="form-group">
				<label>Email</label>
				<input type="email" name="email" value="{{ $company->email }}" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Usuario Coordinador</label>
				<select class="form-control" name="user">
					@foreach($users as $user)
                        @if ($company->user_id == $user->id)
                            <option value="{{$user->id}}" selected>{{$user->name}}</option>
                        @else
                            <option value="{{$user->id}}">{{$user->name}}</option>
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
