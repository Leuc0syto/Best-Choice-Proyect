<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function destroy(Ad $ad){
        if (Auth::user()->id = $ad->user->id){
        $ad->deleteOrFail();
        return redirect()->route('home')->withMessage(['type'=>'danger', 'text'=>'Anuncio eliminado']);
        } else {
            return redirect()->back()->withMessage(['type'=>'danger', 'text'=>'Acción no disponible: Un anuncio solo puede ser borrado por el creador']);
        }
    }
}
