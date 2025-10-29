<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del post', 'readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoria:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Etiquetas:</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>
    @endforeach
    @error('tags')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Estado:</p>
    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>
    @error('status')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
            <img src="http://127.0.0.1:8000/storage/{{$post->image->url}}" id="picture">
            @else
            <img id="picture" src="https://p4.wallpaperbetter.com/wallpaper/489/143/594/german-landscapes-wallpaper-preview.jpg">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa deserunt vero corrupti? Fugit doloribus velit aliquid ipsam quos recusandae repudiandae fugiat perferendis sequi dolore, maiores odio doloremque dolores, animi unde?</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
    @error('extract')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo del Post:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>