<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function index()
    {
        $ads = Ad::where('is_accepted', true)->orderBy('created_at','desc')->take(6)->get();
        return view('welcome', compact('ads'));
    }

    public function adsByCategory(Category $category)
    {
        $ads = $category->ads()->where('is_accepted', true)->latest()->paginate(4);
        return view('ad.by-category', compact('category','ads'));
    }

    public function about()
    {
        return view('about');
    }
    public function privacy()
    {
        return view('privacy');
    }

    public function conditions()
    {
        return view('conditions');
    }

    public function setLocale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
