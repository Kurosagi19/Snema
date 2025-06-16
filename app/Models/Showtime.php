<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    /** @use HasFactory<\Database\Factories\ShowtimeFactory> */
    use HasFactory;

    public function movies() {
        return $this->belongsTo(Movie::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }
}
