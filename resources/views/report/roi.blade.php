@extends('layouts.report')

@section('content')
	<h1 class="page-heading">ROI - PALABRAS CLAVE</h1>

    <div class="row">
    	<div class="col-sm-12">
    		<div class="the-box">
                <div class="table-responsive">
                	<table class="table table-th-block">
                		<thead>
                			<tr>
                                <th>ROI</th>
                                <th>Campaña</th>
                                <th>Palabras Clave</th>
                            </tr>
                		</thead>
                		<tbody>
                            @foreach($reports as $report)
                			<tr>
                                <td>{{ $report["campain"] }}</td>
                				<td>{{ $report["roi"] }}</td>
                                <td>
                                    <ul>
                                        @foreach($report["keywords"] as $keyword)
                                            <li>{{ $keyword }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                		</tbody>
                	</table>
                    <button id="print" class="btn btn-danger"><i class="fa fa-sign-in"></i> Imprimir</button>
					<buttom id="back" onclick="javascript:window.history.back();" class="btn btn-success">Regresar</button>
                </div>
            </div>
        </div>
    </div>
@stop
