@extends('layouts.master')

@section('title')
@parent
:: Inventario forestal
@stop

@section('content')

<div class="row">
	<div class="col-md-2">
		<ul class="nav nav2 nav-pills nav-stacked center-block">
	  		<li><a href="{{ URL::to('invfor/create') }}">Agregar Árbol</a></li>
	  		<!--<li><a href="{{ URL::to('arbol/update') }}">Actualizar arbol</a></li>
	  		<li><a href="{{ URL::to('arbol/destroy') }}">Eliminar arbol</a></li>-->
		</ul>
	</div>
<div>
	<table class="table-striped table-bordered table-condensed">
	  <tr>
	    <th colspan="12">INVENTARIO<br>COMERCIAL DE ESPECIES FORESTALES, UNIDAD DE PRODUCCIÓN:</th>
	  </tr>
	  <tr>
	    <td colspan="3">Responsable:</td>
	    <td colspan="9">Baqueano:</td>
	  </tr>
	  <tr>
	    <td>Bloque:</td>
	    <td colspan="2">Parcela:</td>
	    <td colspan="9">Ayudante</td>
	  </tr>
	  <tr>
	    <td rowspan="2">Num Arbol</td>
	    <td colspan="2" rowspan="2">Num Arbol Candi</td>
	    <td rowspan="2">CAP (cm)</td>
	    <td rowspan="2">Arb. (cm)</td>
	    <td rowspan="2">h FUSTE (m)</td>
	    <td rowspan="2">h TOTAL (m)</td>
	    <td colspan="2">Coordenadas</td>
	    <td rowspan="2">C.F</td>
	    <td rowspan="2">VI</td>
	    <td rowspan="2">Observaciones</td>
	  </tr>
	  <tr>
	    <td>Norte</td>
	    <td>Este</td>
	  </tr>
	  <tr>
	    <td></td>
	    <td colspan="2"></td>
	    <td></td>
	    <td></td>
	    <td></td>
	    <td></td>
	    <td></td>
	    <td></td>
	    <td></td>
	    <td></td>
	    <td></td>
	  </tr>
	</table>
</div>
		
</div>

@stop