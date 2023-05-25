<?php

namespace Database\Seeders;
use App\Models\NguoiDung;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NguoiDung::create([
            'ND_MaND'=>'ND_01',
            'ND_HoTen'=>'admin',
            'ND_GioiTinh'=>'Nam',
            'ND_DiaChi'=>'Can Tho', 
            'ND_Email'=>'admin@gmail.com', 
            'ND_MatKhau'=>bcrypt('123123'), 
            'ND_SDT'=>'123'
        ]);
    }
}
