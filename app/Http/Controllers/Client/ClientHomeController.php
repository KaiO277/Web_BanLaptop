<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Gloudemans\Shoppingcart\Facades\Cart;

class ClientHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $count = Cart::content()->count();
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->orderBy('prod_price','desc')->limit(6)->get();
        if($key = request()->txtKey){
            $products = DB::table('products')->where('prod_name','like','%'.$key.'%')->limit(6)->get();
        }
        return view('client.view.index',['categories'=>$categories,'products'=>$products]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $count = Cart::content()->count();
        $categories = DB::table('categories')->get();
        $result = DB::table('info')
                // ->select('products.prod_name','info.CPU', 'info.Card', 'info.O_Cung','info.Pin','info.Ram','info.Trong_luong','info.kichthuoc', 'products.prod_img', 'prod_price', 'mota','prod_id','so_luong')
                // ->select(*)
                ->join('products','products.prod_id','=','info.prod_id')
                ->where('products.prod_id',$id)
                ->first();
        return view('client.view.product',['categories'=>$categories,'result'=>$result]);
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
