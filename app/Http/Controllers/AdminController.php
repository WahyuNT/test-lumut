<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        if (session('role') != 'admin') {
            return redirect()->route('author');
         }
        return view('pages.admin.index');
    }

    public function dataAccount()
    {

        $account = Account::all();
        return view('pages.admin.data-account')->with([
            'account' => $account
        ]);
    }
    public function editDataAccount($username){
        $member = Account::where('username', $username)->first();
        return view('pages.admin.edit-data-member')->with([
            'member' => $member
        ]);
    }

}
