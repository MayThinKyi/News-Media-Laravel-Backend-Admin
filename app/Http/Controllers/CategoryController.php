<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //Category Page
    public function index(){
        $categories=Category::orderBy('created_at','desc')->get();
        return view('admin.category.index',compact('categories'));
    }
    //createCategory
    public function createCategory(Request $request){
       $this->checkCategoryValidation($request);
       $categoryData=$this->getCategoryData($request);
       Category::create($categoryData);
       return redirect()->route('admin#category');
    }
    //deleteCategory
    public function deleteCategory($id){
       Category::where('id',$id)->delete();
       $categories=Category::orderBy('created_at','desc')->get();
       return view('admin.category.index',compact('categories'))->with(['deleteSuccess'=>'Category Deleted!']);
    }
    //searchCategory
    public function searchCategory(){
if(request('searchKey')){
    $categories=Category::orWhere('title','like','%'.request('searchKey').'%')
                        ->orWhere('description','like','%'.request('searchKey').'%')
                        ->orderBy('created_at','desc')->get();
}else{
    $categories=Category::orderBy('created_at','desc')->get();
}
       return view('admin.category.index',compact('categories'));
    }
    //editCategoryPage
    public function editCategoryPage($id){
     $category=Category::where('id',$id)->first();
     $categories=Category::orderBy('created_at','desc')->get();
     return view('admin.category.editCategoryPage',compact('category','categories'));
    }
    //updateCategory
    public function updateCategory($id,Request $request){
       $this->checkCategoryValidation($request);
       $categoryUpdatedData=$this->getCategoryData($request);
       Category::where('id',$id)->update($categoryUpdatedData);
       return redirect()->route('admin#category');
    }
    //checkCategoryValidation
    private  function checkCategoryValidation($request){
        Validator::make($request->all(),[
            'categoryName'=>'required',
            'categoryDescription'=>'required'
        ])->validate();
    }
    //getCategoryData
    private function getCategoryData($request){
        return [
            'title'=>$request->categoryName,
            'description'=>$request->categoryDescription
        ];
    }
}
