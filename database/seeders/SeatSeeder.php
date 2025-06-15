<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $rows = ['A', 'B', 'C', 'D', 'E'];
        $cols = 8;
        $seatNumber = 1;

        foreach ($rows as $row) {
            for ($i = 1; $i <= $cols; $i++) {
                DB::table('seats')->insert([
                    'id' => $seatNumber,
                    'seat_type' => $i >= 7 ? 'vip' : 'normal',
                    'seat_code' => $row . $i, // Ví dụ: A1, A2...
                    'seat_number' => $seatNumber,
                    'seat_status' => '1',
                    'room_id' => '1',
                ]);
                $seatNumber++;
            }
        }
    }
}
