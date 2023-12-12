<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function dashboard()
    {
        return view('client.dashboard');
    }
    public function profile()
    {
        return view('client.profile');
    }
    
    public function updateProfile(Request $request)
    {
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        if($request->password){
            Auth::user()->password = Hash::make($request->email);
        }
        Auth::user()->update();
        return redirect()->back()->with('success','client modifier avec success');
    }


    
    public function addReview(Request $request)
    {
        $review = new Review();
        $review->rate = $request->rate;
        $review->product_id = $request->product_id;
        $review->content = $request->content;
        $review->user_id = Auth::user()->id;

        $review->save();

        return redirect()->back();
    }




    public function cart()
    {
        $categories= Categorie::all();
        $commande = Commande::where('client_id',Auth::user()->id)->where('etat','en cours')->first();
        return view('guest.cart')->with('categories',$categories)->with('commande',$commande);
    }

    public function checkout(Request $request)
    {
        $commande =Commande::find($request->commande);
        $commande->etat = "payee";
        $commande->update();
        return redirect('/client/dashboard');
    }

    public function mescommandes()
    {
        return view('/client/commandes');
    }

    public function afficherMessageBloquer()
    {
        return view('client.bloquer');
    }
}
