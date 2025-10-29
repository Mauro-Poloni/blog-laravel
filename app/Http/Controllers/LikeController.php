<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id)
    {
        // Comprobar si el usuario ya ha dado "like" al post
        $like = Like::where('user_id', Auth::id())
            ->where('post_id', $id)
            ->first();

        if ($like) {
            // Si ya ha dado "like", mostrar mensaje de error
            return redirect()->back()->with('error', 'Ya has dado "like" a este post');
        }

        // Crear nuevo registro en la tabla "likes"
        $like = new Like;
        $like->user_id = Auth::id();
        $like->post_id = $id;
        $like->save();

        return redirect()->back();
    }

    public function unlike($id)
    {
        // Eliminar el registro de la tabla "likes"
        $like = Like::where('user_id', Auth::id())
            ->where('post_id', $id)
            ->first();
        $like->delete();

        return redirect()->back();
    }
}
