<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $allCategories = Category::all();
        return view('posts', ['categories' => $allCategories]);
    }
}
