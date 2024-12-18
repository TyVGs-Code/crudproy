<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view("modules/auth/login");
    }

    public function registro(){
        return view("modules/auth/registro");
    }
}
