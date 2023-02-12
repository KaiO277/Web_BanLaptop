<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helper\CartHelper;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function submit_order(OrderRequest $request,CartHelper $cart)
    {
        $params = [ 
            'cus_name'=>$request->name,
            'OrderTime'=>date("Y-m-d"),
            'sdt'=>$request->sdt,
            'email'=>$request->email,
            'address'=>$request->address,
            'price'=>$cart->total_price,
        ];
        $id = DB::table('khachhang')->insertGetId($params);
        $name = DB::table('khachhang')->where('id',$id);
        foreach($cart->items as $item)
        {
            // $name = $item['name'];
            $params1 = [ 
                'prod_id'=>$item['id'],
                'quantity'=>$item['quantity'],
                'cus_id'=>$id,
            ];  
            DB::table('dathang')->insert($params1);
        }
        session(['cart'=>'']);
        return redirect()->route('clientcart.view');
    }
}
