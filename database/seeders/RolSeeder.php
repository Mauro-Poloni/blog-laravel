<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        $admin = Role::create(['name' => 'Admin']);
        $blogger = Role::create(['name' => 'Blogger']);
        // Permisos de dashboard
        Permission::create([
            'name' => 'admin.home',
            'description' => 'Ver el dashboard'
        ])->syncRoles([$admin, $blogger]);
        // Permisos de usuarios
        Permission::create([
            'name' => 'admin.users.index',
            'description' => 'Ver listado de usuarios'
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'Asignar un rol'
        ])->syncRoles([$admin]);
        //Permisos de roles
        Permission::create([
            'name' => 'admin.roles.index',
            'description' => 'Ver listado de roles'
        ])->syncRoles([$admin, $blogger]);
        Permission::create([
            'name' => 'admin.roles.create',
            'description' => 'Crear roles'
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'admin.roles.edit',
            'description' => 'Editar roles'
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'admin.roles.destroy',
            'description' => 'Eliminar roles'
        ])->syncRoles([$admin]);
        // Permisos de categorias
        Permission::create([
            'name' => 'admin.categories.index',
            'description' => 'Ver listado de categorias'
        ])->syncRoles([$admin, $blogger]);
        Permission::create([
            'name' => 'admin.categories.create',
            'description' => 'Crear categorias'
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'admin.categories.edit',
            'description' => 'Editar categorias'
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'admin.categories.destroy',
            'description' => 'Eliminar categorias'
        ])->syncRoles([$admin]);
        // Permisos de etiquetas
        Permission::create([
            'name' => 'admin.tags.index',
            'description' => 'Ver listado de etiquetas'
        ])->syncRoles([$admin, $blogger]);
        Permission::create([
            'name' => 'admin.tags.create',
            'description' => 'Crear etiquetas'
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'admin.tags.edit',
            'description' => 'Editar etiquetas'
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'admin.tags.destroy',
            'description' => 'Eliminar etiquetas'
        ])->syncRoles([$admin]);
        // Permisos de posts
        Permission::create([
            'name' => 'admin.posts.index',
            'description' => 'Ver listado de posts'
        ])->syncRoles([$admin, $blogger]);
        Permission::create([
            'name' => 'admin.posts.create',
            'description' => 'Crear posts'
        ])->syncRoles([$admin, $blogger]);
        Permission::create([
            'name' => 'admin.posts.edit',
            'description' => 'Editar posts'
        ])->syncRoles([$admin, $blogger]);
        Permission::create([
            'name' => 'admin.posts.destroy',
            'description' => 'Eliminar posts'
        ])->syncRoles([$admin, $blogger]);
    }
}
