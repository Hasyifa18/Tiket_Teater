<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seats = [
            ['seat_number' => 'A1', 'row' => 'A', 'section' => 'Front', 'price' => 50000],
            ['seat_number' => 'A2', 'row' => 'A', 'section' => 'Front', 'price' => 50000],
            ['seat_number' => 'A3', 'row' => 'A', 'section' => 'Front', 'price' => 50000],
            ['seat_number' => 'B1', 'row' => 'B', 'section' => 'Middle', 'price' => 40000],
            ['seat_number' => 'B2', 'row' => 'B', 'section' => 'Middle', 'price' => 40000],
            ['seat_number' => 'B3', 'row' => 'B', 'section' => 'Middle', 'price' => 40000],
            ['seat_number' => 'C1', 'row' => 'C', 'section' => 'Back', 'price' => 30000],
            ['seat_number' => 'C2', 'row' => 'C', 'section' => 'Back', 'price' => 30000],
            ['seat_number' => 'C3', 'row' => 'C', 'section' => 'Back', 'price' => 30000],
        ];

        foreach ($seats as $seat) {
            Seat::create($seat);
        }
    }
}
