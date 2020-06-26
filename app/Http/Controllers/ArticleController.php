<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Auth;
use Image;
use App\ArticleImage;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::with('author','category')->orderBy('created_at','DESC')->paginate(10);
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories=Category::get();
       $users=User::get(['id','name']);
       return view('article.create', compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'category'=>'required|exists:categories,id',
            'name_sr'=>'required|min:3',
            'price'=>'nullable|numeric|min:0',
        ]);

        $article=new Article;
        $article->category_id=$request->category;
        $article->name_sr=$request->name_sr;
        $article->description_sr=$request->description_sr;
        $article->name_en=$request->name_en;
        $article->description_en=$request->description_en;
        $article->name_al=$request->name_al;
        $article->description_al=$request->description_al;
        $article->price=$request->price;
        $article->unit=is_numeric($request->unit)?$request->unit:NULL;
        $article->created_by=$request->user_id;
        $article->updated_by=Auth::user()->id;
        $article->save();


        return redirect()->route('article.show',$article->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->load('author','editor','category','images');
        return view('article.show',compact('article'));
    }

    public function setFeaturedImage(Article $article,ArticleImage $articleImage){
        $article->featured_image=$articleImage->id;
        $article->save();
        return redirect()->route('article.show',$article->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories=Category::get();
        $users=User::get(['id','name']);
       return view('article.edit', compact('categories','article','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([

            'user_id'=>'required|exists:users,id',
            'category'=>'required|exists:categories,id',
            'name_sr'=>'required|min:3',
            'price'=>'nullable|numeric|min:0',
        ]);


        $article->category_id=$request->category;
        $article->name_sr=$request->name_sr;
        $article->description_sr=$request->description_sr;
        $article->name_en=$request->name_en;
        $article->description_en=$request->description_en;
        $article->name_al=$request->name_al;
        $article->description_al=$request->description_al;
        $article->price=$request->price;
        $article->unit=is_numeric($request->unit)?$request->unit:NULL;
        $article->created_by=$request->user_id;
        $article->updated_by=Auth::user()->id;
        $article->save();



        return redirect()->route('article.show',$article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {


            $article->delete();



       return redirect()->route('article.index');
    }
}
