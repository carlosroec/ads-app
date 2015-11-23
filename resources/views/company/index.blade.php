@extends('layouts.master')

@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">COMPANIES</h1>
	<!-- End page heading -->

  <!-- BEGIN DATA TABLE -->
					<div class="the-box">
						<div class="table-responsive">
              <table class="table table-striped table-hover" id="datatable-example">
                <thead class="the-box dark full">
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($companies as $company)
                    <tr class="odd gradeA">
                      <td>{!! HTML::linkRoute('company.edit', $company->name, array($company->id)) !!}</td>
                      <td>{{ $company->description }}</td>
                    </tr>
                  @endforeach
              </table>
            </div>
          </div>


@stop
