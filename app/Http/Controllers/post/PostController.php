<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use File;
class PostController extends Controller
{
// user submit post method
   public function userpostsubmit(Request $request){
        // dd($request->all());
        $post = new Post();

        $post->name = $request->name;
        $post->age = $request->age;
        $post->gender = $request->gender;
        $post->fname = $request->f_name;
        $post->mname = $request->m_name;
        $post->paddress = $request->main_address;
        $post->lfarea = $request->lost_area;
        $post->lfdate = $request->date;

        $imageName = "";
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/posts/',$imageName);
        }
        $post->image = $imageName;

        $post->description = $request->extra_text;
        $post->nametwo = $request->name2;
        $post->phone = $request->phone;
        $post->email = $request->email;
        
        $post->request = 1;
        $post->category = $request->Category;
        $post->status = 0;
        $post->save();
        return redirect('/userAddPostPage')->with('message', 'Your post has sent for approval ');
    }
}
  
            