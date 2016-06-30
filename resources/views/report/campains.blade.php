@extends('layouts.report')

@section('content')
	<h1 class="page-heading">CAMPAÑAS</h1>

    <div class="row">
    	<div class="col-sm-12">
    		<div class="the-box">
                <div class="table-responsive">
                	<table class="table table-th-block">
                		<thead>
                			<tr>
                                <th>Empresa</th>
                                <th>Descripción</th>
                                <th>Inicio</th>
                                <th>Fin</th>
                            </tr>
                		</thead>
                		<tbody>
                            @foreach($campains as $campain)
                			<tr>
                                <td>{{ $campain->company->name }}</td>
                				<td>{{ $campain->description }}</td>
                				<td>{{ $campain->start_at }}</td>
                				<td>{{ $campain->end_at }}</td>
                            </tr>
                            @endforeach
                			<!-- <tr><td>2</td><td>Thomas White</td><td>Bndung, Indonesia</td><td>Jan 01, 1987</td><td><span class="label label-success">Male</span></td></tr>
                			<tr><td>3</td><td>Doina Slaivici</td><td>Lombok, Indonesia</td><td>Dec 31, 1993</td><td><span class="label label-danger">Female</span></td></tr>
                			<tr><td>4</td><td>Mihaela Cihac</td><td>Sydney, Australia</td><td>Jun 05, 1992</td><td><span class="label label-danger">Female</span></td></tr>
                			<tr><td>5</td><td>Harold Chavez</td><td>London, United Kingdom</td><td>Mar 10, 1985</td><td><span class="label label-success">Male</span></td></tr>
                			<tr><td>6</td><td>Elizabeth Owens</td><td>New York, US</td><td>Jul 01, 1989</td><td><span class="label label-danger">Female</span></td></tr>
                			<tr><td>7</td><td>Frank Oliver</td><td>Pattaya, Thailand</td><td>Nov 21, 1991</td><td><span class="label label-success">Male</span></td></tr>
                			<tr><td>8</td><td>Mya Weastell</td><td>Boyolali, Indonesia</td><td>Sep 14, 1990</td><td><span class="label label-danger">Female</span></td></tr>
                			<tr><td>9</td><td>Harry Nichols</td><td>Berlin, Germany</td><td>Apr 21, 1987</td><td><span class="label label-success">Male</span></td></tr>
                			<tr><td>10</td><td>Carl Rodriguez</td><td>Melbourne, Australia</td><td>Oct 11, 1988</td><td><span class="label label-success">Male</span></td></tr> -->
                		</tbody>
                	</table>
                    <button id="print" class="btn btn-danger"><i class="fa fa-sign-in"></i> Imprimir</button>
					<buttom id="back" onclick="javascript:window.history.back();" class="btn btn-success">Regresar</button>
                </div>
            </div>
        </div>
    </div>
@stop
