<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mightAlsoLike = Product::mightAlsoLike()->take(3)->get();
        return view('pages.cart')->with('mightAlsoLike', $mightAlsoLike);
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
        return redirect()->route('cart.index')->with('success', 'Item added to your cart!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecart(Request $request)
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
    public function show($id)
    {
        //
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
        return $request->all();

        $validator = Validator::make($request->all(),[
            'quantity' => 'required|numeric|between:1,10'
        ]);

        if($validator->fails()){
            session()->flash('error', collect(['Quantity must be between 1 and 10.']));
            return response()->json(['success' =>false], 500);
        }
        Cart::update($id, $request->quantity);
        session()->flash('success', 'Quantity was updated successfuly!');
        return response()->json(['success' =>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('Success', 'Item has been removed!');
    }

    /**
     * switchToSaveForLater.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function($cartItem, $rowId) use ($id){
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success', 'Item is already Saved For Later!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
                ->associate('App\Product');

        return redirect()->route('cart.index')->with('success', 'Item has been save for later!');
    }


}
