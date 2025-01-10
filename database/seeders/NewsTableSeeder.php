<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('news')->truncate();

        DB::table('news')->insert([
            [
                'title' => '在 GTA 線上模式感受節慶氣息',
                'content' => '白雪漫天、街頭皚皚，GTA 線上模式瀰漫著節慶的歡樂氣氛。
                趁著洛聖都難得下雪，在細雪覆蓋的街頭漫步，欣賞滿城的佳節裝飾，並參加蠱靈精、威索廣場槍戰和「雪怪狩獵」等限時回歸的季節活動，領取過去幾年的限定獎勵。',
                'date' => date('Y-m-d'),
                'name' => 'news1'
            ],

            [
                'title' => 'Dave the Diver Winter Sale! ㅣ 33% OFF!',
                'content' => 'Brr, winter is here!🥶
                Stay warm with DAVE THE DIVER, now 33% OFF!',
                'date' => date('Y-m-d'),
                'name' => 'news2'
            ]

        ]);
    }
}
