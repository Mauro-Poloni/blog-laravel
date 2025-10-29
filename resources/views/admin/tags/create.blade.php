@extends('adminlte::page')

@section('title', 'Administracion')

@section('content_header')
    <h1>Crear etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tags.store']) !!}
                @include('admin.tags.partials.form')
                {!! Form::submit('Crear etiqueta', ['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    {{-- Plugin para convertir string a slug --}}
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection

@section('css')
<style>
    .btn {
        float: right;
    }
</style>
@endsection