<?php

namespace App\Http\Controllers;

use App\StoreCarousel;
use App\Store;
use Image;
use Illuminate\Http\Request;

class StoreCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $store_id=$request->store_id;
        $store_carousels=StoreCarousel::where('store_id',$store_id)->get();
        return view('store_carousel.index', compact('store_carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $store_id=$request->store_id;
        return view('store_carousel.create', compact('store_id'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'store_id'=>'required|exists:stores,id'

        ]);
        $store_carousel=new StoreCarousel;
        $store_carousel->store_id=$request->store_id;
        $store_carousel->title=$request->title;
        $store_carousel->content=$request->content;
        $store_carousel->save();

        if ($files = $request->file('image')) {

            // for save original image
            $imageUpload = Image::make($files);
            $ds=DIRECTORY_SEPARATOR;
            $originalPath = public_path().$ds.'uploads'.$ds.'store_carousels'.$ds.$store_carousel->id.'.jpg';
            $imageUpload->save($originalPath);

          }
        return redirect()->route('store_carousel.index', ['store_id'=>$store_carousel->store_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StoreCarousel  $storeCarousel
     * @return \Illuminate\Http\Response
     */
    public function show(StoreCarousel $storeCarousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StoreCarousel  $storeCarousel
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreCarousel $storeCarousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StoreCarousel  $storeCarousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreCarousel $storeCarousel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StoreCarousel  $storeCarousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreCarousel $storeCarousel)
    {
        if($storeCarousel->delete())
            {
                $ds=DIRECTORY_SEPARATOR;
                $originalPath = public_path().$ds.'uploads'.$ds.'store_carousels'.$ds.$storeCarousel->id.'.jpg';

                file_exists($originalPath)?unlink($originalPath):'';

            }

        return redirect()->route('store_carousel.index',['store_id'=>$storeCarousel->store_id]);
    }
}
