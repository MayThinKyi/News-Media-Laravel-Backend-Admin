<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    //Admin List Page
    public function index(){
        $users=User::orderBy('created_at','desc')->get();
        return view('admin.list.index',compact('users'));
    }
    //deleteAdmin
    public function deleteAdmin($id){
       User::where('id',$id)->delete();
       return back()->with(['deleteSuccess'=>'Account Deleted!']);
    }
    //searchAdminList
    public function searchAdminList(){

     if(request('searchKey')){
        $users=User::orwhere('name','like','%'.request('searchKey').'%')
                    ->orwhere('email','like','%'.request('searchKey').'%')
                     ->orwhere('phone','like','%'.request('searchKey').'%')
                      ->orwhere('address','like','%'.request('searchKey').'%')
                       ->orwhere('gender','like','%'.request('searchKey').'%')
                    ->orderBy('created_at','desc')->get();
     }else{
        $users=User::orderBy('created_at','desc')->get();
     }
      return view('admin.list.index',compact('users'));
    }

}
