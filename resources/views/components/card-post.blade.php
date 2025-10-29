@props(['post'])
<article class="grid grid-cols-4 md:grid-cols-2 gap-4 mb-8">
    <figure>
        <a href="{{ route('posts.show', $post) }}">
            @if ($post->image)
                <img class="aspect-[16/9] w-full object-cover object-center rounded" src="http://127.0.0.1:8000/storage/{{ $post->image->url }}" alt="{{ $post->name }}">
            @else
                <img class="aspect-[16/9] w-full object-cover object-center rounded" src="https://p4.wallpaperbetter.com/wallpaper/489/143/594/german-landscapes-wallpaper-preview.jpg" alt="{{ $post->name }}">
            @endif
        </a>
    </figure>

    <div class="flex flex-col justify-between">
        <div>
            <h3 class="text-2xl font-semibold mb-2">
                <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
            </h3>
            <hr class="my-1">

            <div class="flex space-x-2 mt-2">
                @foreach ($post->tags as $tag)
                <a href="{{ route('posts.tag', $tag) }}" class="px-2 py-1 text-xs font-semibold text-shadow-md rounded dark:text-indigo-900
                    @if (in_array($tag->color, ['white','yellow','pink','green']))
                        bg-{{ $tag->color }}-300
                        text-dark
                    @else
                        bg-{{ $tag->color }}-600
                        text-white
                    @endif
                    ">
                        {{ $tag->name }}
                    </a>                    
                @endforeach
            </div>
        </div>

        <div class="flex items-center mt-2">
            <a href="#" class="flex items-center space-x-2 text-sm">
                <img class="h-8 w-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ $post->user->name }};color=7F9CF5&amp;background=EBF4FF" alt="{{ $post->user->name }}">
                <p>{{ $post->user->name }}</p>
            </a>
            <p class="text-sm ml-2">{{ $post->created_at->format('d/m/Y') }}</p>
        </div>

        <p class="mt-2">{!! Str::limit($post->extract, $limit = 200, $end = '...') !!}</p>

        <div class="flex justify-between items-center mt-4">
            <span class="flex items-center space-x-1 text-md">
                <i class="fa fa-fw fa-comment"></i>
                <span>{{ $post->comentary->count() }}</span>
            </span>
            <a href="{{ route('posts.show', $post) }}" class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700 focus:bg-blue-700">Leer más...</a>
        </div>
    </div>
</article>

