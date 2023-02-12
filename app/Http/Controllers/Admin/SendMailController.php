<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class SendMailController extends Controller
{
    public function Thanhcong($id,Request $request,CartHelper $cart)
    {
        $result = DB::table('dathang')->where('cus_id',$id)->get();
        $n = DB::table('dathang')->where('cus_id',$id)->count();
        $cus = DB::table('khachhang')->where('cus_id',$id)->first();
        for ($i=1; $i<=$n; $i++)
            if ($i<$n)
            {
                foreach($result as $item){
                    $product = DB::table('products')->where('prod_id',$item->prod_id)->first();
                    $soluong = $product->soluong;
                    $quantity = (int)$item->quantity;
                    if($quantity > $soluong){
                        $error = 'Số lượng sản phẩm '.$item->prod_name .' trong kho không đủ';
                        return redirect()->route('adminadmin.home')->with('error',$error);
            } 
            }    
        }else{
            foreach($result as $item){
                $product = DB::table('products')->where('prod_id',$item->prod_id)->first();
                $soluong = $product->soluong;
                $quantity = (int)$item->quantity;
                $param1 = [
                    'soluong'=>$soluong-$quantity
                ];
                DB::table('products')->where('prod_id',$id)->update($param1); 
        } 
        $items = DB::table('order')->where('cus_id',$id)->get();
        Mail::send('admin.email.email',[
            'c_name'=> $request->name,
            'items'=>$items,
            'cus'=>$cus
            ],function($mail) use($request){
                $mail->to($request->email,$request->name);
                $mail->subject('Email Xác Nhận');
                }
            );
            $param = [
                'status'=>1,
        ];
            DB::table('khachhang')->where('cus_id',$id)->update($param);    
        return redirect()->route('adminadmin.home');
    }
    }

    public function ThatBai($id,Request $request)
    {
        // $cus = DB::table('khachhang')->where('cus_id',$id)->first();
        // $items = DB::table('order')->where('cus_id',$id)->get();
        Mail::send('admin.email.huy',[],function($mail) use($request){
            $mail->to($request->email,$request->name);
            // $mail->from('hotelnghia@gmail.com');
            $mail->subject('Email Xác Nhận');
        }
    );
    DB::table('khachhang')->where('cus_id',$id)->delete();
    DB::table('dathang')
        ->join('khachhang','khachhang.cus_id','=','dathang.cus_id')
        ->where('khachhang.cus_id',$id)
        ->delete();
    return redirect()->route('adminadmin.home');
    }
}
