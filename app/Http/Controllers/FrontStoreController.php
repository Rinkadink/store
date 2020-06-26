<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
class FrontStoreController extends Controller
{
    public function edit(){
        $store=\Auth::user()->store;
        return view('frontStore.edit',compact('store'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'description'=>'required',
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
        $store=\Auth::user()->store;
        $store->name=$request->name;
        $store->description=$request->description;
        $store->first_name=$request->first_name;
        $store->last_name=$request->last_name;
        $store->phone=$request->phone;
        $store->email=$request->email;
        $store->address=$request->address;
        $store->facebook_link=$request->facebook_link;
        $store->instagram_link=$request->instagram_link;
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

        return redirect()->route('front.profile');
    }
}
