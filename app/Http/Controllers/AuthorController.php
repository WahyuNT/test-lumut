<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        if (session('role') != 'author') {
            return redirect()->route('admin');
         }
        return view('pages.author.index');
    }
}
