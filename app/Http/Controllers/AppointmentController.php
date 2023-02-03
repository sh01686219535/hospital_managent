<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public $appointment;
    public function appointment(){
        return view('admin.appointment.appointment',[
            'appointments'=>Appointment::all()
        ]);
    }
    public function appointmentApprove($id){
        $this->appointment=Appointment::find($id);
        $this->appointment->status='Approve';
        $this->appointment->save();
        return back();
    }
    public function appointmentCancel($id){
        $this->appointment=Appointment::find($id);
        $this->appointment->status='Cancel';
        $this->appointment->save();
        return back();
    }
}
