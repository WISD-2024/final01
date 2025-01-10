<?php

namespace Database\Seeders;

use App\Models\Sysadmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SysadminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sysadmin::create([
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
