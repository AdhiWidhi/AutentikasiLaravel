<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if($request->user()->role === 'admin'){
                return redirect()->route('admin.dashboard');
            }
            elseif($request->user()->role ==='User'){
                return redirect()->route('user.dashboard');
            }
            else{
                return redirect()->route('student.dashboard');
            }

        }

        return back()->withErrors(['email' => 'Email atau password salah']);

    }
    public function register(){
        return view('auth.register');
    }

    public function registered(){
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'role' => request('role')
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
