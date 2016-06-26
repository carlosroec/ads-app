@extends('layouts.report')

@section('content')
	<h1 class="page-heading">PROMEDIOS</h1>

    <div class="row">
    	<div class="col-sm-12">
    		<div class="the-box">
                <div class="table-responsive">
                	<table class="table table-th-block">
                		<thead>
                			<tr>
                                <th>Número de Campañas</th>
                                <th>Duración Promedio de Campañas</th>
                                <th>Inversión Promedio</th>
                                <th>Ganancia Promedio</th>
                            </tr>
                		</thead>
                		<tbody>
                			<tr>
                                <td>{{ $total }}</td>
                                <td>{{ $campainAverage }}</td>
                				<td>{{ $investmentAverage }}</td>
                                <td>{{ $gainAverage }}</td>
                            </tr>
                		</tbody>
                	</table>
                    <button id="print" class="btn btn-danger"><i class="fa fa-sign-in"></i> Imprimir</button>
                </div>
            </div>
        </div>
    </div>
@stop
