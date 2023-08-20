<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{   
    public function username(){
    return 'name';
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (User::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect('/dashboard'); // Đổi đường dẫn tùy theo yêu cầu của bạn
        } else {
            // Đăng nhập thất bại
            return back()->withErrors(['message' => 'Thông tin đăng nhập không hợp lệ.']);
        }
    }
}
