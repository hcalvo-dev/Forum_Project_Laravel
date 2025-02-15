<?php

namespace Database\Seeders;

use App\Models\Hilo;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create()->each(function ($user){
            $user->assignRole($user->role);
        });
        Hilo::factory()->count(5)->create();
        Post::factory()->count(15)->create();
        Like::factory()->count(40)->create()->each(function ($like) {
            $like->post()->increment('num_likes');
        });
        
    }
}
