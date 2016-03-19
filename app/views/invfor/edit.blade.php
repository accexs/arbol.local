@extends('layouts.master')

@section('title')
@parent
:: Editar Árbol
@stop

@section('content')

<div class="row">
{{ Form::open (array('url' => 'invfor.edit',
						'class' => 'form-horizontal')) }}
<fieldset>
	<legend>Buscar árbol por coordenadas</legend>
	<div class="form-group">
		{{ Form::label('norte','UTM Norte', array('class' => 'col-md-2 control-label')) }}
		<div class="col-md-2">
			{{ Form::text('norte', Input::old('norte'), array('class' => 'form-control')) }}
		</div>
		{{ Form::label('este','UTM Este', array('class' => 'col-md-2 control-label')) }}
		<div class="col-md-2">
			{{ Form::text('este', Input::old('este'), array('class' => 'form-control')) }}
		</div>
	</div>
	<br>
	{{ Form::submit('Buscar', array('class' => 'btn btn-primary btn-sm col-md-offset-1'))}}
</fieldset>
{{ Form::close()}}	
</div>

@stop