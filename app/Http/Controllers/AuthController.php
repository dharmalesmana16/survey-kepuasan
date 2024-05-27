<?php

namespace App\Http\Controllers;

use App\Models\LogsModel;
use App\Models\usersModel;
// use App\Models\User;
// use App\Models\usersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {

        return view('signin');
    }
    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $checking = new usersModel();
        $checkAuth = $checking::where('username', $username)->first();
        // $checking = use
        // echo
        if ($checkAuth) {

            $passVerify = $checkAuth->password;
            if (password_verify($password, $passVerify)) {

                // echo "sukses";
                session([
                    'nama' => $checkAuth->username,
                    'isLogin' => true,
                    // 'role' => $checkAuth->role,
                ]);
                return response()->json([
                    "msg" => "Success",
                    "status" => 1
                ], 200);
                // return redirect('/dashboard');
            } else {
                Session::flash('error', "Password Anda Salah !");
                return back()->WithInput();
            }
        } else {
            Session::flash('error', "Username Tidak Terdaftar !");
            return back()->WithInput();
        }
    }
    public function logout(Request $request)
    {
        // Artisan::call('cache:clear');
        $request->session()->flush(); // session_unset();
        // Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(url('/signin'));
    }
}
