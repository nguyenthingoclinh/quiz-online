<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AbcController extends Controller
{
    public function  abc()
    {
        $user = User::first();
        return view('home', compact('user'));
    }

    public function login()
    {
         return view('login');
    }
}
