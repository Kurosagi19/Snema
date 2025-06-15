<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request) {
        // Kiểm tra hợp lệ
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6|confirmed', // cần trường password_confirmation
        ]);

        // Tạo người dùng mới, mã hoá bằng bcrypt (tự động bởi Hash::make)
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // mã hoá bằng bcrypt
        ]);

        // Chuyển hướng sau khi đăng ký
        return redirect()->route('login')->with('success', 'Đăng ký thành công! Mời đăng nhập.');
    }
}
