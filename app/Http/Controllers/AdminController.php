<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $revisor = Revisor::where('revisor_accepted', null)
                        ->orderBy('created_at', 'desc')
                        ->first();
        return view('admin.home', compact('revisor'));
    }
}
