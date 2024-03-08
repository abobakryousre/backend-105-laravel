<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get("/profile", function () {
    return "<h1>profile page</h1>";
});


Route::get("/home", function () {
    return view('home', ["name" => "tamer", "role" => "admin", "age" => 12]);
});

Route::get("/products", [ProductsController::class, 'index'])->name('products.index');
Route::post("/products", [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::get("/products/{product}", [ProductsController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductsController::class, "edit"])->name('products.edit');
Route::patch('/products/{product}/edit', [ProductsController::class, "update"])->name('products.update');
Route::delete("/products/{product}", [ProductsController::class, 'destroy'])->name('products.destroy');


# development steps 
# 1 - define route 
# 2- create controller, and  actions  inside controller 
# 3- create view
# -  (first static view Just style with static data) 
# - replace static data with real data from DB