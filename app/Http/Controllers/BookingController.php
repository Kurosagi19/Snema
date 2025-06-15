<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\PaymentOption;
use App\Models\Promotion;
use App\Models\Seat;
use App\Models\Showtime;
use App\Models\Snack;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Showtime $showtime)
    {
        $showtime->load('rooms', 'movies');
        $seats = Seat::all();
        $payment_options = PaymentOption::all();        // bảng payment_options
        $promotions = Promotion::all();                // mã khuyến mãi
        $snacks = Snack::all();                        // danh sách combo
        $admin_id = auth()->user()->id ?? null;         // hoặc dùng Auth::guard('admin')->id()
        $customer_id = auth()->id();                    // nếu người dùng đang đăng nhập

        return view('Customer.booking', compact(
            'showtime',
            'seats',
            'payment_options',
            'promotions',
            'snacks',
            'admin_id',
            'customer_id',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
