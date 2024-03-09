<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class SuperController extends Controller
{
    public function addAdmin(){
        $users = User::get();
        return view('superAdmin.addAdminAxe', [
            'users' => $users
        ]);
    }
    public function createAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            '' => 'required',
            '' => 'required'
        ]);
    }
    public function axeList(){
        $users = User::get();
        return view('superAdmin.axeListe', [
            'users' => $users
        ]);
    }
    public function adminAxe(){
        $users = User::get();
        return view('superAdmin.adminAxe',[
            'users' => $users
        ]);
    }
}
