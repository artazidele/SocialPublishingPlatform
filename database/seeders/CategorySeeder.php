<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Animals',],
            ['name' => 'Sports',],
            ['name' => 'Clothes',],
            ['name' => 'Fashion',],
            ['name' => 'Pets',],
            ['name' => 'Phones',],
            ['name' => 'Lectures',],
            ['name' => 'Health',],
            ['name' => 'Lifestyle',],
        ]);
    }
}
