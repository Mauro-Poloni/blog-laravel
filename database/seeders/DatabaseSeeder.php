<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Eliminar carpeta
        Storage::deleteDirectory('posts');
        // Crear una carpeta
        Storage::makeDirectory('posts');
        // Borrar cache
        Cache::flush();
        // Seeder de permisos
        $this->call(RolSeeder::class);
        // Seeders de user,category,tags y posts
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }
}
