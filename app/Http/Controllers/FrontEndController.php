<?php

namespace App\Http\Controllers;


use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class FrontEndController extends Controller
{
    public $userModel,$image,$imageName,$directory,$imageUrl,$doctor,$appointment;
    public function index(){
        return view('frontEnd.home.home',[
            'doctors'=>Doctor::all()
        ]);
    }
    public function about(){
        return view('frontEnd.about.about');
    }
    public function doctors(){
        return view('frontEnd.doctors.doctors',[
            'doctors'=>Doctor::all()
        ]);
    }
    public function news(){
        return view('frontEnd.news.news');
    }
    public function contact(){
        return view('frontEnd.contact.contact');
    }
    //----user Login--
    public function userLogin(){
        return view('frontEnd.userLogin.user-login');
    }
    public function userLoginForm(Request $request){
        $this->user=UserModel::where('user_email',$request->user_Name)
            ->orwhere('user_phone',$request->user_Name)
            ->first();
        if ($this->user){
            $this->userExiting=$this->user->user_password;
            if (password_verify($request->password,$this->userExiting)){
                Session::put('userId',$this->user->id);
                Session::put('userName',$this->user->user_name);
                return  redirect('/');
            }else{
                return back()->with('message','Please Use Valid Password');
            }
        }else{
            return back()->with('message','Please Use Valid Email or Phone');
        }
    }
    public function userRegister(){
        return view('frontEnd.userRegister.user-register');
    }
    public function userRegisterForm(Request $request){
        $this->userModel=new userModel();
        $this->userModel->user_name=$request->user_name;
        $this->userModel->user_email=$request->user_email;
        $this->userModel->user_phone=$request->user_phone;
        $this->userModel->user_password=bcrypt($request->user_password);
        if ($request->file('user_image')){
            $this->userModel->user_image=$this->makeImage($request);
        }
        $this->userModel->user_Address=$request->user_Address;
        $this->userModel->save();
        return back()->with('message','User Registration Successfully');
    }
    private function makeImage($request){
        $this->image=$request->file('user_image');
        $this->imageName=rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory='adminAsset/user-image/';
        $this->imageUrl=$this->directory.$this->imageName;
        $this->image->move($this->directory,$this->imageName);
        return $this->imageUrl;
    }
    public function userLogout(){
        Session::forget('userId');
        Session::forget('userName');
        return redirect('/');
    }
    public function appointment(Request $request){
        $this->validate($request,[
            'app_name'=>'required',
            'app_email'=>'required',
            'app_date'=>'required',
            'app_number'=>'required'
        ]);
        if (Session::get('userId')){
            $this->appointment=new Appointment();
            $this->appointment->app_name=$request->app_name;
            $this->appointment->app_email=$request->app_email;
            $this->appointment->app_date=$request->app_date;
            $this->appointment->app_doctor=$request->app_doctor;
            $this->appointment->app_number=$request->app_number;
            $this->appointment->app_message=$request->app_message;
            $this->appointment->status='In Progress';
            if (Auth::id()){
                $this->appointment->user_id=Auth::user()->id;
            }
            $this->appointment->save();
            return redirect('/')->with('message','Appointment Add Successfully');
        }else{
            return redirect('user-login');
        }
    }
    public function myAppointment(){
        return view('frontEnd.appointment.appointment',[
            'appointments'=>Appointment::all()
        ]);
    }
    public function appointmentStatus($id){
        $this->appointment=Appointment::find($id);
        if ($this->appointment->status==1){
            $this->appointment->status=0;
            $this->appointment->save();
            return back();
        }else{
            $this->appointment->status=1;
            $this->appointment->save();
            return back();
        }
    }
    public function appointmentDelete(Request $request){
        $this->appointment=Appointment::find($request->appointment_id);
        $this->appointment->delete();
        return back();
    }

}

