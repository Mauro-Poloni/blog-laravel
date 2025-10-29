<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comentary;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request) {
        $orderBy = $request->get('orderBy', 'created_at');
        $posts = Post::where('status',2)->withCount('likes')->orderBy($orderBy,'DESC')->paginate(5);
        
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {
        $this->authorize('published',$post);
        $similares = Post::where('category_id', $post->category_id)->where('status',2)->where('id','!=',$post->id)->latest('id')->take(4)->get();
        $comentaries = Comentary::where('post_id', $post->id)->latest('id')->paginate(5);
        $likes = Like::where('user_id', Auth::id())->where('post_id', $post->id)->first();
        return view('posts.show', compact('post','similares','comentaries','likes'));
    }

    public function category(Category $category) {
        $posts = Post::where('category_id',$category->id)->where('status',2)->latest('id')->paginate(5);
        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag) {
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(4);
        return view('posts.tag', compact('posts','tag'));
    }
}
