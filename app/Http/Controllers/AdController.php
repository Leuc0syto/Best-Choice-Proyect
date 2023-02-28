<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdController extends Controller
{
    //

    public function home(){
        return view ('welcome');
    }
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        return view ('ad.create');
    }
}
