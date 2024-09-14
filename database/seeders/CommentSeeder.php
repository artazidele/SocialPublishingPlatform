<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            ['post_id' => '1', 'user_id' => '2', 'message' => 'I like this game.'],
            ['post_id' => '1', 'user_id' => '1', 'message' => 'I also like this game.'],
            ['post_id' => '1', 'user_id' => '2', 'message' => 'These teams will play next Saturday, too.'],
            ['post_id' => '1', 'user_id' => '1', 'message' => 'I will be there.'],
            ['post_id' => '1', 'user_id' => '3', 'message' => 'Me too'],
            ['post_id' => '2', 'user_id' => '1', 'message' => 'Please, create these posts more!'],
            ['post_id' => '2', 'user_id' => '3', 'message' => 'This worked for me.'],
            ['post_id' => '2', 'user_id' => '4', 'message' => 'I also loved this workout'],
            ['post_id' => '2', 'user_id' => '1', 'message' => 'I have not try it yet'],
            ['post_id' => '3', 'user_id' => '4', 'message' => 'Have anyone eat this?'],
            ['post_id' => '3', 'user_id' => '2', 'message' => 'Yes'],
            ['post_id' => '3', 'user_id' => '3', 'message' => 'Yes, it tastes good'],
        ]);
    }
}
