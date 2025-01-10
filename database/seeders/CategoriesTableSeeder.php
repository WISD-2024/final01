<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            ['name' => '動作遊戲'],
            ['name' => '冒險遊戲'],
            ['name' => '運動與競速'],
            ['name' => '模擬遊戲'],
        ]);
    }
}
