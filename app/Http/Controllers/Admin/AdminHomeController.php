<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->count();
        $cate = DB::table('categories')->count();
        $items = DB::table('khachhang')->where('status',1)->count();
        $cuss = DB::table('khachhang')->where('status',0)->paginate(7, ['*'], 'first_model')
        ->appends(request()->except('first_model'));
        $orders = DB::table('order')
        ->join('khachhang','khachhang.cus_id','=','order.cus_id')
        ->where('status',0)->paginate(7, ['*'], 'second_model')
        ->appends(request()->except('second_model'));
        // ->paginate(7);
        return view('admin.index',['product'=>$product,'cate'=>$cate,'cuss'=>$cuss,'orders'=>$orders,'items'=>$items]);
        // ->with(compact('items', 'orders'));
        // ->with('i', (request()->input('cuss', 1) -1) *7)
        // ->with('i1', (request()->input('orders', 1) -1) *7);
    }

    public function show($id)
    {
        $product = DB::table('products')->count();
        $cate = DB::table('categories')->count();
        $items = DB::table('khachhang')->where('status',1)->count();
        $cuss = DB::table('khachhang')->paginate(7, ['*'], 'first_model')
        ->appends(request()->except('first_model'));
        // ->paginate(7);
        $orders = DB::table('order')->where('cus_id',$id)->paginate(7, ['*'], 'second_model')
        ->appends(request()->except('second_model'));
        // ->paginate(7);
        return view('admin.index',['product'=>$product,'cate'=>$cate,'cuss'=>$cuss,'orders'=>$orders,'items'=>$items]);
        // ->with(compact('items', 'orders'));
        // ->with('i', (request()->input('cuss', 1) -1) *7)
        // ->with('i1', (request()->input('orders', 1) -1) *7);
    }
}
