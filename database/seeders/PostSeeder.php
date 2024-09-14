<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            ['title' => 'Basketball game', 'content' => 'It was amazing! I was watching it and then suddenly it happened. I am so proud!', 'username' => 'user5', 'created_at' => date('y/m/d H:i:s')],
            ['title' => 'Best abs workout', 'content' => 'Hi! My friend previously suggested me to try group workouts. This was my first time, but I really feel that it was very effective. Next Monday I also will be there.', 'username' => 'user1', 'created_at' => date('y/m/d H:i:s')],
            ['title' => 'My new salad recipe', 'content' => 'Hi! You can see my new salad recipe on my website. Enjoy!', 'username' => 'user2', 'created_at' => date('y/m/d H:i:s')],
        ]);
    }
}
