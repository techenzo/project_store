<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class LandingPageController extends Controller
{
    public function index(){
        // $products = Product::inRandomOrder()->take(8)->get();

        // return view('landing-page')->with('products', $products);


        $products = Product::inRandomOrder()->take(8)->get();
        $categories = Category::all();

        return view('landing-page')->with([
            'products' => $products,
            'categories' => $categories]);


    }
    
}
