<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ad extends Model
{
    protected $fillable = ['title', 'body', 'price', 'category'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    static public function ToBeRevisionedCount()
    {
        return Ad::where('is_accepted', null)->count();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
