<!DOCTYPE html>
<html>
<head>
    <title>
        @section('title')
        Arbol
        @show
    </title>
    <meta charset="utf-8"></meta>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"></meta>
    <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
    <meta content="" name="website Arbol"></meta>
    <meta content="" name="Ronald Gay"></meta>


    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    @yield('header')



</head>

<body style="margin-top:2px">   
    <div class="container">
        <!--nav-->
        <div class="row">
        <div>
           {{ HTML::image ('img/logo.jpg','Responsive image', array('class' => 'img-responsive img-rounded')) }}
            <nav class="navbar navbar-default" role="navigation">
                <div class="">
                    <ul class="nav navbar-nav justify" >

                        @if(URL::current()==URL::to('/'))
                            <li class="active">
                        @else
                            <li>
                                @endif
                                <a href="{{{ URL::action('EnfController@showLogin') }}}">Inicio</a>
                            </li>
                        @if(URL::current()==URL::to('arbol'))
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{{ URL::action('ArbolController@index') }}}">Listado de especies</a>
                            </li>
                        @if(URL::current()==URL::to('unidad'))
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{{ URL::action('UnidadController@index') }}}">Registro Unidad de Producción</a>
                            </li>
                        @if(URL::current()==URL::to('invfor/create'))
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{{ URL::action('InvforController@create') }}}">Datos Censo</a>
                            </li>
                        @if(URL::current()==URL::to('invfor/%7Binvfor%7D/edit'))
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{{ URL::action('InvforController@edit') }}}">Gestión Datos Censo</a>
                            </li>
                        @if(URL::current()==URL::to('consultar'))
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{{ URL::action('consultasController@consultarInv') }}}">Consultar y Exportar</a>
                            </li>
							@if(URL::current()==URL::to('manual'))
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{ asset('manual/manual.pdf')}}">Manual Usuario</a>
                            </li>
                        @if (Auth::guest())
                        @else
                            <li style="margin-left:20px">{{ HTML::link('logout','Logout') }}</li>       
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
        </div>

                            <!--content-->
                            <div id="main" class="">
                                {{ HTML::ul($errors->all()) }}
                                @if (Session::has('message'))
                                <div class="alert alert-dismissable alert-info">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                                @yield('content')
                            </div>
                            <br>

                            <!--footer-->
                            <div>        
                                <footer id="footer" class="row">
                                    {{ HTML::image ('img/barra.jpg','Responsive image', array('class' => 'img-responsive img-rounded')) }}
                                </footer>
                            </div>
    </div>


                        <!-- Scripts are placed here -->
                        {{ HTML::script('/js/jquery-2.1.3.js') }}
                        {{ HTML::script('/js/bootstrap.js') }}
                        {{ HTML::script('/js/bootbox.js') }}
                        <script type="text/javascript">

                            function populateBloque() {
        //aqui van las insctrucciones para llenar las otras listas    
        //alert("It's Working");   
        $.ajax({
                //data:  $('#unidades').val(),
                type:  'get',
                url:   '/getbloques/'+$('#unidades').val(),
                //dataType: 'JSON',
                beforeSend: function () {
                        //$("#test").html("Procesando, espere por favor...->  "+$('#unidades').val());
                        //alert("Procesando...");
                    },
                    success:  function (data) {
                        var select = $('#bloques');
                        var options = select.prop('options');
                        $('option', select).remove();
                        $('#bloques').append('<option value=#>#</option>');
                        $.each(data, function(index, array) {
                            options[options.length] = new Option(array['num_bloque'],array['id']);
                        //new Option([text], [value], [defaultSelected], [selected])
                    });

                    //$("#test").html("Records procesados");
                }
            });
}

function populateParcela() {
        //aqui van las insctrucciones para llenar las otras listas    
        //alert("It's Working");   
        $.ajax({
                //data:  $('#unidades').val(),
                type:  'get',
                url:   '/getparcelas/'+$('#bloques').val(),
                //dataType: 'JSON',
                beforeSend: function () {
                        //$("#test").html("Procesando, espere por favor...->  "+$('#bloques').val());
                        //alert("Procesando...");
                    },
                    success:  function (data) {
                        var select = $('#parcelas');
                        var options = select.prop('options');
                        $('option', select).remove();
                        $('#parcelas').append('<option value=#>#</option>');
                        $.each(data, function(index, array) {
                            options[options.length] = new Option(array['num_parcela'],array['id']);
                        });

                    //$("#test").html("Records procesados");
                }
            });
    }


    function validateTipo() {
        //aqui van las insctrucciones para llenar las otras listas    
            //alert("It's Working validateTipo");
            //$("#test").html($('#tipoarbol').val());
            if ($('#tipoarbol').val() == 'candidato') {
                //
                //alert("Es candidato");
                $('#fuste').prop('disabled', true);
                $('#htotal').prop('disabled', false);
            } else {
                //
                //alert("Es normal");
                $('#htotal').prop('disabled', true);
                $('#fuste').prop('disabled', false);
            }
        }
        

        $(document).ready(function() {


            populateBloque();
            $('#unidades').change(function() {
                populateBloque();
            });
            
            populateParcela();
            $('#bloques').change(function() {
                populateParcela();
            });

            validateTipo();
            $('#tipoarbol').change(function() {
                //alert('entrando');
                //populateParcela();
                validateTipo();
            });

            $('#cap').change(function() {
                //alert('calculando dap');
                //formula
                var dap = ($('#cap').val()/3.1415);
                $('#dap').val(dap.toFixed(2));
            });

            $('#dap').change(function() {
                //alert('calculando cap');
                //formula
                var cap = ($('#dap').val()*3.1415);
                $('#cap').val(cap.toFixed(2));
            });

            //$('#exportar').click(exportar());
            //$('#esportar').on('click', exportar());
            $('#exportar').click(function(){
                //alert('click');
                @if (isset($arboles))
                var arboles = {{ json_encode($arboles) }}
                //alert(arboles);
                //arboles = JSON.stringify(arboles);
                //alert(arboles);
                @endif
                $.ajax({
                    type:  'POST',
                    url:   '/exportar',
                    data: {data : arboles},
                    //dataType: 'JSON',
                    beforeSend: function () {
                        //
                        alert("Exportando......");
                    },
                    success:  function (data) {
                        //
                        alert("Data exportada");
                    }
                });
            });
        });
</script>
</body>
</html>


