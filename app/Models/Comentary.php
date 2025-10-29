<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentary extends Model
{
    use HasFactory;

    // Asignacion masiva

    protected $fillable = ['post_id','comentary','user','user_id'];

    // Relacion uno a muchos

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
