<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\BookingDetail;
use App\Models\BookingSnack;
use App\Models\Movie;
use App\Models\PaymentOption;
use App\Models\Promotion;
use App\Models\Seat;
use App\Models\Showtime;
use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function create(Request $request)
    {
        $today = Carbon::now();
        $is_weekend = $today->isSaturday() || $today->isSunday();

        $promotion = Promotion::where('id', 1)->first(); // hoặc where('id', 1)->first()
        if ($is_weekend && $promotion) {
            $promotions = $promotion;
            $discount_percent = $promotion->promotion_type; // ví dụ: 25 hoặc 50
        }

        $payment_options = [
            1 => 'Thanh toán Online',
            2 => 'Thanh toán khi nhận vé tại quầy',
        ];

        $showtime = Showtime::with('room')->findOrFail($request->showtime_id);
        $movie = Movie::findOrFail($request->movie_id);
        $seats = Seat::where('room_id', $showtime->room_id)->get();

        // Load danh sách snack từ bảng `snacks` (không phải booking_snacks)
        $snacks = \App\Models\Snack::all();

        // Danh sách ghế đã được đặt
        $booked_seat_ids = DB::table('booking_details')
            ->join('bookings', 'booking_details.booking_id', '=', 'bookings.id')
            ->where('bookings.showtime_id', $showtime->id)
            ->pluck('seat_id')
            ->toArray();

        return view('Customer.booking', compact(
            'movie',
            'showtime',
            'seats',
            'booked_seat_ids',
            'payment_options',
            'promotions',
            'discount_percent',
            'snacks' // truyền vào view
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        // Mở dòng dưới để test xem đã lấy được dữ liệu chưa
//        dd($request->all());

        $request->validate([
            'seat_ids' => 'required|array|min:1',
            'seat_ids.*' => 'exists:seats,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'movie_id' => 'required|exists:movies,id',
            'room_id' => 'required|exists:rooms,id',
            'payment_id' => 'required|exists:payment_options,id',
            'promotion_id' => 'nullable|exists:promotions,id',
        ]);

        $customer_id = session('customer_id');
        if (!$customer_id) {
            return redirect()->route('customer.login')->with('error', 'Vui lòng đăng nhập để đặt vé.');
        }

        $total_price = 0;
        $discount_price = 0;

        // 1. Tính tổng tiền
        foreach ($request->seat_ids as $seat_id) {
            $seat = Seat::find($seat_id);
            if (!$seat) continue;

            $seat_price = $seat->seat_type === 'vip' ? 50000 : 45000;
            $total_price += $seat_price;
        }

//         2. Tính giảm giá nếu có
        if ($request->promotion_id) {
            $promotion = Promotion::find($request->promotion_id);
            $promotion_id = $promotion ? (int) $promotion->id : null;
            if ($promotion && $promotion->promotion_type == 15) {
                $discount_price = $total_price * (15 / 100);
                } elseif ($promotion && $promotion->promotion_type == 20) {
                    $discount_price = $total_price * (20 / 100);
            }
        }

        $final_price = $total_price - $discount_price;

        // 3. Tạo booking
        $booking = Booking::create([
            'showtime_id'     => $request->showtime_id,
            'movie_id'        => $request->movie_id,
            'room_id'         => $request->room_id,
            'customer_id'     => $customer_id,
            'admin_id' => $request->admin_id,
            'payment_id'      => $request->payment_id,
            'promotion_id'    => $request->promotion_id,
            'total_price'    => $total_price,
            'discount_price' => $discount_price,
            'final_price'    => $final_price,
            'status'          => '1',
        ]);

        // 4. Tạo từng dòng booking_detail cho mỗi ghế
        foreach ($request->seat_ids as $seat_id) {
            BookingDetail::create([
                'booking_id'   => $booking->id,
                'seat_id'      => $seat_id,
                'booking_time' => Carbon::now(),
                'price' => $final_price,
            ]);
        }

        return redirect()->route('customers.index')->with('success', 'Đặt vé thành công!');
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
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('dashboard')->with('success', 'Đã xoá vé thành công!');
    }
}
