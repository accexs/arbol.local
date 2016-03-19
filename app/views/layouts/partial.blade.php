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
    {{ HTML::style('css/bootstrap-responsive.css') }}
    {{ HTML::style('css/popup-parcela.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}    
    @yield('header')



</head>

<body style="margin-top:2px">   

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
</div>


<!-- Scripts are placed here -->
{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js') }}
{{ HTML::script('/js/bootstrap.js') }}
<script type="text/javascript">
        $(document).ready(function(){
            $('.open').click(function(){
                //$('.make-visible').hide();
                alert(text)
            });
        });
    </script>
</body>
</html>

