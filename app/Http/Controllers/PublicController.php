<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PublicController extends Controller
{
    public function index(Category $category, User $user)
    {
        $ads = Ad::where('is_accepted', true)
            ->orderBy('created_at','desc')
            ->take(8)
            ->get();
        $total_ads = Ad::get();
        $user = Auth::user();
        return view('welcome', compact('ads', 'total_ads', 'user'));
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function conditions()
    {
        return view('conditions');
    }

    public function about()
    {
        return view('about');
    }

    public function adsByCategory(Category $category)
    {
        $ads = $category->ads()->where('is_accepted', true)->latest()->paginate(16);
        return view('ad.by-category', compact('category','ads'));
    }

    public function setLocale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $ads = Ad::search($q)
            ->where('is_accepted', true)
            ->paginate(16);
        return view('ad.by-search', compact('q', 'ads'));    
    }

}
