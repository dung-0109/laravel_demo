<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('auth.signin');
    }

    //Kiểm tra dữ liệu đăng ký
    public function checkSignIn(Request $request)
    {
        $username   = $request->username;
        $password   = $request->password;
        $repass     = $request->repass;
        $mssv       = $request->mssv;
        $lopmonhoc  = $request->lopmonhoc;
        $gioitinh   = $request->gioitinh;

        if (
            $username === 'DungPTT' &&
            $password === 'dung0109' &&
            $repass === 'dung0109' &&
            $mssv === '0003367' &&
            $lopmonhoc === '67PM1' &&
            $gioitinh === 'nu'
        ) {
            return "Đăng ký thành công!";
        }

        return "Đăng ký thất bại";
    }
}