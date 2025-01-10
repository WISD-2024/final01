<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('comments')->truncate();

        DB::table('comments')->insert([
           [
               'product_id' => 1,
               'buyer_id' => 1,
               'content' => '超好玩'
           ],

           [
               'product_id' => 2,
               'buyer_id' => 2,
               'content' => '一款好遊戲除了好玩，更是讓你玩到心情愉悅，身心舒暢，不虧為今年的得獎遊戲實至名歸，不可錯過'
           ],

           [
               'product_id' => 3,
               'buyer_id' => 1,
               'content' => '整體畫質是可以的，但一開始完全沒劇情的部分我不能接受'
           ],

           [
               'product_id' => 4,
               'buyer_id' => 2,
               'content' => '一玩就停不下來啊啊啊'
           ]


        ]);
    }
}
