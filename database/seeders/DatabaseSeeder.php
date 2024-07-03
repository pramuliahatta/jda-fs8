<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\File;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone_number' => 6281214891719,
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        $path = database_path('seeders/jda_fs8.sql');
        $sql = file_get_contents($path);

        DB::unprepared($sql);

        // User::factory(19)->create();
        // Article::factory(30)->create();
        // Product::factory(30)->create();
        // ProductPhoto::factory(50)->create();
        // Gallery::factory(30)->create();
        // File::factory(30)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
