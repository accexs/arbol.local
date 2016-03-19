@extends('layouts.master')

@section('title')
@parent
:: Agregar unidad de producción
@stop

@section('content')
<div class="row">
	{{ HTML::ul($errors->all()) }}
	{{ Form::open (array('url' => 'unidad',
						'class'=> 'form-horizontal col-md-8')) }}
		<fieldset>
			<legend>Registrar Unidad de Producción</legend>
				<div class="form-group">
						{{ Form::label('name','Nombre', array('class' => 'col-lg-4 control-label')) }}
					<div class="col-lg-8">
						{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="form-group">
						{{ Form::label('estado','Estado', array('class' => 'col-lg-4 control-label')) }}
					<div class="col-lg-8">
						{{ Form::text('estado', Input::old('estado'), array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="form-group">
						{{ Form::label('municipio','Municipio', array('class' => 'col-lg-4 control-label')) }}
					<div class="col-lg-8">
						{{ Form::text('municipio', Input::old('municipio'), array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="form-group">
						{{ Form::label('reserva','Reserva', array('class' => 'col-lg-4 control-label')) }}
					<div class="col-lg-8">
						{{ Form::text('reserva', Input::old('reserva'), array('class' => 'form-control')) }}
					</div>
				</div>
				{{ Form::submit('Registrar', array('class' => 'btn btn-primary btn-sm col-lg-offset-3'))}}
		</fieldset>
	{{ Form::close() }}
</div>
@stop