<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index () {
        if (Auth::id()) {
            return redirect('home');
        }
        else
        {
            $doctor = doctor::all();
            return view('user.home', compact('doctor'));
        }
        
    }
    public function redirect () {
        if (Auth::id()) {
            if (Auth::user()->usertype == 0) {
                $doctor = doctor::all();
                return view('user.home', compact('doctor'));
            }
            else {
                return view('admin.home');
            }
        }
        else {
            return redirect()->back();
        }
    }

    public function find_doctor() {
        $data = Doctor::all();
        $result = DB::table('doctors')->select('speciality')->distinct()->get();//Doctor::all('speciality');
        return view('user.find_doctor', compact('data', 'result'));
    }
    public function doctor_speciality($speciality) {
        $info = Doctor::where('speciality', $speciality)->get();
        //"SELECT * FROM doctors WHERE(speciality, '=', $speciality)";
        $result = DB::table('doctors')->select('speciality')->distinct()->get();
        return view('user.doctor_speciality', compact('info', 'result'));
    }
    public function doctor_details($id) {
        $data = DB::table('doctors')->where('id', $id)->get();
        return view('user.doctor_details', compact('data'));
    }
    public function appointment (Request $request) {
        $data = new appointment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->number;
        $data->doctor = $request->doctor;
        $data->date = $request->date;
        $data->message = $request->message;
        $data->status = 'In Progress';
        
        if(Auth::id()) {
            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message', 'Appointment Added Successfully. We will contact you soon');

    }
    public function myappointments () {
        if(Auth::id()) {
            $user_id = Auth::user()->id;
            $data = Appointment::where('user_id', $user_id)->get();
            return view('user.my_appointments', compact('data'));
        }
        else
        {
            return redirect()->back();
        }
        
    }
    public function cancel_appointment ($id) {
        $data = appointment::find($id)->delete();
        return redirect()->back();
    }
}
