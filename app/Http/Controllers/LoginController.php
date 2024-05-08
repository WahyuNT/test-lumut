<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        $login = Session::get('role');

        if ($login == null) {
            return view('pages.login');
        } else {
            return redirect()->route('admin');
        }
     
    }


    public function loginAdmin()
    {
        $username = request()->username;
        $password = request()->password;

        $data =  Account::where('username', $username)->where('password', $password)->first();
        if($data){
            Session::put('username', $data->username);
   
            Session::put('role', $data->role);

            Alert::success('Login Berhasil', 'Anda Berhasil Login Sebagai Admin');

            return redirect()->route('admin');
        }else{
            Alert::error('Login Gagal', 'Password atau Username Salah');
            return redirect()->back();
        }

    }
  

    public function logout(){
    
        Session::flush();
        Alert::info('Logout', 'Anda Berhasil Logout');
        return redirect()->back();

    }
}
