<?php

namespace App\Http\Controllers;

use App\Exports\ExportInfo;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index(){

        // $admin = new Admin();
        // $admin->email = 'admin@gmail.com';
        // //$admin->password = '123456';
        // $admin->password = Hash::make('@123456');
        // $admin->save();

        return view('login');
    }

    public function dashboard(){
        $users = User::orderBy('nom', 'asc')->simplePaginate(10);
        $nbrInscrit = User::count();
        return view('dashboard', ['nbrInscrit' => $nbrInscrit, 'users' => $users]);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.'])->withInput();
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('alert', 'Au-revoir!');
    }

    public function exportUsersData(){
        $fileName = 'base-de-données.xlsx';
        return Excel::download(new ExportInfo, $fileName);
    }
}
