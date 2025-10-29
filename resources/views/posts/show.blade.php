<title>Blog</title>
<x-app-layout>
    <div class="max-w-8xl px-2 sm:px-6 lg:px-8 pb-8">
        <div class="mb-12 md:mb-16">
            <img class="w-full aspect-[4/1] object-cover object-center" src="https://cdn.pixabay.com/photo/2015/09/09/19/56/office-932926_960_720.jpg" alt="">
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Contenido principal -->
            <div class="lg:col-span-2">
                @foreach($post->tags as $tag)
                <a href="{{route('posts.tag',$tag)}}" class="inline-block mb-2 px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
                @endforeach
                <h1 class="text-4xl font-bold text-gray-800 mb-3">{{$post->name}}</h1>
                <hr class="mt-1 mb-2">
                <div class="flex items-center mb-6">
                    <figure class="mr-4">
                        <img class="h-8 w-full rounded-full object-cover" src="https://ui-avatars.com/api/?name={{$post->user->name}};color=7F9CF5&amp;background=EBF4FF" alt="{{$post->user->name}}">
                    </figure>
                    <div>
                        <p class="font-semibold">{{$post->user->name}}</p>
                        <p class="text-sm">{{date('d/m/Y',strtotime($post->created_at))}}</p>
                    </div>
                </div>
                <div class="text-lg text-gray-500 mb-2">
                    {!!$post->extract!!}
                </div>
                <figure>
                    @if($post->image)
                    <img class="w-full h-50 objext-cover object-center rounded" src="http://127.0.0.1:8000/storage/{{$post->image->url}}">
                    @else
                    <img class="w-full h-50 objext-cover object-center rounded" src="https://p4.wallpaperbetter.com/wallpaper/489/143/594/german-landscapes-wallpaper-preview.jpg">
                    @endif
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>
                {{-- Likes --}}
                <div class="text-base text-gray-500 mt-4 d-flex justify-content-between align-items-center">
                    <div class="badge badge-rounded shadow float-right" style="background: #1877F2;" data-href="{{ URL::current() }}" data-layout="button" data-size="small">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore text-white"><i class="fa fa-fw fa-facebook"></i> Compartir</a>
                    </div>
                    @auth
                        @if ($likes)
                            <form action="{{ route('posts.unlike', $post->id) }}" method="POST">
                                @csrf                               
                                <button type="submit" class="hover:text-red-500 badge bg-white text-dark shadow text-base"><i class="fa fa-fw fa-thumbs-up text-danger"></i>{{ $post->likes->count() }} Me gusta</button>
                            </form>
                        @else
                            <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="hover:text-blue-500 badge bg-white text-dark shadow text-base"><i class="fa fa-fw fa-thumbs-up text-primary"></i>{{ $post->likes->count() }} Me gusta</button>
                            </form>
                        @endif
                    @else
                        <button class="hover:text-blue-500 badge bg-white text-dark shadow"><i class="fa fa-fw fa-thumbs-up text-primary"></i>{{ $post->likes->count() }} Me gusta</button>
                    @endauth
                </div>
                <hr class="my-4 shadow-lg text-muted">
                @auth
                <div class="text-base text-gray-500 mt-4">
                    {!! Form::open(['route' => ['posts.comentary.store',$post]]) !!}
                        <input type="text" value="{{$post->id}}" name="post_id" class="d-none">
                        <input type="text" value="{{Auth::user()->name}}" name="user" class="d-none">
                        <input type="number" value="{{Auth::user()->id}}" name="user_id" class="d-none">
                        <div class="form-group">
                            {!! Form::textarea('comentary', null, ['class' => 'form-control h-20 shadow-sm','placeholder' => 'Escribe un comentario...']) !!}
                            @error('comentary')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="row pt-2">
                            <div class="col" style="display:flex;justify-content: flex-end;">
                                <button type="submit" class="btn btn-primary bg-primary mt-1'"><i class="fa fa-fw fa-comment"></i>Comentar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                @endauth
                <div class="text-base text-gray-500 mt-4">
                    @foreach ($comentaries as $comentary)
                        <div class="card mt-2 shadow-sm">
                            <div class="card-header d-flex align-items-center bg-white justify-content-between">
                                @php
                                $user = App\Models\User::find($comentary->user_id);
                                @endphp
                                <div class="d-flex align-items-center">
                                    @if ($user)
                                        @if ($user->profile_photo_path)
                                            <img class="rounded-full mr-2" style="width: 35px;" src="/storage/{{$user->profile_photo_path}}">
                                        @else
                                            <img class="rounded-full mr-2" style="width: 35px;" src="https://ui-avatars.com/api/?name={{$post->user->name}};color=7F9CF5&amp;background=EBF4FF">
                                        @endif
                                        <p>{{$comentary->user}}</p>
                                    @endif                                   
                                </div>                               
                                <p class="float-right">{{date('d/m/Y',strtotime($comentary->created_at))}}</p>
                            </div>
                            <div class="card-body">
                                <p>{{$comentary->comentary}}</p>
                            </div>
                            @auth
                                @if (Auth::user()->name == $comentary->user)
                                    <div class="card-footer bg-white py-1">
                                        <form action="{{route('posts.comentary.destroy',$comentary)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm bg-danger float-right"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>   
                    @endforeach
                    {{$comentaries->links()}}
                </div>
            </div>
            <!-- Contenido relacionado -->
            <aside>
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Más en {{$post->category->name}}</h1>

                <ul>
                    @foreach($similares as $similar)
                        <li class="mb-4 d-flex">
                            <div class="col">
                                <a href="{{route('posts.show',$similar)}}">
                                    @if($similar->image)
                                        <img class="objext-cover object-center rounded" src="http://127.0.0.1:8000/storage/{{$similar->image->url}}">
                                    @else
                                        <img class="objext-cover object-center rounded" src="https://p4.wallpaperbetter.com/wallpaper/489/143/594/german-landscapes-wallpaper-preview.jpg">
                                    @endif
                                </a>
                            </div>
                            <div class="col px-2">
                                <a href="{{route('posts.show',$similar)}}"><span style="color:rgb(0, 45, 123) !important;font-weight: bold;">{{$similar->name}}</span></a>
                                <p class="text-gray-600">{!! Str::limit($similar->extract, $limit = 80, $end = '...') !!}</p>
                                <span class="badge badge-rounded bg-primary"><i class="fa fa-fw fa-thumbs-up"></i> {{ $similar->likes->count() }}</span>
                                <span class="badge badge-rounded bg-success"><i class="fa fa-fw fa-comment"></i> {{ $similar->comentary->count() }}</span>
                                <span class="badge badge-rounded bg-secondary"><i class="fa fa-fw fa-user"></i> {{ $similar->user->name }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>