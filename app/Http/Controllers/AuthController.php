<?php

namespace App\Http\Controllers;

use App\Models\LogsModel;
use App\Models\User;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {

        return view('template.signin');
    }
    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $checkAuth = User::where('username', $username)->first();

        if ($checkAuth) {
            $passVerify = $checkAuth->password;
            if (password_verify($password, $passVerify)) {
                if ($checkAuth->status == "PENDING") {
                    Session::flash('pending', "Your account is not active, please contact your admin !");
                    return redirect('/signin');
                } else {

                    session([
                        'nama' => $checkAuth->first_name . " " . $checkAuth->last_name,
                        'isLogin' => true,
                        // 'role' => $checkAuth->role,
                    ]);

                    return redirect(url('/'));
                }
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
