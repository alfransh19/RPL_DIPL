<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;

class CartController extends Controller
{
    public function show(){
        return view("/cart", ["title"=>"Cart"]);
    }
    public function getAddToCart(Request $request, $id){
        $books=Book::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($books, $books->id);

        $request->session()->put('cart',$cart);
        return redirect()->route('');
    }
    public function getCart(){
        if (!Session::has('cart') ){
            return view("/cart", ['books'=>null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view("/cart",  ['books' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }
}
