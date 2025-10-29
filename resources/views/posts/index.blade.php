<title>Blog</title>
<x-app-layout>
    <div class="max-w-8xl px-2 sm:px-6 lg:px-8 py-8">
        <div class="d-flex mb-2 justify-content-end">
            <a href="{{ route('posts.index', ['orderBy' => 'created_at']) }}" class="btn btn-light shadow mr-2 rounded-full"><i class="fa fa-fw fa-sort-amount-asc"></i>Ordenar por fecha</a>
            <a href="{{ route('posts.index', ['orderBy' => 'likes_count']) }}" class="btn btn-light shadow rounded-full"><i class="fa fa-fw fa-sort-amount-desc"></i>Ordenar por likes</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <article class="w-full h-80 shadow bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image)http://127.0.0.1:8000/storage/{{$post->image->url}}@else https://p4.wallpaperbetter.com/wallpaper/489/143/594/german-landscapes-wallpaper-preview.jpg @endif);">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach($post->tags as $tag)
                            <a href="{{route('posts.tag',$tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full"><i class="fa fa-fw fa-tag"></i>{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2" style="text-shadow: 2px 2px 2px #000;">
                            <a href="{{route('posts.show',$post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                        <div class="mt-3">
                            <a class="inline-block px-3 h-6 text-white text-xl" style="text-shadow: 2px 2px 2px #000;"><i class="fa fa-fw fa-thumbs-up"></i>{{ $post->likes->count() }} Likes</a>
                            <a class="inline-block px-3 h-6 text-white text-xl" style="text-shadow: 2px 2px 2px #000;"><i class="fa fa-fw fa-comment"></i>{{ $post->comentary->count() }} Comentarios</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>