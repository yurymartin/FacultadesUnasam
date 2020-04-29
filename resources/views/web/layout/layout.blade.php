<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$facultad->nombre}}</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('/img/icon.png') }}" />

    <!-- CSS Bootstrap & Custom -->
    <link href="{{ asset('web/css/bootstrap.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('web/css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('web/css/animate.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}">
    <link href="{{ asset('style.css') }}" rel="stylesheet" media="screen">

    <!-- Favicons -->
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}">

    <!-- JavaScripts -->
    <script src="{{ asset('web/js/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('web/js/modernizr.js') }}"></script>
    <!--[if lt IE 8]>
    <!------------------ SCROLL REVEAL--------------------->
    <!----------------------------------------------------->

</head>

<body>
    <!-- JavaScripts -->
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web/js/custom.js') }}"></script>
    <script src="{{ asset('web/js/plugins.js') }}"></script>
    <!--------------------------------------   HEADER --------------------------------------------->
    @include('web.layout.header')
    <!--------------------------------------------------------------------------------------------->
    <!--------------------------------------   BODY ----------------------------------------------->
    @yield('contenido')
    <!--------------------------------------------------------------------------------------------->
    <!--------------------------------------   FOOTER  -------------------------------------------->
    @include('web.layout.footer')
    <!--------------------------------------------------------------------------------------------->
    <script>
        // sidebar toggle
    const btnToggle = document.querySelector('.toggle-btn');
    btnToggle.addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('active');
    })

    btncerrar.addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('active');
    })

    //valor de los colores de textos
    var fondoheader = document.getElementById("fondoheader");
    var fondofooter = document.getElementById("fondofooter");
    var fondonavbar = document.getElementById("fondonavbar");
    //valor de los colores de textos
    var textoheader = document.getElementById("textoheader");
    var textofooter = document.getElementById("textofooter");
    var textonavbar = document.getElementById("textonavbar");


    fondoheader.onchange = function() {
        document.getElementById("codigofondoheader").value = fondoheader.value;
    }

    textoheader.onchange = function() {
        document.getElementById("codigotextoheader").value = textoheader.value;
    }

    //footer
    fondofooter.onchange = function() {
        document.getElementById("codigofondofooter").value = fondofooter.value;
    }

    textofooter.onchange = function() {
        document.getElementById("codigotextofooter").value = textofooter.value;
    }
    
    //navbar

    fondonavbar.onchange = function() {
        document.getElementById("codigofondonavbar").value = fondonavbar.value;
    }

    textonavbar.onchange = function() {
        document.getElementById("codigotextonavbar").value = textonavbar.value;
    }


    </script>
</body>

</html>