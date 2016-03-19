@extends('layouts.master')

@section('title')
@parent
:: Administracion Arbol
@stop

@section('content')
<div class="row">
	{{ Form::model ($arbol, array('class'=> 'form-horizontal', 'method' => 'PUT', 'route' => array('arbol.update', $arbol -> id))) }}
		<fieldset>
			<legend>Actualizar árbol</legend>
			<div class="form-group">
				{{ Form::label('cod_especie','Código de especie', array('class' => 'col-md-2 control-label'))}}
				<div class="col-md-1">
					{{ Form::text('cod_especie', Input::old('cod_especie'), array('class' => 'form-control')) }}
				</div>
				{{ Form::label('tipo_especie','Dureza', array('class' => 'col-md-2 control-label')) }}
				<div class="col-md-2">
						{{ Form::select('tipo_especie',
							['blanda' => 'Blanda',
   							'dura' => 'Dura',
   							'semidura' => 'Semidura'],
   							null,['class' => 'form-control']) }}	
				</div>
				{{ Form::label('nombre_cientifico','Nombre científico', array('class' => 'col-md-2 control-label'))}}
				<div class="col-md-2">
					{{ Form::text('nombre_cientifico', Input::old('nombre_cientifico'), array('class' => 'form-control')) }}
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
			{{ Form::submit('Actualizar', array('class' => 'btn btn-primary btn-sm col-md-offset-1'))}}
		</fieldset>
		{{ Form::close() }}
</div>
@stop