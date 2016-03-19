@extends('layouts.master')

@section('title')
@parent
:: Registrar árbol
@stop

@section('content')

<div class="row">
{{ Form::open (array('url' => 'invfor',
						'class' => 'form-horizontal')) }}
<fieldset>
	<legend>Registrar Inventario Forestal</legend>
	<table class="table-striped table-bordered table-condensed">
	  <tr>
	  	<tr>
	  		<th colspan="4" style="border-right-style:none" class="text-center">
		    {{ Form::label('unidades','UNIDAD DE PRODUCCIÓN:', array('class' => 'control-label'))}}
		    </th>
		    <td colspan="2" style="border-left-style:none">
		    {{ Form::select('unidades',Unidad::all()->lists('nombre','id'),"seleccione",['class' => 'form-control',
				'id' => 'unidades']) }}
		    </td>
	  	</tr>
	  </tr>
	  <tr>
	    <td class="text-center" colspan="2" style="border-right-style:none">
	    {{ Form::label('bloques','BLOQUE', array('class' => 'control-label'))}}
	    </td>
	    <td colspan="2" style="border-left-style:none">
	    {{ Form::select('bloques',['#' => '#'],null,['class' => 'form-control',
				'id' => 'bloques']) }}
	    </td>
	    <td class="text-center" style="border-right-style:none">
	    {{ Form::label('parcelas','PARCELA', array('class' => 'control-label'))}}
	    </td>
	    <td style="border-left-style:none">
	    {{ Form::select('parcelas',['#' => '#'],null,['class' => 'form-control',
				'id' => 'parcelas']) }}
   		</td>

	    <td class="text-center">
	    {{ Form::label('num_arbol','# ARBOL', array('class' => 'control-label'))}}
	    </td>

	    <td class="text-center">
	    {{ Form::text('num_arbol',null, array('class' => 'form-control', 'rows' => '1')) }}
	    </td>

	    <td colspan="2" class="text-center">
	    {{ Form::label('observaciones','OBSERVACIONES', array('class' => 'control-label'))}}
	    </td>

   		<td colspan="2">
	    {{ Form::textarea('observaciones',null, array('class' => 'form-control', 'rows' => '1')) }}
	    </td>
	  </tr>
	  <tr>
	    <td colspan="3" rowspan="2" class="text-center">
	    {{ Form::label('tipoarbol','TIP. DE ÁRBOL', array('class' => 'control-label'))}}
	    </td>
	    <td rowspan="2" class="text-center">
	    {{ Form::label('cod_especie','Cod especie', array('class' => 'control-label'))}}
	    </td>
	    <td rowspan="2" class="text-center">
	    {{ Form::label('cap','CAP (cm)', array('class' => 'control-label'))}}
	    </td>
	    <td rowspan="2" class="text-center">
	    {{ Form::label('dap','DAP (cm)', array('class' => 'control-label'))}}
	    </td>
	    <td rowspan="2" class="text-center">
	    {{ Form::label('fuste','h FUSTE (m)', array('class' => 'control-label'))}}
	    </td>
	    <td rowspan="2" class="text-center">
	    {{ Form::label('htotal','H TOTAL (m)', array('class' => 'control-label'))}}
	    </td>
	    <td colspan="2" class="text-center">
	    {{ Form::label('coordenadas','COORDENADAS', array('class' => 'control-label'))}}
	    </td>
	    <td rowspan="2" class="text-center">
	    {{ Form::label('calfuste','Calidad F', array('class' => 'control-label'))}}
	    </td>
	    <td rowspan="2" class="text-center">
	    {{ Form::label('vitalidad','Vitalidad', array('class' => 'control-label'))}}
	    </td>
	  </tr>
	  <tr>
	    <td class="text-center">
	    {{ Form::label('norte','NORTE', array('class' => 'control-label'))}}
	    </td>
	    <td class="text-center">
	    {{ Form::label('este','ESTE', array('class' => 'control-label'))}}
	    </td>
	  </tr>
	  <tr>
	    <td colspan="3">
	    {{ Form::select('tipoarbol',['normal' => 'Aprovechable',
   							'candidato' => 'Padre'],null,['class' => 'form-control',
   							'id' => 'tipoarbol']) }}
	    </td>
	    <td>
	    {{ Form::text('cod_especie', Input::old('cod_especie'), array('class' => 'form-control')) }}
	    </td>
	    <td>
	    {{ Form::text('cap', Input::old('cap'), array('class' => 'form-control', 'id' => 'cap')) }}
	    </td>
	    <td>
	    {{ Form::text('dap', Input::old('dap'), array('class' => 'form-control', 'id' => 'dap')) }}
	    </td>
	    <td>
	    {{ Form::text('fuste', Input::old('fuste'), array('class' => 'form-control', 'id' => 'fuste')) }}
	    </td>
	    <td>
	    {{ Form::text('htotal', Input::old('htotal'), array('class' => 'form-control', 'id' => 'htotal')) }}
	    </td>
	    <td>
	    {{ Form::text('norte', Input::old('norte'), array('class' => 'form-control')) }}
	    </td>
	    <td>
	    {{ Form::text('este', Input::old('cap'), array('class' => 'form-control')) }}
	    </td>
	    <td>
	    {{ Form::select('calfuste',['B' => 'Buena',
   							'M' => 'Mala',
   							'R' => 'Regular'],null,['class' => 'form-control']) }}
	    </td>
	    <td>
	    {{ Form::select('vitalidad',['1' => 'Sano',
   							'2' => 'lig. Atacado',
   							'3' => 'Enfermo'],null,['class' => 'form-control']) }}
	    </td>
	  </tr>
	</table>
	<br>
	{{ Form::submit('Agregar', array('class' => 'btn btn-primary btn-sm col-md-offset-1'))}}
</fieldset>
{{ Form::close( )}}	
</div>

@stop