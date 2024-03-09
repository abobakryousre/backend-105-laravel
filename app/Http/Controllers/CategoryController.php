<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return "<h1>index page</h1>";
    }

    public function show($id)
    {
        return "<h1>show page $id</h1>";
    }

    public function edit()
    {
        return "<h1>edit page</h1>";
    }

    public function update($id)
    {
        return "<h1>update page $id</h1>";
    }
}
