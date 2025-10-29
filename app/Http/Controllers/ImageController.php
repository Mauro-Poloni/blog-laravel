<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request) {
        $path = Storage::put('images', $request->file('upload'));
        return [
            'url' => 'http://127.0.0.1:8000/storage/'.$path
        ];
    }
}
