@extends('layouts.master')

@section('content')

<div class="row">
	<h1></h1>
	<div class="col-sm-12">
		<div class="the-box">
		<h4 class="small-title">AGREGAR</h4>
			<form role="form">
			  <div class="form-group">
				<label>Nombre</label>
				<input type="text" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Descripción</label>
				<input type="text" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Teléfono</label>
				<input type="text" class="form-control phone_us_masking" placeholder="(000) 000-0000">
			  </div>
			  <div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Usuario Coordinador</label>
				<input type="text" class="form-control">
			  </div>
			  
			  <button type="submit" class="btn btn-danger"><i class="fa fa-sign-in"></i> Agregar</button>
			</form>
		</div><!-- /.the-box -->
	</div>
</div>

@stop
