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
            ['name' => 'Sport',],
            ['name' => 'Food',],
            ['name' => 'Games',],
            ['name' => 'Fashion',],
            ['name' => 'Shopping',],
            ['name' => 'Trips',],
            ['name' => 'Pets',],
            ['name' => 'Health',],
            ['name' => 'Lifestyle',],
        ]);
    }
}
