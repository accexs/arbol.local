@extends('layouts.master')

@section('title')
@parent
:: Eliminar Árbol
@stop

@section('content')
<div class="row">
	<table class="table-striped table-bordered table-condensed">
		<thead>
			<tr>
				<td>Tipo</td>
				<td># Árbol</td>
				<td>Bloque</td>
				<td>Parcela</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $tipo->tipo }}</td>
				<td>{{ $tipo->num_arbol }}</td>
				<td>{{ $arbol->parcelas()->firstorfail()->bloques->num_bloque }}</td>
				<td>{{ $arbol->parcelas->num_parcela }}</td>
				<td>
					{{ Form::open(array('url' => 'invfor/' . $arbol -> id, 'method' => 'DELETE', 'class' => 'pull-left','style'=>'margin-left: 3px')) }}
							{{ Form::submit('Eliminar', array('class' => 'btn btn-sm btn-danger')) }}
					{{ Form::close() }}
				</td>
			</tr>
		</tbody>
	</table>
</div>
@stop