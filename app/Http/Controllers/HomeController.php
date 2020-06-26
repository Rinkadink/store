<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Store;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stores_count=Store::count();
        $categories_count=Category::count();
        $articles_count=Article::count();
        $users_count=User::count();
        $top_users=User::withCount('articles')->orderBy('articles_count','DESC')->latest()->take(5)->get();
        return view('home',compact('stores_count','categories_count','articles_count','users_count','top_users'));
    }
}
