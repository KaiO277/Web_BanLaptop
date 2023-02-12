<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('categories')
        
        ->paginate(7);
        if($key = request()->key)
        {
            $result = DB::table('categories')->where('cate_name','like','%'.$key.'%')->paginate(7);
        }
        return view('admin.category.index',compact('result'))->with('i', (request()->input('result', 1) -1) *7);
    }

    // public function index()
    // {
    //     $result = DB::table('cate')
    //     ->select('cate_id','cate_name',DB::raw('count(*) as soluong, status'))
    //     ->paginate(7);
    //     if($key = request()->key)
    //     {
    //         $result = DB::table('cate')->where('cate_name','like','%'.$key.'%')->paginate(7);
    //     }
    //     return view('admin.category.index',compact('result'))->with('i', (request()->input('result', 1) -1) *7);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $params = [ 
            'cate_name'=>$request->txtTenDM
        ];
        DB::table('categories')->insert($params);
        return redirect()->route('admincategory.index');
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
        $category = DB::table('categories')->where('cate_id',$id)->first();
        return view('admin.category.edit',['category'=>$category]);
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
        $params = [ 
            'cate_name'=>$request->txtTenDM
        ];
        DB::table('categories')->where('cate_id',$id)->update($params);
        return redirect()->route('admincategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->where('cate_id',$id)->delete();
        DB::table('categories')->where('cate_id',$id)->delete();
        return redirect()->route('admincategory.index');
    }
}
