@extends('layouts.master')

@section('title')
@parent
:: Editar unidad de producción
@stop

@section('content')
<div class="row">
	<legend>Administrar Unidad de Producción: {{ $unidad->nombre }}</legend>
</div>
<div class="row ">
	<div class="col-md-3">
		<table class="table table-striped table-bordered table-condensed">
			<tr>
				<br>
				<td>{{ Form::open(array('url' => 'bloque')) }}
					{{ Form::hidden('id_bloque',$unidad->id) }}
					{{ Form::label('num_bloque','# Bloque', array('class' => 'control-label'))}}</td>
					<td>{{ Form::text('num_bloque', Input::old('num_bloque'), array('class' => 'form-control')) }}</td>
					<td>{{ Form::submit('Agregar Bloque', array('class' => 'btn btn-success btn-sm')) }}
						{{ Form::close() }}</td>
					</tr>
				</table>
			</div>
			<div class="col-md-9">
				{{ HTML::ul($errors->all()) }}
				<div class="table-responsive text-center">
					<table class="table table-striped table-bordered table-condensed">
						<thead>
							<tr>
								<td>Bloque</td>
								<td># Parcela</td>
								<td>Parcelas</td>
							</tr>
						</thead>
						<tbody>
							@foreach ($unidad->bloques()->get() as $value)
							<tr>
								<td>{{ $value->num_bloque }}</td>
								<td>{{ Form::open(array('url' => 'parcela/' . $value -> id, 'method' => 'DELETE', 'class' => 'pull-left','style'=>'margin-left: 3px')) }}
									{{ Form::select('parcelas',Parcela::where('id_bloque','=',$value->id)->lists('num_parcela','id'),null,['class' => 'form-control ']) }}
								</td>
								<td>
									<div class="wrapper text-center">
										<div class="btn-group">
											{{ Form::submit('Eliminar Parcela', array('class' => 'btn btn-sm btn-warning',
											'style'=>'border-radius: 3px;')) }}
											{{ Form::close() }}

											<!--parcela-->
											<a style="margin-left: 3px; border-radius: 3px;" id="open{{$value->id}}" href="#" data-id="{{$value->id}}" class="btn btn-sm btn-info pull-left">Agregar parcela</a>
											{{ HTML::script('/js/jquery-2.1.3.js') }}
											{{ HTML::script('/js/bootstrap.js') }}
											{{ HTML::script('/js/bootbox.js') }}
											<script type="text/javascript">
												$(document).ready(function(){
													$('#open<?php echo $value->id; ?>').click(function(){
                //alert("ayudante");
                bootbox.dialog({
                	title: "Equipo de trabajo.",
                	message: 
                	"<div class='form-group row'>"+
                	"<form id='my-form' method='POST' action='/parcela' accept-charset='UTF-8'>"+
                	"<input name='_token' type='hidden' value='Vnuk0ulo1073BIny0ju9zq7rNKetpVd0SJNMLgyY'>"+
                	"<label for='baqueano' class='col-lg-4 control-label'> Baqueano </label>"+
                	"<div class='col-lg-8'>"+
                	"<input name='baqueano' class='form-control type='text' id='baqueano'>"+
                	"</div>"+
                	"<label for='ayudante' class='col-lg-4 control-label'> Ayudante </label>"+
                	"<div class='col-lg-8'>"+
                	"<input name='ayudante' class='form-control type='text' id='ayudante'>"+
                	"</div>"+
                	"<label for='responsable' class='col-lg-4 control-label'> Responsable </label>"+
                	"<div class='col-lg-8'>"+
                	"<input name='responsable' class='form-control type='text' id='responsable'>"+
                	"<input name='id_parcela' type='hidden' id='id_parcela' value='<?php echo $value->id; ?>' >"+
                	"</div>"+
                	"</div>"+
                	"</form>",
                	buttons: {
                		success: {
                			label: "Guardar",
                			className: "btn-success",
                			callback: function () {
                				$('#my-form').submit();
                			}
                		}
                	}
                }
                );
});
});
</script>

<!--parcela-->


{{ Form::open(array('url' => 'bloque/' . $value -> id, 'method' => 'DELETE', 'class' => 'pull-left','style'=>'margin-left: 3px')) }}
{{ Form::submit('Eliminar Bloque', array('class' => 'btn btn-sm btn-danger')) }}
{{ Form::close() }}
</div>	
</div>	
</td>
</tr>
@endforeach

</tbody>
</table>
</div>
</div>	
</div>
<script>

</script>
@stop