@extends('layouts.master')

@section('title')
@parent
:: Árboles
@stop

@section('content')
<div class="row">
	<div class="col-md-2">
		<ul class="nav nav2 nav-pills nav-stacked center-block">
	  		<li><a href="{{ URL::to('arbol/create') }}">Agregar especie</a></li>
	  		<!--<li><a href="{{ URL::to('arbol/update') }}">Actualizar arbol</a></li>
	  		<li><a href="{{ URL::to('arbol/destroy') }}">Eliminar arbol</a></li>-->
		</ul>
	</div>
	<div class="col-md-10">
		<table class="table-striped table-bordered table-condensed">
			<thead>
				<tr>
					<td>Cod Especie</td>
					<td>Cod Numérico</td>
					<td>Dureza</td>
					<td>Nombre Científico</td>
					<td>Nombre Vulgar</td>
					<td>Familia</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($arboles as $key => $value)
					<tr>
						<td>{{ $value->cod_especie }}</td>
						<td>{{ $value->cod_numerico }}</td>
						<td>{{ $value->tipo_especie }}</td>
						<td>{{ $value->nombre_cientifico }}</td>
						<td>{{ $value->nombre_vulgar }}</td>
						<td>{{ $value->familia }}</td>
						<td>
					<div class="wrapper text-center">
						<div class="btn-group">
						
						<a class="btn btn-sm btn-info pull-left" href="{{ URL::to ('arbol/' . $value->id) . '/edit'}}">Editar</a>
						{{ Form::open(array('url' => 'arbol/' . $value -> id, 'method' => 'DELETE', 'class' => 'pull-left','style'=>'margin-left: 3px')) }}
							{{ Form::submit('Eliminar', array('class' => 'btn btn-sm btn-warning')) }}
						{{ Form::close() }}
						</div>	
					</div>
					</td>
					</tr>
				@endforeach
			</tbody>
		</table> 
	</div>
</div>

@stop