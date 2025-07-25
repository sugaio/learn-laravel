<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('blogs')->insert ([
        //     'title' => ' Blog 1',
        //     'deskripsi' => 'Ini adalah deskripsi untuk blog 1',
        //     'user_id' => 5,
        // ]);

        DB::table('blogs')->truncate();

        // // for ($i = 1; $i <= 100; $i++) {
        // //     DB::table('blogs')->insert ([
        // //         'title' => "Blog $i",
        // //         'deskripsi' => "Ini adalah deskripsi untuk blog $i",
        // //         'user_id' => fake()->numberBetween(401, 500),
        // //     ]);
        // }
    }
}
