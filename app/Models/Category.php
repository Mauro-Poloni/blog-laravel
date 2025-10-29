<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Asignacion masiva

    protected $fillable = ['name','slug'];

    // definir metodo

    public function getRouteKeyName()
    {
        return "slug";
    }

    // Relacion uno a muchos

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
