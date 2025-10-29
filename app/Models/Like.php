<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // Relación con la tabla "users"
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con la tabla "posts"
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
