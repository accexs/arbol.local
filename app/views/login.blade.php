@extends('layouts.master')

@section('title')
@parent
:: Login
@stop

@section('content')
<div class="row">
	<fieldset>
		{{ Form::open (array('url' => 'login', 'class'=> 'form-horizontal col-md-4 col-md-offset-4')) }}
			<p>
				{{ $errors->first('email') }}
				{{ $errors->first('password') }}
			</p>
			<div class="form-group">
					{{ Form::label('email','Email', array('class' => 'control-label')) }}
					<div class="col-md-12">
						{{ Form::email('email', null, array('class' => 'form-control')) }}	
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('password','Contraseña', array('class' => 'control-label')) }}
					<div class="col-md-12">
						{{ Form::password('password',array('class' => 'form-control')) }}	
					</div>
				</div>
				{{ Form::submit('Login', array('class' => 'btn btn-primary btn-sm'))}}
		{{ Form::close() }}

	</fieldset>
</div>


@stop