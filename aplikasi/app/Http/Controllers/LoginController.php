<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginAction(Request $request)
    {
        $check = \App\User::where('email', $request->email)->first();
        if($check->is_deleted == "Y")
        {
            return response()->json([
                'status' => 400,
                'response' => "Akun Tidak Aktif"
            ]);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return response()->json([
                'status' => 200,
                'msg' => "Anda Berhasil Login",
                'response' => "/"
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'msg' => "Mohon Coba Cek Kembali",
                'response' => "/"
            ]);
        }
    }

    public function loginAdminAction(Request $request)
    {
        $check = \App\User::where('email', $request->email)->first();
        if($check == true)
        {
            if($check->is_deleted == "Y")
            {
                return response()->json([
                    'status' => '400',
                    'response' => 'Akun Tidak Aktif'
                ]);
            }

            $user = auth($check->role);

            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (!$user->attempt($credentials))
            {
                $credentials = [
                    'email' => $request->email,
                    'password' => $request->password,
                ];
            }

            if ($user->attempt($credentials))
            {
                return response()->json([
                    'status' => '200',
                    'response' => 'admin'
                ]);
            } else {
                return response()->json([
                    'status' => '400',
                    'response' => 'Email Dan Password Tidak Cocok'
                ]);
            }

        }else{
            return response()->json([
                'status' => '400',
                'response' => 'Email Tidak Terdaftar'
            ]);
        }
    }
}