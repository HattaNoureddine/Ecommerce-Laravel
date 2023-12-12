<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        if($request->password){
            Auth::user()->password = Hash::make($request->email);
        }
        Auth::user()->update();
        return redirect()->back()->with('success','admin modifier avec success');
    }


    
    public function clients()
    {
        $clients = User::where('role','user')->get();
        return view('admin.clients.index')->with('clients',$clients);
    }


    


    public function BloquerUser($iduser)
    {
        $client = User::find($iduser);
        $client->is_active = false;
        $client->update();
        return redirect()->back();
    }

    public function ActiverUser($iduser)
    {
        $client = User::find($iduser);
        $client->is_active = true;
        $client->update();
        return redirect()->back();
    }







    public function commandes(){
        $commandes = Commande::all();
        return view('admin.commandes.index')->with('commandes',$commandes);
    }
}
