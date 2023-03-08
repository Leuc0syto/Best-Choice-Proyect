<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Revisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        $revisor = Revisor::where('revisor_accepted', null)
                        ->orderBy('created_at', 'desc');
        return view('admin.home', compact('revisor'));
    }

    public function acceptRevisor(Revisor $revisor)
    {
        $revisor->setAccepted(true);
        return redirect()->back()->withMessage(['type'=>'success', 'text'=>'Revisor aceptado']);
    }

    public function rejectRevisor(Revisor $revisor)
    {
        $revisor->setAccepted(false);
        return redirect()->back()->withMessage(['type'=>'danger', 'text'=>'Revisor rechazado']);
    }

    public function becomeRevisor()
    {
        Mail::to('admin@bestchoice.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->withMessage(['type'=>'success','text'=>'Solicitud enviada con éxito, próximamente nos pondremos en contacto con usted. Gracias por su interés.']);
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('best-choice:makeUserRevisor',['email'=>$user->email]);
        return redirect()->route('home')->withMessage(['type'=>'success','text'=>'Ya tenemos un compañero más']);
    }

}
