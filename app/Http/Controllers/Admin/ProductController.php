<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('products')->paginate(7);
        if($key = request()->key)
        {
            $result = DB::table('products')->where('prod_name','like','%'.$key.'%')->paginate(7);
        }
        return view('admin.product.index',compact('result'))->with('i', (request()->input('result', 1) -1) *7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = DB::table('categories')->get();
        return view('admin.product.add',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('txtImage')){
            $file = $request->txtImage;
            $ext = $request->txtImage->extension();
            $file_name = time().'-product'.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image'=>$file_name]);
        $params = [ 
            'prod_name'=>$request->txtTenSP, 
            'mota'=>$request->txtMota, 
            'prod_price'=>$request->txtGiaSP, 
            'cate_id'=>$request->txtDM,
            'prod_img'=>$file_name,
            'soluong'=>$request->txtSoLuong , 
            
        ];
        $id = DB::table('products')->insertGetId($params);
        $params1 = [ 
            'prod_id'=>$id, 
            'Card'=>$request->txtCard, 
            'CPU'=>$request->txtCPU, 
            'Ram'=>$request->txtRam,
            'O_Cung'=>$request->txtOCung,
            'Pin'=>$request->txtPin , 
            'Trong_luong'=>$request->txtTrongLuong ,
            'kichthuoc'=>$request->txtKichThuoc ,
        ];
        
        DB::table('info')->insert($params1);
        return redirect()->route('adminproduct.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->where('prod_id',$id)->first();
        $info = DB::table('info')->where('prod_id',$id)->first();
        return view('admin.product.show',['product'=>$product,'info'=>$info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = DB::table('categories')->get();
        $product = DB::table('products')->where('prod_id',$id)->first();
        $info = DB::table('info')->where('prod_id',$id)->first();
        return view('admin.product.edit',['product'=>$product,'cate'=>$cate, 'info'=>$info]);
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
        if($request->has('txtImage')){
            $file = $request->txtImage;
            $ext = $request->txtImage->extension();
            $file_name = time().'-product'.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image'=>$file_name]);
        $params = [ 
            'prod_name'=>$request->txtTenSP, 
            'mota'=>$request->txtMota, 
            'prod_price'=>$request->txtGiaSP, 
            'cate_id'=>$request->txtDM,
            'prod_img'=>$file_name,
            'soluong'=>$request->txtSoLuong , 
        ];
        $params1 = [ 
            'prod_id'=>$id, 
            'Card'=>$request->txtCard, 
            'CPU'=>$request->txtCPU, 
            'Ram'=>$request->txtRam,
            'O_Cung'=>$request->txtOCung,
            'Pin'=>$request->txtPin , 
            'Trong_luong'=>$request->txtTrongLuong ,
            'kichthuoc'=>$request->txtKichThuoc ,
        ];
        DB::table('products')->where('prod_id',$id)->update($params);
        DB::table('info')->where('prod_id',$id)->update($params1);
        return redirect()->route('adminproduct.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = DB::table('products')->select('prod_name')->where('prod_id',$id);
        DB::table('info')->where('prod_id',$id)->delete();
        DB::table('products')->where('prod_id',$id)->delete();
        
        return redirect()->route('adminproduct.index');
    }
}
