<title>Blog</title>
<x-app-layout>
    <div class="max-w-7xl bg-white sm:px-6 lg:px-8 py-8 px-2 my-4 mx-2">
        @foreach($posts as $post)
            <x-card-post :post="$post" />
        @endforeach
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>