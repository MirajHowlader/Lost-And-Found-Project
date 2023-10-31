<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use File;

class GalleryController extends Controller
{
    public function addPhotopage(){
        return view('backend.addphoto');
     }
    public function addPhoto(request $request){
         $gallery = new Gallery();
         $gallery->title = $request->title;
         $gallery->imagetype = $request->option;
         $imageName = "";
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/gallery/',$imageName);
        }
        $gallery->image = $imageName;
        $gallery->save();
        //return back();
        return redirect()->back()->with('message', 'Sir, Image added succesfully');
     }
}

