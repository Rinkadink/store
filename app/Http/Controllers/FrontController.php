<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\ArticleImage;
use App\Store;
use App\StoreFile;
use App\StoreCarousel;
class FrontController extends Controller
{
    public function index()
    {
        $stores=Store::latest()->take(10)->get();
        $categories=Category::get();
        return view('front_home',compact('categories','stores'));
    }

    public function articles(Request $request){
        $articles=Article::query();
        $articles->with('image');

        if($request->has('search')){
            $articles->where('name','like','%'.$request->search.'%');


        }
        if($request->has('category')&&!empty($request->category)){
            $articles->where('category_id',$request->category);
        }
        $articles=$articles->paginate(9);

        $latest_articles=Article::latest()->take(3)->get();
        $categories=Category::withCount('articles')->get();
        return view('articles',compact('articles','latest_articles','categories'));
    }
    public function article(Article $article){
        $article->load('category','images');
        $latest_articles=Article::latest()->take(4)->get();
        return view('article',compact('article','latest_articles'));
    }

    public function stores(){
        $stores=Store::paginate(10);
        return view('stores',compact('stores'));
    }
    public function about_us(){
        $about_us=Store::get();
        return view('about_us',compact('about_us'));
    }

    public function store(Store $store){
        $store->load('files');
        $articles=Article::where('created_by',$store->owner->id)->paginate(8);
        $articleIds=Article::where('created_by',$store->owner->id)->pluck('id')->all();
        $articleImages=ArticleImage::whereIn('article_id',$articleIds)->paginate(12);
        $carousels=StoreCarousel::where('store_id',$store->id)->get();
        return view('store',compact('store','articles','carousels','articleImages'));
    }
    public function profile(){
        $store=\Auth::user()->store;
        return view('profile',compact('store'));
    }
public function contactForm(){
    return view('contact');
}
public function contactStore(Store $store){
    return view('contact_store',compact('store'));
}
}
