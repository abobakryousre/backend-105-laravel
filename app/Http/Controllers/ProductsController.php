<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        # select * from products 
        $allProducts = Product::latest()->paginate(10);
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
        $categories = Category::all();
        return view('products.create', ["categories" => $categories]);
    }
    public function store(StoreProductRequest $request)
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
            'price' => $request->price,
            'category_id' => $request->category
        ]);


        // validate 
        // inset into products (id,name,price,create_at);
        //redirect to index view

        return to_route('products.index')->with("requestStatus", "product created successfully");
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
        $categories = Category::all();

        return view('products.edit', ["product" => $product, "categories" => $categories]);
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
        $product->category_id = $request->category;
        $product->save();


        return to_route('products.show', ['product' => $productID]);
    }
}
