<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use File;
use Mail;
use App\Mail\ConfirmMail;



class BackendController extends Controller
{
   public function dashboard(){
      $post = Post::all();
      return view('backend.index',compact('post'));
   }
 
   public function addPostpage(){
      return view('backend.addpost');
   }

   public function adminpost(Request $request){
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
      $post->phone = 01700000000;
      $post->email = "lostandfound.friendsclub@gmail.com";
      
      $post->request = 0;
      $post->category = $request->Category;
      $post->status = 1;
      $post->save();
      //return back();
      return redirect()->back()->with('message', 'Sir, Your post has been added successfully');
   }


   public function manageallpost(){
      //$post = Post::all();
      $post = Post::orderBy('id', 'DESC')->get();
      return view('backend.manageallpost',compact('post'));
   }

   public function allRequest(){
      //$post = Post::all();
      $post = Post::orderBy('id', 'DESC')->get();
      return view('backend.allRequest',compact('post'));
   }
    
   public function details($id){
      $posts = Post::find($id);
      return view('backend.details',compact('posts'));
   }
   public function edit($id){
      $posts = Post::find($id);
      return view('backend.edit',compact('posts'));
   }


   public function update(Request $request, $id){
      $posts = Post::find($id);

      $posts->name = $request->name;
      $posts->fname = $request->f_name;
      $posts->mname = $request->m_name;

      $imageName = "";
      $deleteOldImage = 'images/posts/'.$posts->image;

      if($image = $request->file('image')){

         if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
         }

            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/posts/',$imageName);
            $posts->image = $imageName;

      }else{
            $imageName = $posts->image;
      }
      $posts->update();
      return view('backend.details',compact('posts'));
   }


   
   public function delete($id){
      $posts = Post::find($id);

      $deleteOldImage = 'images/posts/'.$posts->image;
      if(file_exists($deleteOldImage)){
          File::delete($deleteOldImage);
      }
      $posts->delete();
      return back();
  }



  public function approve(Request $request, $id){
      $posts = Post::find($id);
      
      $posts->request = 0;
      $posts->status = 1;
      $posts->update();
      return back();
   }


  public function atoin(Request $request, $id){
      $posts = Post::find($id);
      $posts->status = 0;
      $posts->update();
      return back();
   }
   public function intoa(Request $request, $id){
      $posts = Post::find($id);
      $posts->status = 1;
      $posts->update();
      return back();
   }

}

