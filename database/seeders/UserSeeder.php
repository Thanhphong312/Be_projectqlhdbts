<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'ND_MaND' => 'ND_01',
            'ND_MaQ' => 'admin',
            'ND_MaDV' => 'VT - HG',
            'name' => 'admin',
            'ND_GioiTinh' => 'name',
            'ND_DiaChi' => 'Can Tho',
            'ND_SDT' => '123123',
            'email' => 'admin@gmail.com',
            'password' => '123123',
        ]);
    }
}
