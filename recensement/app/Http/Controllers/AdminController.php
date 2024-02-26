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

    public function dashboard(Request $request){
        $nbrInscrit = User::count();
        $nbrArchive = User::where('archive', '=', 'Oui')->count();
        $users = User::where('archive', '=', 'Non')->orderBy('nom', 'asc')->simplePaginate(10);
        $nbrH = User::where('sexe', '=', 'Masculin')->count();
        $nbrF = User::where('sexe', '=', 'Feminin')->count();
        $recherche = $request->input('recherche');

        if (!is_null($recherche)) {
            $search = explode(' ', $recherche);
            $nom = $search[0];
            $users = User::where('nom', 'like', '%'.$nom.'%');

            if (count($search) >= 2) {
                $prenoms = $search[1];
                $users->where('prenoms', 'like', '%'.$prenoms.'%');
            }

            $users = $users->orderBy('nom', 'asc')->simplePaginate(10);
        }
        return view('dashboard', ['nbrInscrit' => $nbrInscrit, 'users' => $users, 'nbrH' => $nbrH, 'nbrF' => $nbrF, 'nbrArchive' => $nbrArchive]);
    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'Aucun compte trouvé !'])->withInput();
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('alert', 'Au-revoir!');
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', "Utilisateur supprimé avec succès.");
    }
    public function archive($id){
        $user = User::findOrFail($id);
        $user->archive = 'Oui';
        $user->save();
        return redirect()->route('admin.dashboard')->with('success', "Utilisateur archivé avec succès.");
    }
    public function restore($id){
        $user = User::findOrFail($id);
        $user->archive = 'Non';
        $user->save();
        return redirect()->route('admin.dashboard')->with('success', "Utilisateur restauré avec succès.");
    }
    public function archivage(){
        $usersArchive = User::where('archive', '=', 'Oui')->orderBy('nom', 'asc')->simplePaginate(10);
        return view('archive', ['usersArchive' => $usersArchive]);
    }
    public function exportUsersData(){
        $fileName = 'base-de-données.xlsx';
        return Excel::download(new ExportInfo, $fileName);
    }
}
