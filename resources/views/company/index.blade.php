@extends('layouts.master')

@section('content')

<h1 class="page-heading">EMPRESAS</h1>

<div class="the-box">
	<div class="table-responsive">
		<table class="table table-striped table-hover" id="datatable-example">
			<thead class="the-box dark full">
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($companies as $company)
					<tr class="odd gradeA">
						<td>{!! HTML::linkRoute('company.edit', $company->name, array($company->id)) !!}</td>
						<td>{{ $company->description }}</td>
						<td>
							<form role="form" method="POST" action="/company/{{ $company->id }}">
								<input name="_method" type="hidden" value="DELETE">
							    <button type="submit" >ELIMINAR</button>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


@stop
