<?php

namespace App\Http\Controllers;

use App\User;
use App\Store;
use Illuminate\Http\Request;
use Image;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores=Store::with('owner')->paginate(10);
        return view('store.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::get();
        return view('store.create',compact('users'));
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
            'user'=>'required|exists:users,id|unique:stores,user_id',
            'name_sr'=>'required|min:3',
            'description_sr'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'first_name'=>'max:25',
            'last_name'=>'max:25',
            'phone'=>'required|max:25',
            'email'=>'required|email|max:50',
            'address'=>'required|max:192',
            'facebook_link'=>'max:192',
            'instagram_link'=>'max:192',
            'website'=>'max:192'

        ]);
        $store=new Store;
        $store->name_sr=$request->name_sr;
        $store->description_sr=$request->description_sr;
        $store->name_en=$request->name_en;
        $store->description_en=$request->description_en;
        $store->name_al=$request->name_al;
        $store->description_al=$request->description_al;
        $store->first_name=$request->first_name;
        $store->last_name=$request->last_name;
        $store->phone=$request->phone;
        $store->email=$request->email;
        $store->address=$request->address;
        $store->facebook_link=$request->facebook_link;
        $store->instagram_link=$request->instagram_link;
        $store->user_id=$request->user;
        $store->website=$request->website;
        $store->save();

        if ($files = $request->file('image')) {

            // for save original image
            $imageUpload = Image::make($files);
            $ds=DIRECTORY_SEPARATOR;
            $originalPath = public_path().$ds.'uploads'.$ds.'stores'.$ds.$store->id.'.png';
            $imageUpload->save($originalPath);
            $imageUpload->destroy();

            // for save thumnail image
            $imageUpload = Image::make($files);
            $thumbnailPath = public_path().$ds.'uploads'.$ds.'stores'.$ds.'thumbnails'.$ds.$store->id.'.png';
            $imageUpload->fit(510,400);
            $imageUpload->save($thumbnailPath);
            $imageUpload->destroy();
        }
        return redirect()->route('store.edit',$store->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('store.show',compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $users=User::get();
        return view('store.edit',compact('store', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'user'=>'required|exists:users,id|unique:stores,user_id,'.$store->id,
            'name_sr'=>'required|min:3',
            'description_sr'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'first_name'=>'max:25',
            'last_name'=>'max:25',
            'phone'=>'required|max:25',
            'email'=>'required|email|max:50',
            'address'=>'required|max:192',
            'facebook_link'=>'max:192',
            'instagram_link'=>'max:192',
            'website'=>'max:192'

        ]);

        $store->name_sr=$request->name_sr;
        $store->description_sr=$request->description_sr;
        $store->name_en=$request->name_en;
        $store->description_en=$request->description_en;
        $store->name_al=$request->name_al;
        $store->description_al=$request->description_al;
        $store->first_name=$request->first_name;
        $store->last_name=$request->last_name;
        $store->phone=$request->phone;
        $store->email=$request->email;
        $store->address=$request->address;
        $store->facebook_link=$request->facebook_link;
        $store->instagram_link=$request->instagram_link;
        $store->user_id=$request->user;
        $store->website=$request->website;

        $store->save();

        if ($files = $request->file('image')) {


            // for save original image
            $imageUpload = Image::make($files);
            $ds=DIRECTORY_SEPARATOR;
            $originalPath = public_path().$ds.'uploads'.$ds.'stores'.$ds.$store->id.'.png';
            $imageUpload->save($originalPath);
            $imageUpload->destroy();

            // for save thumnail image
            $imageUpload = Image::make($files);
            $thumbnailPath = public_path().$ds.'uploads'.$ds.'stores'.$ds.'thumbnails'.$ds.$store->id.'.png';
            $imageUpload->fit(510,400);
            $imageUpload->save($thumbnailPath);
            $imageUpload->destroy();
          }

        return redirect()->route('store.edit',$store->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->load('owner');
       $store->owner->loadCount('articles');
       if($store->owner->articles_count==0){
           $store->delete();
           return redirect()->route('store.index')->with('alert-success','Store '.$store->name.'is deleted successfully');
       }
       return redirect()->route('store.index')->with('alert-warning','Can\'t delete store with articles');

    }
}
