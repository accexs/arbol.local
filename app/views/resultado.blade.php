@extends('layouts.master')

@section('title')
@parent
:: Resultados
@stop

@section('content')
<button id="exportar" class="btn btn-sm btn-success pull-left" href="#">Exportar</button>
<div class="row col-md-offset-1">
	<fieldset>
		<legend>{{$titulo}}</legend>
		@if ($titulo=="1.LISTADO GENERAL DE ÁRBOLES APROVECHABLES." or $titulo=="2.LISTADO GENERAL DE ÁRBOLES PADRES.")
		<table class="table-bordered text-center">
			<thead>
				<tr>
					<td>Unidad de Producción</td>
					<td>Bloque</td>
					<td>Parcela</td>
					<td># Árbol</td>
					<td>Nombre común</td>
					<td>CL</td>
					<td>CN</td>
					<td>CAP</td>
					<td>DAP</td>
					<td>Altura</td>
					<td>Calidad</td>
					<td>Vitalidad</td>
					<td>Área Basal</td>
					<td>Volumen Paragua</td>
					<td>Volumen MARN</td>
				</tr>
			</thead>
			<tbody class="">
				@foreach ($arboles as $arbol)
				<tr>
					<td>{{$arbol->nombre_unidad}}</td>
					<td>{{$arbol->num_bloque}}</td>
					<td>{{$arbol->num_parcela}}</td>
					<td>{{$arbol->num_arbol}}</td>
					<td>{{$arbol->especie}}</td>
					<td>{{$arbol->cod_especie}}</td>
					<td>{{$arbol->cod_numerico}}</td>
					<td>{{$arbol->cap}}</td>
					<td>{{$arbol->dap}}</td>
					<td>{{$arbol->altura}}</td>
					<td>{{$arbol->calidad}}</td>
					@if ($arbol->vitalidad==1)
					<td>Sano</td>
					@endif
					@if ($arbol->vitalidad==2)
					<td>Lig atacado</td>
					@endif
					@if ($arbol->vitalidad==3)
					<td>Enfermo</td>
					@endif
					<td>{{/*area basal*/round((3.1415/4*$arbol->dap*$arbol->dap),4)}}</td>
					@if ($arbol->dap>=60)
					<td>{{/*rollizo*/round(0.081+0.499*($arbol->altura)*(($arbol->dap/100)*($arbol->dap/100)),4)}}</td>
					@else
					<td>{{/*rollizo*/round(0.067+0.502*($arbol->altura)*(($arbol->dap*$arbol->dap)/100),4)}}</td>
					@endif
					<td>{{/*marn en pie*/round(((($arbol->dap/100)*($arbol->dap/100))*$arbol->altura*0.605),4) }}</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
		@if ($titulo=="3.NÚMERO DE ÁRBOLES POR BLOQUE SEGÚN ESPECIES.")
		<table class="table-bordered text-center">
			<thead>
				<tr>
					<td>Unidad de Producción</td>
					<td>Bloque</td>
					<td>Nombre común</td>
					<td>CL</td>
					<td>CN</td>
					<td># Árboles</td>
				</tr>
			</thead>
			<tbody class="">
				@foreach ($arboles as $arbol)
				<tr>
					<td>{{$arbol->nombre_unidad}}</td>
					<td>{{$arbol->num_bloque}}</td>
					<td>{{$arbol->especie}}</td>
					<td>{{$arbol->cod_especie}}</td>
					<td>{{$arbol->cod_numerico}}</td>
					<td>{{$arbol->contador}}</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
		@if ($titulo=="4.NÚMERO DE ÁRBOLES POR PARCELA Y BLOQUE SEGÚN ESPECIES.")
		<table class="table-bordered text-center">
			<thead>
				<tr>
					<td>Unidad de Producción</td>
					<td>Bloque</td>
					<td>Parcela</td>
					<td>Nombre común</td>
					<td>CL</td>
					<td>CN</td>
					<td># Árboles</td>
				</tr>
			</thead>
			<tbody class="">
				@foreach ($arboles as $arbol)
				<tr>
					<td>{{$arbol->nombre_unidad}}</td>
					<td>{{$arbol->num_bloque}}</td>
					<td>{{$arbol->num_parcela}}</td>
					<td>{{$arbol->especie}}</td>
					<td>{{$arbol->cod_especie}}</td>
					<td>{{$arbol->cod_numerico}}</td>
					<td>{{$arbol->contador}}</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
		@if ($titulo=="5.VOLUMEN LA PARAGUA POR PARCELA Y BLOQUE SEGÚN ESPECIES.")
		<table class="table-bordered text-center">
			<thead>
				<tr>
					<td>Unidad de Producción</td>
					<td>Bloque</td>
					<td>Parcela</td>
					<td>Nombre común</td>
					<td>CL</td>
					<td>CN</td>
					<td>Volumen Paragua</td>
				</tr>
			</thead>
			<tbody class="">
				@foreach ($arboles as $arbol)
				<tr>
					<td>{{$arbol->nombre_unidad}}</td>
					<td>{{$arbol->num_bloque}}</td>
					<td>{{$arbol->num_parcela}}</td>
					<td>{{$arbol->especie}}</td>
					<td>{{$arbol->cod_especie}}</td>
					<td>{{$arbol->cod_numerico}}</td>
					@if ($arbol->altura_fus>$arbol->altura_tot)
					@if ($arbol->dap>=60)
					<td>{{/*rollizo*/round(0.081+0.499*($arbol->altura_fus)*(($arbol->dap/100)*($arbol->dap/100)),4)}}</td>
					@else
					<td>{{/*rollizo*/round(0.067+0.502*($arbol->altura_fus)*(($arbol->dap*$arbol->dap)/100),4)}}</td>
					@endif
					@else
					@if ($arbol->dap>=60)
					<td>{{/*rollizo*/round(0.081+0.499*($arbol->altura_tot)*(($arbol->dap/100)*($arbol->dap/100)),4)}}</td>
					@else
					<td>{{/*rollizo*/round(0.067+0.502*($arbol->altura_tot)*(($arbol->dap*$arbol->dap)/100),4)}}</td>
					@endif
					@endif
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
		@if ($titulo=="6.VOLUMEN MARN POR PARCELA Y BLOQUE SEGÚN ESPECIES.")
		<table class="table-bordered text-center">
			<thead>
				<tr>
					<td>Unidad de Producción</td>
					<td>Bloque</td>
					<td>Parcela</td>
					<td>Nombre común</td>
					<td>CL</td>
					<td>CN</td>
					<td>Volumen MARN</td>
				</tr>
			</thead>
			<tbody class="">
				@foreach ($arboles as $arbol)
				<tr>
					<td>{{$arbol->nombre_unidad}}</td>
					<td>{{$arbol->num_bloque}}</td>
					<td>{{$arbol->num_parcela}}</td>
					<td>{{$arbol->especie}}</td>
					<td>{{$arbol->cod_especie}}</td>
					<td>{{$arbol->cod_numerico}}</td>
					@if($arbol->altura_fus>$arbol->altura_tot)
					<td>{{/*marn en pie*/round(((($arbol->dap/100)*($arbol->dap/100))*$arbol->altura_fus*0.605),4) }}</td>
					@else
					<td>{{/*marn en pie*/round(((($arbol->dap/100)*($arbol->dap/100))*$arbol->altura_tot*0.605),4) }}</td>
					@endif
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
		@if ($titulo=="7.ÁREA BASAL POR BLOQUE SEGÚN ESPECIES.")
		<table class="table-bordered text-center">
			<thead>
				<tr>
					<td>Unidad de Producción</td>
					<td>Bloque</td>
					<td>Nombre común</td>
					<td>CL</td>
					<td>CN</td>
					<td>Área Basal</td>
				</tr>
			</thead>
			<tbody class="">
				@foreach ($arboles as $arbol)
				<tr>
					<td>{{$arbol->nombre_unidad}}</td>
					<td>{{$arbol->num_bloque}}</td>
					<td>{{$arbol->especie}}</td>
					<td>{{$arbol->cod_especie}}</td>
					<td>{{$arbol->cod_numerico}}</td>
					<td>{{/*area basal*/round((3.1415/4*$arbol->dap*$arbol->dap),4)}}</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
		@if ($titulo=="8.VOLUMEN LA PARAGUA POR BLOQUE SEGÚN ESPECIES.")
		<table class="table-bordered text-center">
			<thead>
				<tr>
					<td>Unidad de Producción</td>
					<td>Bloque</td>
					<td>Nombre común</td>
					<td>CL</td>
					<td>CN</td>
					<td>Volumen Paragua</td>
				</tr>
			</thead>
			<tbody class="">
				@foreach ($arboles as $arbol)
				<tr>
					<td>{{$arbol->nombre_unidad}}</td>
					<td>{{$arbol->num_bloque}}</td>
					<td>{{$arbol->especie}}</td>
					<td>{{$arbol->cod_especie}}</td>
					<td>{{$arbol->cod_numerico}}</td>
					@if ($arbol->altura_fus>$arbol->altura_tot)
					@if ($arbol->dap>=60)
					<td>{{/*rollizo*/round(0.081+0.499*($arbol->altura_fus)*(($arbol->dap/100)*($arbol->dap/100)),4)}}</td>
					@else
					<td>{{/*rollizo*/round(0.067+0.502*($arbol->altura_fus)*(($arbol->dap*$arbol->dap)/100),4)}}</td>
					@endif
					@else
					@if ($arbol->dap>=60)
					<td>{{/*rollizo*/round(0.081+0.499*($arbol->altura_tot)*(($arbol->dap/100)*($arbol->dap/100)),4)}}</td>
					@else
					<td>{{/*rollizo*/round(0.067+0.502*($arbol->altura_tot)*(($arbol->dap*$arbol->dap)/100),4)}}</td>
					@endif
					@endif
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
		@if ($titulo=="9.VOLUMEN MARNS POR BLOQUE SEGÚN ESPECIES.")
		<table class="table-bordered text-center">
			<thead>
				<tr>
					<td>Unidad de Producción</td>
					<td>Bloque</td>
					<td>Nombre común</td>
					<td>CL</td>
					<td>CN</td>
					<td>Volumen MARN</td>
				</tr>
			</thead>
			<tbody class="">
				@foreach ($arboles as $arbol)
				<tr>
					<td>{{$arbol->nombre_unidad}}</td>
					<td>{{$arbol->num_bloque}}</td>
					<td>{{$arbol->especie}}</td>
					<td>{{$arbol->cod_especie}}</td>
					<td>{{$arbol->cod_numerico}}</td>
					@if($arbol->altura_fus>$arbol->altura_tot)
					<td>{{/*marn en pie*/round(((($arbol->dap/100)*($arbol->dap/100))*$arbol->altura_fus*0.605),4) }}</td>
					@else
					<td>{{/*marn en pie*/round(((($arbol->dap/100)*($arbol->dap/100))*$arbol->altura_tot*0.605),4) }}</td>
					@endif
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
		@if ($titulo=="11.EQUIPO DE TRABAJO POR PARCELA Y BLOQUE.")
		<table class="table-bordered text-center">
			<thead>
				<tr>
					<td>Unidad de Producción</td>
					<td>Bloque</td>
					<td>Parcela</td>
					<td>Responsable</td>
					<td>Ayudante</td>
					<td>Baqueano</td>
				</tr>
			</thead>
			<tbody class="">
				@foreach ($arboles as $arbol)
				<tr>
					<td>{{$arbol->nombre_unidad}}</td>
					<td>{{$arbol->num_bloque}}</td>
					<td>{{$arbol->num_parcela}}</td>
					<td>{{$arbol->responsable}}</td>
					<td>{{$arbol->ayudante}}</td>
					<td>{{$arbol->baqueano}}</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
	</fieldset>
</div>

@stop