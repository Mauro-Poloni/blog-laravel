@extends('adminlte::page')

@section('title', 'Administracion')

@section('content_header')
    <h1>Administracion</h1>
@stop

@section('content')
    <div class="card p-3">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="card bg-danger">
                    <div class="card-header text-center">
                        Cantidad de categorias
                    </div>
                    <div class="card-body text-center">
                        {{$categories}}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="card bg-success">
                    <div class="card-header text-center">
                        Cantidad de posts
                    </div>
                    <div class="card-body text-center">
                        {{$posts}}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="card bg-primary">
                    <div class="card-header text-center">
                        Cantidad de comentarios
                    </div>
                    <div class="card-body text-center">
                        {{$comentaries}}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="card bg-warning">
                    <div class="card-header text-center">
                        Cantidad de Etiquetas
                    </div>
                    <div class="card-body text-center">
                        {{$tags}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop