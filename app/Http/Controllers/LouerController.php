<?php

namespace App\Http\Controllers;

use App\Models\Louer;
use App\Models\Categorie;
use App\Models\CommandeLouer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LouerController extends Controller
{
    public function index(){
        $louers = Louer::all();
        $categories = Categorie::all();
        return view('guest.louers')->with('louers',$louers)->with('categories',$categories);
    }

    public function detail($id){
        $louer = Louer::find($id);
        $categories = Categorie::all();
        return view('guest.detail_louer')->with('louer',$louer)->with('categories',$categories);
    }

    public function liste(){
        $louers = Louer::all();
        return view('admin.louers.index')->with('louers',$louers);

    }

    public function create(){
        return view('admin.louers.create');
    }

    public function store(Request $request)
    {
        $louer = new Louer();
        $louer->name = $request->name;
        $louer->description = $request->description;
        $louer->price = $request->price;
        $louer->qte = $request->qte;
        //upload Image
        $newname = uniqid();
        $image = $request->file('photo');
        $newname.= ".".$image->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $image->move($destinationPath,$newname);

        $louer->photo = $newname;

        if($louer->save())
        {
            return redirect()->back();
        }else{
            echo "error";
        }
    }


   public function edit($id){
    $louer = Louer::find($id);
    return view('admin.louers.edit')->with('louer',$louer);
   }

    public function update(Request $request)
    {
        
         $louer = Louer::find($request->id_product);
         $louer->name = $request->name;
         $louer->description = $request->description;
         $louer->price = $request->price;
         $louer->qte = $request->qte;
         
        if($request->file('photo')){
            //supprimer ancienne photo 
            // $file_path = public_path().'/uploads/'.$product->photo;
            // unlink($file_path);

            $destination = 'uploads/'.$louer->photo;

            if(File::exists($destination))
            {
                File::delete($destination);
            }

            //upload nv photo
            $newname = uniqid();
            $image = $request->file('photo');
            $newname.= ".".$image->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $image->move($destinationPath,$newname);

            $louer->photo = $newname;
        }
       
        if($louer->update())
        {
            return redirect()->back();
        }else{
            echo "error";
        }
    }

    public function destroy($id)
    {
        $louer = CommandeLouer::find($id);
        
        if($louer->delete())
        {
            return redirect()->back();
        }
    }


    public function form($id){
        $categories = Categorie::where('id',$id);
        $louer = Louer::find($id);
        return view('guest.form')->with('categories',$categories)->with('louer',$louer);
    }


    public function upload(Request $request){
        $louerclient = new CommandeLouer();
        $louerclient->nom = $request->nom;
        $louerclient->prenom = $request->prenom;
        $louerclient->tel = $request->tel;
        $louerclient->addresse	= $request->addresse;
        $louerclient->date_debut	= $request->date_debut;
        $louerclient->date_fin	= $request->date_fin;
        //upload Image
        $newname = uniqid();
        $image = $request->file('image_cin');
        $newname.= ".".$image->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $image->move($destinationPath,$newname);

        $louerclient->image_cin = $newname;

        if($louerclient->save())
        {
            return redirect()->back();
        }else{
            echo "error";
        }
    }

    public function commades(){
        $commandes = CommandeLouer::all();
        return view('admin.commandeslouers.index')->with('commandes',$commandes);
    }
}
