<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //Post Page
    public function index(){
        $posts=Post::orderBy('created_at','desc')->get();
        $categories=Category::get();
        return view('admin.post.index',compact('posts','categories'));
    }
    //searchPost
    public function searchPost(){
       if(request('searchKey')){
        $posts=Post::orWhere('title','like','%'.request('searchKey').'%')
                    ->orWhere('description','like','%'.request('searchKey').'%')
                    ->orderBy('created_at','desc')->get();
       }else{
        $posts=Post::orderBy('created_at','desc')->get();
       }
       $categories=Category::get();
      return view('admin.post.index',compact('posts','categories'));
    }
    //createPost
    public function createPost(Request $request){
        $this->checkPostValidation($request);
      $postData=$this->getPostData($request);
     if($request->hasFile('postImage')){
        $fileName=uniqid().$request->file('postImage')->getClientOriginalName();
        $request->file('postImage')->storeAs('public',$fileName);
        $postData['image']=$fileName;
     }
     Post::create($postData);
     return redirect()->route('admin#post');
    }
    //Delete Post
    public function deletePost($id){
      $oldFileName=Post::where('id',$id)->first()['image'];
       if($oldFileName!=null){
         Storage::delete('public/'.$oldFileName);
       }
        Post::where('id',$id)->delete();
        return redirect()->route('admin#post')->with(['deleteSuccess'=>'Post Deleted!']);
    }
    //editPostPage
    public function editPostPage($id){
        $posts=Post::orderBy('created_at','desc')->get();
       $post=Post::where('id',$id)->first();
       $categories=Category::get();
       return view('admin.post.editPostPage',compact('post','posts','categories'));
    }
    //Update Post
    public function updatePost($id,Request $request){
      $this->checkPostValidation($request);
      $postUpdatedData=$this->getPostData($request);
   if($request->hasFile('postImage')){
    $oldFileName=Post::where('id',$id)->first()->image;
    $newFileName=uniqid().$request->file('postImage')->getClientOriginalName();
    $postUpdatedData['image']=$newFileName;
    $request->file('postImage')->storeAs('public',$newFileName);
    if($oldFileName!=null){
        Storage::delete('public/'.$oldFileName);
    }
  
   
}
  Post::where('id',$id)->update($postUpdatedData);
    return redirect()->route('admin#post')->with(['updateSuccess'=>'Post Updated!']);
    }
    //getPostData

    private function getPostData($request){
        return[
            'title'=>$request->postName,
            'description'=>$request->postDescription,
            'category'=>$request->postCategory
        ];
    }

    //checkPostValidation
    private function checkPostValidation($request){
        Validator::make($request->all(),[
            'postName'=>'required',
            'postDescription'=>'required',

            'postCategory'=>'required'
        ])->validate();
    }
}
