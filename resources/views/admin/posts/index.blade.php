@extends('adminlte::page')

@section('title', 'Administracion')

@section('content_header')
<a href="{{route('admin.posts.create')}}" class="btn btn-secondary btn-sm float-right">Crear post</a>
<h1>Posts</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>    
@endif
@livewire('admin.post-index')
@stop