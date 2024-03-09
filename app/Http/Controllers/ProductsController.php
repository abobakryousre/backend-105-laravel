<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        # select * from products 
        $allProducts = Product::all();
        // $allProducts = Product::select("*")->get();
        return view('products.index', ["products" => $allProducts]);
    }

    public function show(Product $product)
    {
        # select * from products where id = $productID

        // $product = Product::find($productID);
        // $product = Product::where('id', $productID)->first();

        return view('products.show', ["product" => $product]);
    }


    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {

        // dd($reqObject->price);
        // get all request data 
        $productName = $request->name;
        $productPrice = $request->price;
        // $newProduct  = new Product;
        // $newProduct->name = $productName;
        // $newProduct->price = $productPrice;
        // $newProduct->save();
        Product::create([
            'name' => $request->name,
            'price' => $request->price
        ]);


        // validate 
        // inset into products (id,name,price,create_at);
        //redirect to index view

        return to_route('products.index');
    }


    public function destroy($productID)
    {
        // get prod id 
        $product = Product::find($productID);
        $product->delete();
        // delete form prdoucs where id = productID

        //

        return to_route('products.index');
    }

    public function edit(Product $product)
    {
        #get product 
        # select * from products where id = $productID
        // $product = Product::find($productID);

        return view('products.edit', ["product" => $product]);
        # return edit view with product data

    }


    public function update(Request $request, $productID)
    {
        # get product 
        // $productName = request()->name;
        // $productPrice = request()->price;

        $product = Product::find($productID);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();


        return to_route('products.show', ['product' => $productID]);
    }
}
