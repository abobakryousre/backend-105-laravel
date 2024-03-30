<?php

use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'orders' => OrderController::class,
    ]);
});


Route::post('login', UserController::class . "@login");
Route::post('logout', UserController::class . "@logout")->middleware('auth:sanctum');

// RESTfull api Design 
// 1- define your service as resources 
// 2- Use resource names as plural (users, products, orders)
// 3- for CRUD operation use http methods  ( Create -> POSt, Read -> GET, Update -> Put, patch, Delete -> Delete)
// 4- data formatted as json
// 5-  attach status code  with ever response
// 6- deal with your api as front end deal with UX design 
// example: when handle failure you might add details in your response in case needed 
// 7- versioning your APIs


// status code guide lien 

/**
- GET: 200 OK
- PUT, PATCH: 200 OK
- POST: 201 Created
- DELETE: 204 No Content
 */


 // API Documentation 

 // 1- API contract 
 // 2- API collections 
 // 3- swagger API


 // Authentication and Authorization

 // Authentication methods 

 // 1