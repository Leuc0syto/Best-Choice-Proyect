<?php

namespace App\Models;
use App\Models\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
<<<<<<< HEAD
    
=======
>>>>>>> 8dd50a8ab8c685acd9991a6d92716b04d265c05f
    protected $fillable = ['path'];

    public function ads()
    {
        return $this->belongsTo(Ad::class);
    }

    public static function getUrlByFilePath($filePath, $w = null, $h = null)
    {
        if (!$w && !$h) {
            return Storage::url($filePath);
    }
        $path = dirname($filePath);
        $filename = basename($filePath);
        $file = "{$path}/crop_{$w}x{$h}_{$filename}";
        return Storage::url($file);
    }

    public function getUrl($w = null, $h = null)
    {
        return self::getUrlByFilePath($this->path, $w, $h);
    }
<<<<<<< HEAD
=======

>>>>>>> 8dd50a8ab8c685acd9991a6d92716b04d265c05f
}
