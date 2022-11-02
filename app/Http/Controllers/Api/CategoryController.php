<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //getCategoryData
    public function getCategoryData(){
        $categories=Category::get();
        return response()->json([
            'categories'=>$categories
        ]);
    }
    //searchCategorData
    public function searchCategorData(Request $request){
        if($request->searchKey=='' ||null){
            $categoryData=Post::get();
        }else{
            $categoryData=Post::select('posts.*','categories.title as category_title')
                            ->leftJoin('categories','posts.category','categories.id')
                            ->where('categories.title','like','%'.$request->searchKey.'%')
                            ->get();
        }
        return response()->json([
             'data'=>$categoryData
         ]);
    }
}
