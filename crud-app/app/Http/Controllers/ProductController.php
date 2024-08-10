<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::latest()->paginate(5);
        $products = Product::all();
        $products = Product::paginate(5);
        return view('products.index',compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'name'=>'required',
            'description'=>'required',
            'mrp'=>'required|numeric',
            'price'=>'required|numeric',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $imgName = time().".".$req->image->extension();
        $req->image->move(public_path('products'),$imgName);

        $product = new Product;
        $product->image = $imgName;
        $product->name = $req->name;
        $product->description = $req->description;
        $product->mrp = $req->mrp;
        $product->price = $req->price;
        $product->save();
        return back()->withSuccess('Product Details Added Success...');
    }

    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        return view('products.show',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        return view('products.edit',compact('product'));
    }

    public function update(Request $req,$id)
    {
        $req->validate([
            'name'=>'required',
            'description'=>'required',
            'mrp'=>'required|numeric',
            'price'=>'required|numeric',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $product = Product::where('id',$id)->first();

        if(isset($req->image))
        {
            $imgName = time().".".$req->image->extension();
            $req->image->move(public_path('products'),$imgName);
            $product->image = $imgName;
        }

        if ($product !== null) {
            $product->name = $req->name;
            $product->description = $req->description;
            $product->mrp = $req->mrp;
            $product->price = $req->price;
            $product->save();
        }
        return back()->withSuccess('Product Details Updated Success...');
    }

    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Details Deleted Success...');
    }
}
