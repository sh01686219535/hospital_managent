<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public function user(){
        return view('admin.user.user',[
            'users'=>userModel::all()
        ]);
    }
    public function userEdit($id){
        return view('admin.user.edit-user',[
            'user'=>UserModel::find($id)
        ]);
    }
    public function userUpdate(Request $request){
        $this->userModel=UserModel::find($request->user_id);
        $this->userModel->user_name=$request->user_name;
        $this->userModel->user_email=$request->user_email;
        $this->userModel->user_phone=$request->user_phone;
        $this->userModel->user_password=bcrypt($request->user_password);
        if ($request->file('user_image')){
            $this->userModel->user_image=$this->makeImage($request);
        }
        $this->userModel->user_Address=$request->user_Address;
        $this->userModel->save();
        return redirect('/user');
    }
    public function userDelete(Request $request){
        $this->userModel=UserModel::find($request->user_id);
        if ($this->userModel->user_image){
            unlink($this->userModel->user_image);
        }
        $this->userModel->delete();
        return back();
    }
}
