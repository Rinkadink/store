<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
use Image;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::with('author')->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name_sr'=>'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ]);
        $category=new Category;
        $category->name_sr=$request->name_sr;
        $category->description_sr=$request->description_sr;
        $category->name_en=$request->name_en;
        $category->description_en=$request->description_en;
        $category->name_al=$request->name_al;
        $category->description_al=$request->description_al;
        $category->created_by=Auth()->user()->id;
        $category->updated_by=Auth()->user()->id;
        $category->save();

        if ($files = $request->file('image')) {

            // for save original image
            $imageUpload = Image::make($files);
            $ds=DIRECTORY_SEPARATOR;
            $originalPath = public_path().$ds.'uploads'.$ds.'categories'.$ds.$category->id.'.jpg';
            $imageUpload->save($originalPath);

            // for save thumnail image
            $thumbnailPath = public_path().$ds.'uploads'.$ds.'categories'.$ds.'thumbnails'.$ds.$category->id.'.jpg';
            $imageUpload->fit(300,200);
            $imageUpload = $imageUpload->save($thumbnailPath);
          }


        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $articles=Article::where('category_id',$category->id)->paginate(10);
        return view('category.show',compact('category','articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_sr'=>'required|min:3',
            'image' => 'image|mimes:jpeg,png,jpg|max:4096',
        ]);

        $category->name_sr=$request->name_sr;
        $category->description_sr=$request->description_sr;
        $category->name_en=$request->name_en;
        $category->description_en=$request->description_en;
        $category->name_al=$request->name_al;
        $category->description_al=$request->description_al;
        $category->updated_by=Auth()->user()->id;
        $category->save();
        if ($files = $request->file('image')) {

            // for save original image
            $imageUpload = Image::make($files);
            $ds=DIRECTORY_SEPARATOR;
            $originalPath = public_path().$ds.'uploads'.$ds.'categories'.$ds.$category->id.'.jpg';
            $imageUpload->save($originalPath);

            // for save thumnail image
            $thumbnailPath = public_path().$ds.'uploads'.$ds.'categories'.$ds.'thumbnails'.$ds.$category->id.'.jpg';
            $imageUpload->fit(250,250);
            $imageUpload = $imageUpload->save($thumbnailPath);
          }


        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->articles()->exists()){
            return redirect()->route('category.index');
        }
        if($category->delete()){

            $ds=DIRECTORY_SEPARATOR;
            $originalPath = public_path().$ds.'uploads'.$ds.'categories'.$ds.$category->id.'.jpg';
            $thumbnailPath = public_path().$ds.'uploads'.$ds.'categories'.$ds.'thumbnails'.$ds.$category->id.'.jpg';

            file_exists($originalPath)? unlink($originalPath):'';
            file_exists($thumbnailPath)? unlink($thumbnailPath):'';

            }
        return redirect()->route('category.index');
    }
}
