@extends('adminlte::page')

@section('title', 'Administracion')

@section('content_header')
<h1>Etiquetas</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>    
    @endif
    <div class="card">
        <div class="card-header">
            @can('admin.tags.create')
                <a href="{{route('admin.tags.create')}}" class="btn btn-secondary btn-sm float-right">Crear etiqueta</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="10px">
                                @can('admin.tags.edit')
                                    <a href="{{route('admin.tags.edit',$tag)}}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.tags.destroy',$tag)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    @can('admin.tags.destroy')
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