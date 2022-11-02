<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //Profile Page
    public function index(){
        $user=User::select('name','email','phone','address','gender')->where('id',Auth::user()->id)->first();
        return view('admin.profile.index',compact('user'));
    }
    //Admi Update Account
    public function updateAccount(Request $request){
      $this->checkUpdateValidation($request);
      $userUpdateData=$this->getUpdateData($request);
    User::where('id',Auth::user()->id)->update($userUpdateData);
    return back()->with(['updateSuccess'=>'Account Updated!']);

    }
    //Admin changePasswordPage
    public function changePasswordPage(){
        return view('admin.profile.changePassword');
    }
    //Admin Update Password
    public function changePassword(Request $request){
       $this->checkUpdatePasswordValidation($request);
      $userOldPassword=$request->adminOldPassword;
      $dbOldPassword=User::select('password')->where('id',Auth::user()->id)->first()['password'];
    if(Hash::check($userOldPassword, $dbOldPassword)){
       $newPassword=Hash::make($request->adminConfirmPassword);
       User::where('id',Auth::user()->id)->update(['password'=>$newPassword]);
       return redirect()->route('dashboard')->with(['updateSuccess'=>'Password Updated!']);
    }else{
       return back()->with(['updateFailed'=>'Your Old Password is not credential!']);
    }
    }
    //checkUpdatePasswordValidation
    private function checkUpdatePasswordValidation($request){
        Validator::make($request->all(),[
            'adminOldPassword'=>'required',
            'adminNewPassword'=>'required|min:6',
            'adminConfirmPassword'=>'required|min:6|same:adminNewPassword'
        ])->validate();
    }
    //checkUpdateValidation
    private function checkUpdateValidation($request){
        Validator::make($request->all(),[
            'adminName'=>'required',
            'adminEmail'=>'required',
            'adminPhone'=>'required',
            'adminAddress'=>'required',
            'adminGender'=>'required',
        ])->validate();
    }
    //getUpdateData
    private function getUpdateData($request){
        return [
            'name'=>$request->adminName,
            'email'=>$request->adminEmail,
            'phone'=>$request->adminPhone,
            'address'=>$request->adminAddress,
            'gender'=>$request->adminGender,
        ];
    }
}
