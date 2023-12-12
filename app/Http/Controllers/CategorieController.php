<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    public function index()
    {
        $categories = Categorie::all();
        return view('admin.categories.index')->with('categories',$categories);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required'
        ]);

        $categorie = new Categorie();
        $categorie->name = $request->name;
        $categorie->description = $request->description;

        if($categorie->save()){
            return redirect()->back();
        }
        else
        {
            echo "error";
        }
        
    }

    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        if($categorie->delete())
        {
            return redirect()->back();
        }else
        {
            echo "error";
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required'
        ]);

        $id = $request->id_category;
        $categorie = Categorie::find($id);
        $categorie->name = $request->name;
        $categorie->description = $request->description;

        if($categorie->update())
        {
            return redirect()->back();
        }else
        {
            echo "error";
        }

        
    }
}
