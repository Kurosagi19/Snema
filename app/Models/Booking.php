<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'total_price', 'discount_price', 'final_price', 'status', 'payment_id', 'promotion_id', 'showtime_id', 'booking_snacks_id', 'admin_id', 'customer_id'];

    public function booking_details()
    {
        return $this->hasMany(BookingDetail::class);
    }

    public function snacks()
    {
        return $this->belongsToMany(Snack::class, 'booking_snacks')
            ->withPivot('quantity');
    }
}
