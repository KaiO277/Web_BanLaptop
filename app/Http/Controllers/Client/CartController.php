<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Helper\CartHelper;
use App\Models\Product;

class CartController extends Controller
{
    public function view(){
        return view('client.view.cart');
    }

    public function add(CartHelper $cart, $id){
        $cart->add($id);
        // dd(session('cart'));
        return redirect()->back(); 
    }

    public function remove(CartHelper $cart, $id){
        $cart->remove($id);
        return redirect()->back();
    }

    public function update(CartHelper $cart, $id){
        $quantity = request()->quantity;
        // dd($request->all());
        
        if($quantity<=0){
            $er = 'Số lượng sản phẩm không nhỏ hơn 1!!';
            return redirect()->route('clientcart.view')->with('error',$er);
        }else {
            $cart->update($id, $quantity);
            return redirect()->route('clientcart.view');
        }    
    }

    public function clear(CartHelper $cart){
        $cart->clear();
        return redirect()->back();
    }
}