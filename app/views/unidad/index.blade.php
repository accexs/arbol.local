@extends('layouts.master')

@section('title')
@parent
:: Unidades de producción
@stop

@section('content')
<div class="row col-md-offset-2">
	<div class="col-md-2">
		<ul class="nav nav2 nav-pills nav-stacked center-block">
	  		<li><a href="{{ URL::to('unidad/create') }}">Registrar U.P</a></li>
	  		<!--<li><a href="{{ URL::to('arbol/update') }}">Actualizar arbol</a></li>
	  		<li><a href="{{ URL::to('arbol/destroy') }}">Eliminar arbol</a></li>-->
		</ul>
	</div>
	<div class="col-md-9">
		<table class="table-striped table-bordered table-condensed">
			<tbody>
				@foreach ($unidad as $key => $value)
					<tr>
						<td style="border-right-style:none">Unidad de Producción:</td>
						<td style="border-left-style:none">{{ $value->nombre }}</td>
						<td>
					<div class="wrapper text-center">
						<div class="btn-group">
						
						<a style="margin-right: 3px" class="btn btn-sm btn-info pull-left" href="{{ URL::to ('unidad/' . $value->id)}}">Detalle</a>

						<a class="btn btn-sm btn-info pull-left" href="{{ URL::to ('unidad/' . $value->id) . '/edit'}}">Editar</a>

						{{ Form::open(array('url' => 'unidad/' . $value -> id, 'method' => 'DELETE', 'class' => 'pull-left','style'=>'margin-left: 3px')) }}
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