@extends('layouts.master')

@section('title')
@parent
:: Registrar Especie
@stop

@section('content')
<div class="row">
	{{ Form::open (array('url' => 'arbol',
						'class' => 'form-horizontal col-md-12')) }}
		<fieldset>
			<legend>Agregar árbol</legend>
			<div class="form-group">
				{{ Form::label('cod_especie','Código de especie', array('class' => 'col-md-2 control-label'))}}
				<div class="col-md-1">
					{{ Form::text('cod_especie', Input::old('codEspecie'), array('class' => 'form-control')) }}
				</div>
				{{ Form::label('especie','Tipo especie', array('class' => 'col-md-2 control-label')) }}
				<div class="col-md-2">
						{{ Form::select('especie',
							['blanda' => 'Blanda',
   							'dura' => 'Dura',
   							'semidura' => 'Semidura'],
   							null,['class' => 'form-control']) }}	
				</div>
				{{ Form::label('nombre_cient','Nombre científico', array('class' => 'col-md-2 control-label'))}}
				<div class="col-md-2">
					{{ Form::text('nombre_cient', Input::old('nombre_cient'), array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('nombre_vulgar','Nombre vulgar', array('class' => 'col-md-2 control-label'))}}
				<div class="col-md-2">
					{{ Form::text('nombre_vulgar', Input::old('nombre_vulgar'), array('class' => 'form-control')) }}
				</div>
				{{ Form::label('familia','Familia', array('class' => 'col-md-1 control-label'))}}
				<div class="col-md-2">
					{{ Form::text('familia', Input::old('familia'), array('class' => 'form-control')) }}
				</div>
				{{ Form::label('cod_numerico','Código númerico', array('class' => 'col-md-2 control-label'))}}
				<div class="col-md-1">
					{{ Form::text('cod_numerico', Input::old('cod_numerico'), array('class' => 'form-control')) }}
				</div>
			
			</div>
			{{ Form::submit('Agregar', array('class' => 'btn btn-primary btn-sm col-md-offset-1'))}}
		</fieldset>
		{{ Form::close() }}
</div>


@stop