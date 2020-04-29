@extends('adminlte::layouts.auth')
@section('htmlheader_title')
Iniciar Sesión
@endsection
@section('content')

<body class="hold-transition login-page" style=" background-image: url('{{ asset('/img/fondo_acceso.jpg') }}');background-size: cover;
    background-repeat: no-repeat; height: 100%;">
    <div id="app" v-cloak>
        <div class="login-box" style="width: 450px;">
            <div class="login-logo"
                style="background-color: rgba(0,0,0,0.7) !important;border-radius: 10px;padding: 5px 5px 5px 5px">
                <a href="{{ url('/home') }}" style="color:white;font-size:28px; display:inline-block;"><img
                        src="{{ asset('/img/unasam.png') }}" alt=""
                        style="padding-top: 10px;width: 70px; display:inline-block;font-size: 1"><br><span style=""><strong>
                            Acceso al Panel de Administración de la Pagina web de la Facultad</strong></span><br></a>
            </div><!-- /.login-logo -->
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error!</strong> Tenemos algunos Algunos Problemas<br>
                <ul style="margin-bottom: 0px;">
                    @foreach ($errors->all() as $error)
                    @if($error=="The name field is required.")
                    <li>El campo Usuario es necesario.</li>
                    @endif
                    @if($error=="The password field is required.")
                    <li>El campo Contraseña es necesario.</li>
                    @endif
                    @if($error=="These credentials do not match our records.")
                    <li>Estas credenciales no coinciden con nuestros registros.</li>
                    @endif
                    @if($error=="verifystatus")
                    <li>El usuario del sistema se encuentra desactivado, comuncarse con el administrador del sistema.
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('errorMessage'))
            <div class="alert alert-danger">
                <strong>Error!</strong> Tenemos algunos Algunos Problemas<br>
                {{ session('errorMessage') }}
            </div>
            @endif
            <div class="login-box-body"
                style="background-color: rgba(0,0,0,0.7) !important;color: white;border-radius: 10px;">
                <p class="login-box-msg" style="font-size: 17px;"> Ingrese sus credenciales para iniciar sesión </p>
                <form action="{{ url('/login') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="usuario" name="name" id="name" autofocus />
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control"
                            placeholder="{{ trans('adminlte_lang::message.password') }}" name="password" />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="checkbox icheck">
                                <label>
                                    <input style="display:none;" type="checkbox" name="remember"> Recuerdame
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" style="border-radius: 10px">Iniciar Sesión</button>
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <button type="reset" class="btn btn-danger btn-block btn-flat" id="reset" style="border-radius: 10px">Cancelar</button>
                        </div>
                    </div>
                    <br>
                    <p style=""><span>Developed by </span><a href="http://ogtise.unasam.edu.pe/" target="_blank"> OGTISE UNASAM</a></p>
                </form>
            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
        $("#reset").click(function() {
            $("#name").focus();
        });
      });
    </script>
</body>

@endsection