<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        $produits = Product::all();
        $categories = Categorie::all();
        return view('guest.home')->with('produits',$produits)->with('categories',$categories);
    }



    public function productDetails($id)
    {
        $product = Product::find($id);
        $products = Product::where('id','!=',$id)->get();
        $categories = Categorie::all();
        return view('guest.product-details')->with('categories',$categories)->with('product',$product)->with('products',$products);
    }


    
    public function shop($idcategory){
        $category = Categorie::find($idcategory);
        $products = $category->products;
        $categories = Categorie::all();
        return view('guest.shop')->with('categories',$categories)->with('products',$products);
    }

    public function search(Request $request)
    {
        $categories = Categorie::all();
        $products = Product::where('name','LIKE','%'.$request->keywords.'%')->get();
        return view('guest.shop')->with('categories',$categories)->with('products',$products);

    }
}
