<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();

        DB::table('products')->insert([
            [
                'category_id' => 1,
                'seller_id' => 1,
                'name' => 'Grand Theft Auto V',
                'pictures' => 'Grand Theft Auto V.jpg',
                'price' => 1299.99,
                'inventory' => 50,
                'detail' => '當一個年輕的街頭騙子、退休的銀行搶犯和一個腦子有問題的神經病，發現自己身陷在由地下犯罪集團、美國政府和娛樂業交織成的恐怖困境時
                ，他們必須完成一連串的搶劫任務，才得以在這個無情的城市生存下去。在這裡，他們不可以相信任何人，更不可以信賴彼此。'
            ],

            [
                'category_id' => 2,
                'seller_id' => 1,
                'name' => '潛水員戴夫 DAVE THE DIVER',
                'pictures' => 'DAVE THE DIVER.jpg',
                'price' => 399.99,
                'inventory' => 30,
                'detail' => '歡迎來到以神祕藍洞為背景的海洋冒險遊戲【潛水員戴夫 DAVE THE DIVER】。
                白天在美麗的海裡捕魚，晚上經營壽司店賺錢吧。 與各具特色的同伴故事一起展開的深海謎團，神祕又新奇的樂趣正在等著你！'
            ],

            [
                'category_id' => 3,
                'seller_id' => 1,
                'name' => 'NBA 2K24',
                'pictures' => 'NBA2K24.jpg',
                'price' => 1799.99,
                'inventory' => 100,
                'detail' => '《NBA 2K24》讓你體驗籃球文化的過去、現在與未來。享受MyCAREER帶給你的滿滿精彩動作場面，以及無窮無盡的MyPLAYER個人化選項。
                在MyTEAM裡打造你的完美陣容。透過快速比賽，與你喜愛的NBA和WNBA隊伍同場較勁，感受更具反應性的遊戲體驗和更精緻洗鍊的視覺效果。'
            ],

            [
                'category_id' => 4,
                'seller_id' => 1,
                'name' => 'Cities: Skylines',
                'pictures' => 'Cities Skylines.jpg',
                'price' => 149.99,
                'inventory' => 200,
                'detail' => '透過有史以來最逼真的城市建造遊戲，從頭開始建設一座城市，並將其轉變為繁榮的大都市。
                以前所未有的龐大規模進行建造，您的創意和問題解決能力都將面臨全新層次的考驗。利用深度模擬與生動運轉的經濟系統，您將能毫不設限地打造自己的世界。'
            ],
        ]);
    }
}
