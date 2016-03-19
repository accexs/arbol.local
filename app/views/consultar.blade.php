@extends('layouts.master')

@section('title')
@parent
:: Consultar y exportar
@stop

@section('content')
<div class="row col-md-offset-2">
	<fieldset>
		<legend>Consultas disponibles</legend>
		<table class="row table-bordered">
			<tbody class="text-center">
				<tr>
					<td>
					<a href="{{ URL::to('/consultar/1') }}">1.LISTADO GENERAL DE ÁRBOLES APROVECHABLES.</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="{{ URL::to('/consultar/2') }}">2.LISTADO GENERAL DE ÁRBOLES PADRES.</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="{{ URL::to('/consultar/3') }}">3.NÚMERO DE ARBOLES POR BLOQUE SEGÚN ESPECIES.</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="{{ URL::to('/consultar/4') }} ">4.NÚMERO DE ÁRBOLES POR PARCELA Y BLOQUE SEGÚN ESPECIES.</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="{{ URL::to('/consultar/5') }}">5.VOLUMEN LA PARAGUA POR PARCELA Y BLOQUE SEGÚN ESPECIES.</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="{{ URL::to('/consultar/6') }}"}}>6.VOLUMEN MARN POR PARCELA Y BLOQUE SEGÚN ESPECIES.</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="{{ URL::to('/consultar/7') }}"}}>7.ÁREA BASAL POR BLOQUE SEGÚN ESPECIES.</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="{{ URL::to('/consultar/8') }}"}}>8.VOLUMEN LA PARAGUA POR BLOQUE SEGÚN ESPECIES.</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="{{ URL::to('/consultar/9') }}">9.VOLUMEN MARN POR BLOQUE SEGÚN ESPECIES.</a>
					</td>
				</tr>
				<tr>
					<td>
					<a href="{{ URL::to('/consultar/11') }}">10.EQUIPO DE TRABAJO POR PARCELA Y BLOQUE.</a>
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
</div>

@stop