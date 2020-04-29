@extends('vendor.adminlte.layouts.app')
@section('htmlheader_title')
Gestión de Usuarios
@endsection
@section('main-content')
<div class="container-fluid spark-screen" id="contenidoItem">
    <div class="row container-fluid">
        <div class="box box-primary" style="border: 1px solid #3c8dbc;">
            <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
                <h3 class="box-title">EDITAR EL USUARIO</h3>
            </div>
            <div class="box-body table-responsive">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="fa fa-reply-all"
                                    aria-hidden="true"></i> Volver</a>
                        </div>
                    </div>
                    <hr>
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                

                @if ($message = Session::get('danger'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
                @endif

                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>Password:</strong>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control'))
                            !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' =>
                            'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="form-group">
                            <strong>Role:</strong>
                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple'))
                            !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="form-group">
                            <strong>Facultades:</strong>
                            <select class="form-control" id="facultad_id" name="facultad_id">
                                <option value="0">Seleccionar la Facultad...</option>
                                @foreach ($facultades as $facultad)
                                @if ($facultad->id == $user->facultad_id)
                                <option value="{{$facultad->id}}" selected>
                                    {{$facultad->nombre.' - '.$facultad->abreviatura}}
                                </option>
                                @else
                                <option value="{{$facultad->id}}">{{$facultad->nombre.' - '.$facultad->abreviatura}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection