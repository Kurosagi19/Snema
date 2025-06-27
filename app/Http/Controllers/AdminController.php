<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::count();
        $bookings = Booking::count();
        $customers = Customer::count();
        $admins = Admin::all();
        $administrators = session('admin_id');
        return view('Admin.dashboard', compact('movies', 'bookings', 'customers', 'admins', 'administrators'));
    }

    public function movies() {
        $movies = Movie::all();
        return view('Admin.movies', compact('movies'));
    }

    public function bookings()
    {
        $bookings = Booking::with([
            'customers:id, name, email, phone_number',
            'admins:id, name, email',
            'showtimes.movie:id, title, duration',
            'showtimes.room.cinema:id, name',
            'payment_option:id, option',
            'promotions:id, promotion_type',
            'booking_snacks.snack:id, name, price',
            'booking_details.seats:id, seat_code, seat_type',
        ])->get();

        return view('Admin.orders', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $password = bcrypt($request->password);
        $array = [];
        $array = Arr::add($array, 'name', $request->name);
        $array = Arr::add($array, 'email', $request->email);
        $array = Arr::add($array, 'password', $password);
        Admin::create($array);
        return Redirect::route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    // Function login
    public function login() {
        return view('Admin.login_admin');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();

        if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không đúng.',
            ]);
        }

        // ✅ Đăng nhập thủ công bằng session
        session(['admin_id' => $admin->id]);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        session()->forget('admin_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
