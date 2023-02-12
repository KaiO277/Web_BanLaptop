<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuss = DB::table('khachhang')->where('status',1)->paginate(7, ['*'], 'first_model')
        ->appends(request()->except('first_model'));
        // ->paginate(7);
        $orders = DB::table('order')
        ->join('khachhang','khachhang.cus_id','=','order.cus_id')
        ->where('status',1)
        ->paginate(7, ['*'], 'second_model')
        ->appends(request()->except('second_model'));
        // ->paginate(7);
        return view('admin.order.index',['cuss'=>$cuss,'orders'=>$orders]);
        // ->with('i', (request()->input('cuss', 1) -1) *7)
        // ->with('i1', (request()->input('orders', 1) -1) *7);
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
        $cuss = DB::table('khachhang')->where('status',1)->paginate(7, ['*'], 'first_model')
        ->appends(request()->except('first_model'));
        // ->paginate(7);
        $orders = DB::table('order')
        ->join('khachhang','khachhang.cus_id','=','order.cus_id')
        ->where('status',1)
        ->where('khachhang.cus_id',$id)
        ->paginate(7, ['*'], 'second_model')
        ->appends(request()->except('second_model'));
        // ->paginate(7);
        return view('admin.order.index',['cuss'=>$cuss,'orders'=>$orders])
        ->with('i', (request()->input('cuss', 1) -1) *7)
        ->with('i1', (request()->input('orders', 1) -1) *7);
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
