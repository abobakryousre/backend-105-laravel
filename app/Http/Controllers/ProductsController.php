<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        # select * from products 
        // $allProducts = Product::all();
        $allProducts = Product::select("*")->get();
        dd($allProducts);

        return view('products.index', ["products" => $allProducts]);
    }

    public function show($productID)
    {
        # select * from products where id = $productID
        $allProducts = [
            ["id" => 1, "name" => "car", "price" => 120000, "created_at" => "2024-03-02 12:00:00"],
            ["id" => 2, "name" => "iphone 12", "price" => 22000, "created_at" => "2024-03-02 13:00:00"],
            ["id" => 3, "name" => "smart watch", "price" => 8000, "created_at" => "2024-03-02 14:00:00"],
            ["id" => 4, "name" => "Macbook 16", "price" => 98000, "created_at" => "2024-03-02 15:00:00"]
        ];
        $res = array_filter($allProducts, fn ($product) => $product['id'] == $productID);
        $product = [...$res][0];
        return view('products.show', ["product" => $product]);
    }


    public function create()
    {
        return view('products.create');
    }
    public function store()
    {
        $reqObject = request();
        // dd($reqObject->price);
        // get all requet data 

        // validate 
        // inset into products (id,name,price,create_at);
        //redirect to index view

        return to_route('products.index');
    }


    public function destroy($productID)
    {
        // get prod id 
        // delete form prdoucs where id = productID

        //

        return to_route('products.index');
    }

    public function edit($productID)
    {
        #get product 
        # select * from products where id = $productID
        $allProducts = [
            ["id" => 1, "name" => "car", "price" => 120000, "created_at" => "2024-03-02 12:00:00"],
            ["id" => 2, "name" => "iphone 12", "price" => 22000, "created_at" => "2024-03-02 13:00:00"],
            ["id" => 3, "name" => "smart watch", "price" => 8000, "created_at" => "2024-03-02 14:00:00"],
            ["id" => 4, "name" => "Macbook 16", "price" => 98000, "created_at" => "2024-03-02 15:00:00"]
        ];
        $res = array_filter($allProducts, fn ($product) => $product['id'] == $productID);
        $product = [...$res][0];
        return view('products.edit', ["product" => $product]);
        # return edit view with product data

    }


    public function update($productID)
    {
        # get product 
        $productName = request()->name;
        $productPrice = request()->price;


        return to_route('products.show', ['product' => $productID]);
    }
}
