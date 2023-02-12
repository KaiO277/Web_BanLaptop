<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Gloudemans\Shoppingcart\Facades\Cart;

class ClientProductController extends Controller
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
        $products = DB::table('products')->paginate(6);
        if($key = request()->txtKey){
            $products = DB::table('products')->where('prod_name','like','%'.$key.'%')->paginate(6);
        }
        return view('client.view.listproduct',['categories'=>$categories],compact('products'))->with('i', (request()->input('products', 1) -1) *6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
        // $count = Cart::count();
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->where('cate_id',$id)->paginate(6);
        if($key = request()->txtKey){
            $products = DB::table('products')->where('prod_name','like','%'.$key.'%')->paginate(6);
        }
        return view('client.view.listproduct',['categories'=>$categories],compact('products'))->with('i', (request()->input('products', 1) -1) *6);
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
