<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    public function login()
    {
        return view('admin.Auth.login');
    }

    public function loginn()
    {
        return view('admin.Auth.loginn');
    }

    public function checklogin(Request $request)
    {
        try {
                $user = User::query()
                ->where('name', $request->username)
                ->where('password', $request->password)
                ->firstOrFail(); 
                // dd($user);
                session()->put('name',$user->name);
                session()->put('id', $user->id);

                return redirect()->route('adminadmin.home');
            }catch(\Throwable $e){
            return redirect()->route('loginn')->with('error', 'Tên đăng nhập hoặc Mật khẩu sai');
        }    
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('loginn');
    }
}
