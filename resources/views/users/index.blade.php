@extends('layouts.master')

@section('content')
<!-- Begin page heading -->
<h1 class="page-heading">USUARIOS</h1>
<!-- End page heading -->

<!-- BEGIN DATA TABLE -->
<div class="the-box">
	<div class="table-responsive">
		<table class="table table-striped table-hover" id="datatable-example">
			<thead class="the-box dark full">
				<tr>
					<th>Nombre</th>
					<th>Email</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
		<tbody>
		@foreach($users as $user)
			<tr class="odd gradeA">
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>

				<td>{!! HTML::linkRoute('login.edit', 'Ver', array($user->id)) !!}</td>
				<td>
					<form role="form" method="POST" action="/user/{{ $user->id }}">
						<input name="_method" type="hidden" value="DELETE">
						<button type="submit" >ELIMINAR</button>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
				</td>
			</tr>
		@endforeach
		</table>
	</div>
</div>
@stop
