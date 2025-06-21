<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Genre;
use App\Models\GenreMovie;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = DB::table('movies')
            ->join('genre_movies', 'movies.genre_movie_id', '=', 'genre_movies.id')
            ->join('genres', 'genre_movies.genre_id', '=', 'genres.id')
            ->select('movies.*', 'genres.genre_name as genre_name', 'genres.id as genre_id')
            ->get();
        $genres = Genre::all();
        return view('Customer.index', compact('movies', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $password = bcrypt($request->password);
        $array = [];
        $array = Arr::add($array, 'email', $request->email);
        $array = Arr::add($array, 'gender', $request->gender);
        $array = Arr::add($array, 'phone_number', $request->phone_number);
        $array = Arr::add($array, 'name', $request->name);
        $array = Arr::add($array, 'birth_date', $request->birth_date);
        $array = Arr::add($array, 'password', $password);
        Customer::create($array);
        return Redirect::route('customers.login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function login() {
        return view('Customer.login_customer');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $customer = Customer::where('email', $credentials['email'])->first();

        if (!$customer || !Hash::check($credentials['password'], $customer->password)) {
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không đúng.',
            ]);
        }

        // ✅ Đăng nhập thủ công bằng session
        session(['customer_id' => $customer->id]);

        return redirect()->intended(route('customers.index'));
    }

    public function logout(Request $request)
    {
        session()->forget('customer_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('customers.login');
    }
}
