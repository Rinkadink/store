<?php

namespace App\Http\Controllers;

use App\ArticleImage;
use App\Article;
use Image;
use Illuminate\Http\Request;

class ArticleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Article $article)
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
          return redirect()->route('article.show',$articleImage->article_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleImage $articleImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleImage $articleImage)
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
            return redirect()->route('article.show',$articleImage->article_id)->with('warning','Image is set as featured try again');
        }
        return redirect()->route('article.show',$articleImage->article_id);

    }
}
