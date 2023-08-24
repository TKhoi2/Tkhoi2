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
        return redirect('login');
    }

    public function showLoginForm() {
        return view('login');
    }

    public function showId($id) {
        $user = User::findOrFail($id);
        return view('login', compact('user'));
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);
        
        if (auth()->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
        
    }
}
