<title>Blog</title>
<x-app-layout>
    <div class="max-w-7xl bg-white sm:px-6 lg:px-8 py-8 px-2 my-4 mx-2">
        {{-- <h2 class="text-2xl font-semibold mb-3">
            <span class="text-gray-600 uppercase tracking-wider">Etiqueta:</span>
            <span class="text-{{ $tag->color }}-500 text-sm">{{ $tag->name }}</span>
        </h2>  --}}

        @foreach($posts as $post)
            <x-card-post :post="$post" />
        @endforeach
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>