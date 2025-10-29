<?php

namespace App\Http\Controllers;

use App\Models\Comentary;
use App\Models\Post;
use Illuminate\Http\Request;

class ComentaryController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request, Post $post)
    {
        $comentary = Comentary::create($request->all());
        return redirect()->back();
    }

    public function edit(Comentary $comentary)
    {
        //
    }

    public function update(Request $request, Comentary $comentary)
    {
        //
    }

    public function destroy(Comentary $comentary)
    {
        $comentary->delete();

        return redirect()->back();
    }
}
