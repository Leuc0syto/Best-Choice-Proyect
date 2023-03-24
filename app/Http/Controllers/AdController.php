<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('show');
    }

    public function create(){
        return view ('ad.create');
    }

    public function show(Ad $ad)
    {
        return view("ad.show", compact('ad'));
    }
}
