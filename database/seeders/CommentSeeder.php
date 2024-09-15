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
            ['post_id' => '1', 'user_id' => '2', 'message' => 'I like this game.', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '1', 'user_id' => '1', 'message' => 'I also like this game.', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '1', 'user_id' => '2', 'message' => 'These teams will play next Saturday, too.', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '1', 'user_id' => '1', 'message' => 'I will be there.', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '1', 'user_id' => '3', 'message' => 'Me too', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '2', 'user_id' => '1', 'message' => 'Please, create these posts more!', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '2', 'user_id' => '3', 'message' => 'This worked for me.', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '2', 'user_id' => '4', 'message' => 'I also loved this workout', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '2', 'user_id' => '1', 'message' => 'I have not try it yet', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '3', 'user_id' => '4', 'message' => 'Have anyone eat this?', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '3', 'user_id' => '2', 'message' => 'Yes', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
            ['post_id' => '3', 'user_id' => '3', 'message' => 'Yes, it tastes good', 'created_at' => date('y/m/d H:i:s'), 'updated_at' => date('y/m/d H:i:s')],
        ]);
    }
}
