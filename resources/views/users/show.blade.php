@extends('vendor.adminlte.layouts.app')
@section('htmlheader_title')
Gestión de Roles y Permisos
@endsection
@section('main-content')
<div class="container-fluid spark-screen" id="contenidoItem">
    <div class="row">
        <div class="box box-primary" style="border: 1px solid #3c8dbc;">
            <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Datos del Usuario</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-default" href="{{ route('users.index') }}"><i
                            class="fa fa-reply-all" aria-hidden="true"></i> Volver</a>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Login del usuario:</strong>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email del usuario:</strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Rol(es):</strong>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="label label-info">{{ $v }}</label>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection