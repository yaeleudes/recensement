<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){

        // $admin = new Admin();
        // $admin->email = 'yaelahodan@gmail.com';
        // //$admin->password = '123456';
        // $admin->password = Hash::make('123456');
        // $admin->save();

        return view('login');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.'])->withInput();
    }
}
