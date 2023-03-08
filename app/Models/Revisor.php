<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Revisor extends Model
{
    use HasFactory;

    public function setAccepted($value)
    {
        $this->revisor_accepted = $value;
        $this->save();
        return true;
    }

    static public function ToBeRevisionedCount()
    {
        return User::where('revisor_accepted', null)->count();
    }
}
