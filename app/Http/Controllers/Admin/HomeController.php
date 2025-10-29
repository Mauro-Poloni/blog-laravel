<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comentary;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $categories = Category::all()->count();
        $posts = Post::all()->count();
        $comentaries = Comentary::all()->count();
        $tags = Tag::all()->count();

        return view('admin.index', compact('categories','posts','comentaries','tags'));
    }
}
