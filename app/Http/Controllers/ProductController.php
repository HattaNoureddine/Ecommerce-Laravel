<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $products = Product::all();
        return view('admin.products.index')->with('products',$products)->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id  = $request->category;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qte = $request->qte;
        //upload Image
        $newname = uniqid();
        $image = $request->file('photo');
        $newname.= ".".$image->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $image->move($destinationPath,$newname);

        $product->photo = $newname;

        if($product->save())
        {
            return redirect()->back();
        }else{
            echo "error";
        }
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $file_path = public_path().'/uploads/'.$product->photo;
        unlink($file_path);
        if($product->delete())
        {
            return redirect()->back();
        }else
        {
            echo "error";
        }
    }


    public function update(Request $request)
    {
        
         $product = Product::find($request->id_product);
         $product->name = $request->name;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->qte = $request->qte;

        if($request->file('photo')){
            //supprimer ancienne photo 
            // $file_path = public_path().'/uploads/'.$product->photo;
            // unlink($file_path);

            $destination = 'uploads/'.$product->photo;

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

            $product->photo = $newname;
        }
       
        if($product->update())
        {
            return redirect()->back();
        }else{
            echo "error";
        }
    }

    public function searchProduct(Request $request)
    {
  
        if($request->product_name && !$request->qte){
            $products = Product::where('name','LIKE','%'.$request->product_name.'%')->get();
        }
        if(!$request->product_name && $request->qte){
            $products = Product::where('qte','>=',$request->qte)->get();
        }
        if($request->product_name && $request->qte){
            $products = Product::where('name','LIKE','%'.$request->product_name.'%')
                                ->where('qte','>=',$request->qte)->get();
        }
        if(!$request->product_name && !$request->qte){
            $products = Product::all();
        }

    $categories = Categorie::all();
    return view('admin.products.index')->with('products',$products)->with('categories',$categories);
    }
}
