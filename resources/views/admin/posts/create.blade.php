@extends('adminlte::page')

@section('title', 'Administracion')

@section('content_header')
    <h1>Crear post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store','autocomplete' => 'off', 'files' => 'true']) !!}
                @include('admin.posts.partials.form')
                {!! Form::submit('Crear post', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .btn {
            float: right;
        }
    </style>
@stop


@section('js')
{{-- Ckeditor = Text enriquesido --}}
<script src="{{asset('vendor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
    {{-- Mostrar texto enriquesido --}}
    <script>
            ClassicEditor
                .create( document.querySelector( '#extract' ), {
                    simpleUpload: {
                    uploadUrl: "{{ route('image.upload') }}",
                }
            })
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
                .create( document.querySelector( '#body' ), {
                    simpleUpload: {
                    uploadUrl: "{{ route('image.upload') }}",
                }
            })
            .catch( error => {
                console.error( error );
            } );
            // Mostrar imagen
            $(document).ready(function(){

                $('#file').change(function(e){

                let file= e.target.files[0];

                let reader= new FileReader();

                reader.onload= (event) => {

                $('#picture').attr('src', event.target.result)

                };

                reader.readAsDataURL(file);

                })

            });
    </script>
{{-- Plugin para convertir string a slug --}}
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
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