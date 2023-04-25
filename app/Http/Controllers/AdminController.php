<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function add_view() {
        return view('admin.add_doctor');
    }
    public function upload (Request $request) {
        $doctor = new Doctor();
        $image = $request->image;
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('doctorimages', $image_name);
        $doctor->image = $image_name;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Added Successfully');

    }
    public function show_appointments ( ) {
        $data = appointment::all();
        return view('admin.show_appointments', compact('data'));
    }
    public function search() {
        return view('admin.search');
    }
    public function search_result () {
        $data = appointment::all();
        $userName= $_POST['name'];
        $query = DB::table('appointments')->where('name', 'LIKE', $userName);
        //$query = "SELECT * FROM appointments WHERE name=$userName";
        $rows = $query->get();
        if(count($rows) > 0) {
            return view('admin.search_result', compact("rows"));
        }
        else{
            return redirect()->back()->with('message', 'Sorry There is no record with same name you have entered');
        }
        
    }
    public function approve ($id) {
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();
    }
    public function cancel ($id) {
        $data = Appointment::find($id);
        $data->status = 'Cancelled';
        $data->save();
        return redirect()->back();
    }
    public function show_doctors () {
        $data = Doctor::all();
        return view('admin.show_doctors', compact('data'));
    }

    public function update_doctor($id) {
        $data = doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }
    public function delete_doctor($id) {
        $data = doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function doctor_edit (Request $request, $id) {
        $data = doctor::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->speciality = $request->speciality;
        $data->room = $request->room;
        $image = $request->image;
        if(isset($image)) {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('doctorimages', $image_name);
            $data->image = $image_name;
        }
        $data->save();
        return redirect()->back()->with('message', 'Doctor Updated Successfully');
    }
}
