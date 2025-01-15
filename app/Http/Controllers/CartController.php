<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view(){
        return view("cart");
    }

    public function add($id){
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity'] += request()->quantity ?? 1;
            session()->put('cart',$cart);
            return back();
        }

        else{
            $product = Product::find($id);
            $cart[$id]['thumbnail'] = $product['thumbnail'];
            $cart[$id]['title'] = $product['title'];
            $cart[$id]['price'] = $product['price'];
            $cart[$id]['stock'] = $product['stock'];
            $cart[$id]['quantity'] = request()->quantity ?? 1;
            session()->put('cart',$cart);
            return back();
        }
    }

    public function remove($id){
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart',$cart);
        return back();
    }
    public function clear(){
        session()->put('cart',[]);
        return back();
    }

    public function update($id){
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = request()->quantity;
            session()->put('cart',$cart);
            return back();
        }
        return back();
    }
}
