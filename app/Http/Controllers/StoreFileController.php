<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StoreFile;

class StoreFileController extends Controller
{
    public function storeFile(Request $request){
        $request->validate([
            'file'=>'required|file|mimes:txt,pdf,doc,docx',
            'store_id'=>'required|exists:stores,id',
        ]);
        $fileUpload = $request->file;
        $extension = $request->file->getClientOriginalExtension();
        $filename = pathinfo($request->file->getClientOriginalName(),PATHINFO_FILENAME);
        $path = public_path().'/uploads/store_files/';


        $file=new StoreFile;
        $file->store_id=$request->store_id;
        $file->filename = $filename;
        $file->ext = $extension;
        $file->file_size = $fileUpload->getSize();
        $file->mime=$fileUpload->getMimeType();
        $file->save();
        $request->file->move($path,$file->id.'.'.$extension);
        return redirect()->route('store.edit',$file->store_id);
    }
    public function storeDownload(StoreFile $storeFile){
        $headers = array(
            'Content-Type: '.$storeFile->mime,
        );
        return \Response::download(public_path().'/uploads/store_files/'.$storeFile->id.'.'.$storeFile->ext,$storeFile->filename.'.'.$storeFile->ext,$headers);
    }
}
