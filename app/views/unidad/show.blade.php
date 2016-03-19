@extends('layouts.master')

@section('title')
@parent
:: Detalles unidad
@stop

@section('content')
<h2>Unidad de Producción: {{ $unidad->nombre }}</h2>
	<div class="jumbotron text-left">
		<p>
			<strong>Estado:</strong> {{ $unidad -> estado }}<br>
			<strong>Municipio:</strong> {{ $unidad -> municipio }}<br>
			<strong>Reserva:</strong> {{ $unidad -> reserva }}<br>
			<strong>Bloques:</strong> {{ $unidad -> bloques()->count() }}<br>
		</p>
	</div>
@stop