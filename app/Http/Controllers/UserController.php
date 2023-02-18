<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        $data['title'] = 'Register';
        return view('Dashboard.register', $data);
    }
    public function createus(Request $request){
        $user = new User([
            'nama' => $request->nama,
            'type' => $request->type,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'Account created successfully. Please login!');
    }
    public function login(){
        $data['title'] = 'Login';
        return view('Dashboard.login', $data);
    }
    public function login_action(Request $request){
        $validator = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($validator)){
            $request->session()->regenerate();
            return redirect('home')->with('info', 'Welcome Back!');
        }
        return back()->with('toast_error', 'Login failed, Try again.!');
    }
    public function password(){
        $data['title'] = 'About';
        return view('Dashboard.about', $data);
    }
    public function password_action(Request $request){
        $request->validate([
            'oldpassword' => 'required|current_password',
            'newpassword' => 'required',
            'renewpassword'=>'required|same:newpassword',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->newpassword);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password Changed Successfully!');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('toast_info', 'You Successfully Logout!');
    }
}
