<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\ArticleImage;
use App\Category;
use Image;
class FrontArticleController extends Controller
{
    public function index()
    {
        $articles=Article::with('author','category')->where('created_by',\Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
        return view('frontArticle.index', compact('articles'));
    }
    public function create()
    {
       $categories=Category::get();
       return view('frontArticle.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category'=>'required|exists:categories,id',
            'name'=>'required|min:3',
            'price'=>'required|numeric|min:0',
        ]);

        $article=new Article;
        $article->category_id=$request->category;
        $article->name=$request->name;
        $article->description=$request->description;
        $article->price=$request->price;
        $article->unit=is_numeric($request->unit)?$request->unit:NULL;
        $article->created_by=\Auth::user()->id;
        $article->updated_by=\Auth::user()->id;
        $article->save();


        return redirect()->route('frontArticle.index');
    }
    public function destroy(Article $article)
    {


            $article->delete();



       return redirect()->route('frontArticle.index');
    }
    public function edit(Article $article)
    {
        $categories=Category::get();
       return view('frontArticle.edit', compact('categories','article'));
    }
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'category'=>'required|exists:categories,id',
            'name'=>'required|min:3',
            'price'=>'required|numeric|min:0',
        ]);


        $article->category_id=$request->category;
        $article->name=$request->name;
        $article->description=$request->description;
        $article->price=$request->price;
        $article->unit=is_numeric($request->unit)?$request->unit:NULL;
        $article->updated_by=\Auth::user()->id;
        $article->save();



        return redirect()->route('frontArticle.index');
    }
    public function show(Article $article)
    {
        $article->load('author','editor','category','images');
        return view('frontArticle.show',compact('article'));
    }

    public function setFeaturedImage(Article $article,ArticleImage $articleImage){
        $article->featured_image=$articleImage->id;
        $article->save();
        return redirect()->route('frontArticle.show',$article->id);
    }
    public function newImage(Request $request,Article $article)
    {
        $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            'article_id'=>'required|exists:articles,id',
        ]);


            $articleImage=new ArticleImage;
            $articleImage->article_id=$request->article_id;
            $articleImage->save();

        if ($files = $request->file('image')) {

            // for save original image
            $imageUpload = Image::make($files);
            $ds=DIRECTORY_SEPARATOR;
            $originalPath = public_path().$ds.'uploads'.$ds.'articles'.$ds.$articleImage->id.'.jpg';
            $imageUpload->save($originalPath);

            // for save thumnail image
            $thumbnailPath = public_path().$ds.'uploads'.$ds.'articles'.$ds.'thumbnails'.$ds.$articleImage->id.'.jpg';
            $imageUpload->fit(230,160);
            $imageUpload = $imageUpload->save($thumbnailPath);
                 // for save 570x500
                 $imageUpload = Image::make($files);
                 $originalPath = public_path().$ds.'uploads'.$ds.'articles'.$ds.$articleImage->id.'_570x500.jpg';
                 $imageUpload->fit(570,500);
                 $imageUpload->save($originalPath);


          }
          $article=Article::find($articleImage->article_id);
          if($article->featured_image==0){
              $article->featured_image=$articleImage->id;
              $article->save();
          }
          return redirect()->route('frontArticle.show',$articleImage->article_id);

    }
    public function deleteImage(ArticleImage $articleImage)
    {

        if($articleImage->id!=$articleImage->article->featured_image){
            if($articleImage->delete()){

                $ds=DIRECTORY_SEPARATOR;
                $originalPath = public_path().$ds.'uploads'.$ds.'articles'.$ds.$articleImage->id.'.jpg';
                $thumbnailPath = public_path().$ds.'uploads'.$ds.'articles'.$ds.'thumbnails'.$ds.$articleImage->id.'.jpg';

                file_exists($originalPath)? unlink($originalPath):'';
                file_exists($thumbnailPath)? unlink($thumbnailPath):'';

                }
        }else{
            return redirect()->route('frontArticle.show',$articleImage->article_id)->with('warning','Image is set as featured try again');
        }
        return redirect()->route('frontArticle.show',$articleImage->article_id);

    }

}
