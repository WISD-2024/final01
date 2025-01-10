<?php

namespace Database\Seeders;
use App\Models\Buyer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class BuyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('buyers')->truncate();

        DB::table('buyers')->insert([
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('12345678'),
            ],

            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('12345678'),
            ]
        ]);


    }
}
