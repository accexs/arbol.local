@extends('layouts.partial')

@section('title')
@class_parents
:: Personas
@stop

@section('content')
<div class="modalDialog make-visible">
	{{ HTML::ul($errors->all()) }}
	{{ Form::open (array('url' => 'unidad',
	'class'=> 'form-horizontal col-md-8')) }}
	{{ Form::hidden('id_parcela',$value->id) }}
	<fieldset>
		<legend>Registrar Unidad de Producción</legend>
		<div class="form-group">

			{{ Form::label('responsable','Responsable', array('class' => 'col-lg-4 control-label')) }}
			<div class="col-lg-8">
				{{ Form::text('responsable', Input::old('responsable'), array('class' => 'form-control')) }}
			</div>
			{{ Form::label('ayudante','Ayudante', array('class' => 'col-lg-4 control-label')) }}
			<div class="col-lg-8">
				{{ Form::text('ayudante', Input::old('ayudante'), array('class' => 'form-control')) }}
			</div>
			{{ Form::label('baqueano','Baqueano', array('class' => 'col-lg-4 control-label')) }}
			<div class="col-lg-8">
				{{ Form::text('baqueano', Input::old('baqueano'), array('class' => 'form-control')) }}
			</div>
		</div>

		{{ Form::submit('Registrar parcela', array('class' => 'btn btn-primary btn-sm col-lg-offset-3'))}}
	</fieldset>
	{{ Form::close() }}
</div>

	@stop