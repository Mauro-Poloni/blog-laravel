@extends('adminlte::page')

@section('title', 'Administracion')

@section('content_header')
<h1>Roles</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>    
@endif
<div class="card">
    <div class="card-header">
        @can('admin.roles.create')
            <a href="{{route('admin.roles.create')}}" class="btn btn-secondary btn-sm float-right">Agregar rol</a>
        @endcan
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $rol)
                <tr>
                    <td>{{$rol->id}}</td>
                    <td>{{$rol->name}}</td>
                    <td width="10px">
                        @can('admin.roles.edit')
                            <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit',$rol)}}">Editar</a>
                        @endcan
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.roles.destroy',$rol)}}" method="POST">
                            @csrf
                            @method('delete')
                            @can('admin.roles.destroy')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop