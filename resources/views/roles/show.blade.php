@extends('vendor.adminlte.layouts.app')
@section('htmlheader_title')
Gestión de Roles y Permisos
@endsection
@section('main-content')
<div class="row container-fluid">
    <div class="box box-primary" style="border: 1px solid #3c8dbc;">
        <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Permisos del Rol</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default" href="{{ route('roles.index') }}"><i class="fa fa-reply-all"
                        aria-hidden="true"></i> Volver</a>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                <label class="label label-success">{{ $v->name }},</label>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection