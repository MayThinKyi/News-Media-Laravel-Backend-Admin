<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //getPostData
    public function getPostData(){
        $posts=Post::get();
        return response()->json([
            'status'=>'ok',
            'posts'=>$posts

        ]);
    }
    //searchPostData
    public function searchPostData(Request $request){
        if($request->searchKey=='' || null){
            $posts=Post::get();
        }
      else{
         $posts=Post::where('title','like','%'.$request->searchKey.'%')->get();
      }
       return response()->json([
        'searchData'=>$posts
       ]);
    }
    //getPost Data
    public function getPost(Request $request){
        $post=Post::where('id',$request->id)->first();
        return response()->json([
            'post'=>$post
        ]);
    }
}
