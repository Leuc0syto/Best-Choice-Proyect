<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    protected $signature = 'best-choice:makeUserAdmin {email}';
    protected $description = 'Asigna el rol de administrador a un usuario';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $user = User::where('email', $this->argument('email'))->first();
        
        if(!$user){
            $this->error("Usuario no encontrado");
            return;
        }
        $user->is_admin = true;
        $user->save();
        $this->info("El usuario $user->name ya es un administrador");
    }
}
