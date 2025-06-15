<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $startTimes = [
            '10:00:00',
            '13:00:00',
            '16:00:00',
            '19:00:00',
            '21:30:00'
        ];

        $movie_id = 1; // ID phim có thật
        $room_id = 1;  // ID phòng có thật

        foreach ($startTimes as $index => $start) {
            $startTime = Carbon::createFromTimeString($start);
            $endTime = $startTime->copy()->addMinutes(120); // ví dụ thời lượng 2 giờ

            DB::table('showtimes')->insert([
                'id' => $index + 1,
                'start_time' => $startTime->format('H:i:s'),
                'end_time' => $endTime->format('H:i:s'),
                'status' => '1', // hoặc pending, closed...
                'movie_id' => $movie_id,
                'room_id' => $room_id,
            ]);
        }
    }
}
