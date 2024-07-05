<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teater;

class TeaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Teater::create([
            'title'=>'Temanku Sayang Temanku Malang: Ken Kembalilah Seperti Dulu',
            'description'=> 'Menceritakan tentang perubahan perilaku Ken, seorang siswa yang dulunya pandai dan bersemangat, namun berubah menjadi kasar dan tidak hormat',
            'show_date'=> '2024-07-04'
        ]);

    }
}
