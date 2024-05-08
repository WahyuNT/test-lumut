<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (session('role') != 'admin') {
            return redirect()->route('member');
         }
        return view('pages.admin.index');
    }

}
