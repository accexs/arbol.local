@extends('layouts.master')

@section('title')
@parent
:: Login
@stop

@section('content')
<div class="row jumbotron">
	<br><br>
	@if (Auth::guest())
	<div>
		{{ Form::open (array('url' => '/', 'class'=> 'form-horizontal col-md-2 col-md-offset-5')) }}
			<div class="form-group">
					{{ Form::label('username','Usuario', array('class' => 'control-label')) }}
					<div class="">
						{{ Form::text('username', null, array('class' => 'form-control')) }}	
					</div>
			</div>

			<div class="form-group">
				{{ Form::label('password','Contraseña', array('class' => 'control-label')) }}
				<div class="">
					{{ Form::password('password',array('class' => 'form-control')) }}	
				</div>
			</div>
			{{ Form::submit('Login', array('class' => 'btn btn-primary btn-sm'))}}
		{{ Form::close() }}
	</div>
	@endif
</div>


@stop