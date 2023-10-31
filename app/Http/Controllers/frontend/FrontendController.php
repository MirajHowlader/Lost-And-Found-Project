<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\gallery;
use File;

class FrontendController extends Controller
{
   public function index(){
      //$post = Post::all();
      $post = Post::orderBy('id', 'DESC')->get();
      return view("frontend.index",compact('post'));
   }
   public function singlepost($id){
      $posts = Post::find($id);
      return view('frontend.single-post',compact('posts'));
   }
   public function about(){
      return view('frontend.about');
   }
   public function find(){
      return view('frontend.find');
   }
   
   public function userAddPostPage(){
      return view('frontend.userAddPostPage');
   }
   public function foundPostPage(){
      return view('frontend.foundPostPage');
   }
   public function lostPostPage(){
      return view('frontend.lostPostPage');
   }
   
   public function yourpost(){
      return view('frontend.yourpost');
   }
   public function yourpostpage(Request $request){
      $post = Post::where('email','=',$request->email)->get();
      return view('frontend.yourpostpage',compact('post'));
   }
   public function gallery(){
      $gallery = Gallery::orderBy('id', 'DESC')->get();
      return view('frontend.gallery', compact('gallery'));
   }
   public function notice(){
      // $gallery = Gallery::orderBy('id', 'DESC')->get();
      return view('frontend.notice');
   }

   public function userlogin(){
   return view('auth.userlogin');
   }

   public function userregister(){
      return view('auth.userregister');
   }
     
}
