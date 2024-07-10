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
            'title'=> 'Upin Ipin',
            'description' => 'Bocil Kemm',
            'show_date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
