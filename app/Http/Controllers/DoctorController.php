<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public $image,$imageName,$directory,$imageUrl,$doctor;
    //---Doctor-----

    public function doctor(){
        return view('admin.doctor.doctor');
    }
    public function doctorAdd(Request $request){
        $this->validate($request,[
            'doctor_name'=>'required',
            'doctor_phone'=>'required',
            'doctor_speciality'=>'required',
            'doctor_room'=>'required'
        ]);

        $this->doctor=new Doctor();
        $this->doctor->doctor_name=$request->doctor_name;
        $this->doctor->doctor_phone=$request->doctor_phone;
        $this->doctor->doctor_speciality=$request->doctor_speciality;
        $this->doctor->doctor_room=$request->doctor_room;
        if ($request->file('doctor_image')){
            $this->doctor->doctor_image=$this->saveImage($request);
        }
        $this->doctor->save();
        return back()->with('message','Doctor Add Successfully');
    }
    private function saveImage($request){
        $this->image=$request->file('doctor_image');
        $this->imageName=rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory='adminAsset/doctor-image/';
        $this->imageUrl=$this->directory.$this->imageName;
        $this->image->move($this->directory,$this->imageName);
        return $this->imageUrl;
    }
    public function manageDoctor(){
        return view('admin.doctor.manage-doctor',[
            'doctors'=>Doctor::all()
        ]);
    }
    public function doctorStatus($id){
        $this->doctor=Doctor::find($id);
        if ($this->doctor->status==1){
            $this->doctor->status=0;
            $this->doctor->save();
            return back();
        }else{
            $this->doctor->status=1;
            $this->doctor->save();
            return back();
        }
    }
    public function doctorEdit($id){
        return view('admin.doctor.edit-doctor',[
            'doctor'=>Doctor::find($id)
        ]);
    }
    public function doctorDelete(Request $request){
        $this->doctor=Doctor::find($request->doctor_id);
        if ($this->doctor->doctor_image){
            unlink($this->doctor->doctor_image);
        }
        $this->doctor->delete();
        return back();
    }
    public function doctorUpdate(Request $request){
        $this->doctor=Doctor::find($request->doctor_id);
        $this->doctor->doctor_name=$request->doctor_name;
        $this->doctor->doctor_phone=$request->doctor_phone;
        $this->doctor->doctor_speciality=$request->doctor_speciality;
        $this->doctor->doctor_room=$request->doctor_room;
        if ($request->file('doctor_image')){
            $this->doctor->doctor_image=$this->saveImage($request);
        }
        $this->doctor->save();
        return redirect('manage-doctor');
    }
}
