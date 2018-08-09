<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Cart;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::inRandomOrder()->take(8)->get();
        // return view('pages.shop')->with('products', $products);

        if(request()->category){
            $products = Product::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->category);
            })->get();
            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;
        }
        else{
            // $products = Product::all();
            // $products = Product::inRandomOrder()->simplePaginate(12);
            $products = Product::inRandomOrder()->take(12)->get();
            $categories = Category::all();
            $categoryName = 'Featured';
        }
        $mightAlsoLike = Product::mightAlsoLike()->take(3)->get();
        return view('pages.shop')->with([
            'products' => $products,
            'mightAlsoLike' => $mightAlsoLike,
            'categories' => $categories,
            'categoryName' => $categoryName
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success', 'Item is already in your cart');
        }
        Cart::add($request->id, $request->name, 1, $request->price)
                ->associate('App\Product');
        return back()->with('success', 'Item added to your cart!');
        // return redirect()->route('shop.index')->with('success', 'Item added to your cart!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $categories = Category::all();
        $product = Product::where('slug', $slug)->firstOrFail();
        // $mightAlsoLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(2)->get();
        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();
        return view('pages.product')->with([
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
