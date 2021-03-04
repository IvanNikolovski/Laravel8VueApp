<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::where('is_active', '=', 1)->get();
        
        return view('appointments.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateAttributes();
        $has_occured = 0;
        if ($request->has_occured=="on") {
            $has_occured=1;
        }
        Appointment::create([
            "doctor_id" => $request->doctor_id,
            "patient_name" => $request->patient_name,
            "has_occured" => $has_occured,
            "time_from" => $request->time_from,
            "time_to" => $request->time_to
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $doctors= Doctor::where('is_active', '=', 1)->get();
        
        return view('appointments.edit', ['appointment'=>$appointment, 'doctors'=>$doctors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        // dd($this->validateAttributes());

        $has_occured = 0;
        if ($request->has_occured=="on") {
            $has_occured=1;
        }

        $appointment=Appointment::findOrFail($appointment->id);
     
        $appointment->doctor_id = $request->doctor_id;
        $appointment->patient_name = $request->patient_name;
        $appointment->has_occured = $has_occured;
        $appointment->time_from = $request->time_from;
        $appointment->time_to = $request->time_to;

        $appointment->save();
        return redirect('appointments/edit/' . $appointment->id);
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

     /**
     * Validation.
     *
     * @return \Illuminate\Http\Response
     */
    public function validateAttributes()
    {
        request()->validate([
            "doctor_id" => 'required',
            "patient_name" => 'required',
            "time_from" => 'required',
            "time_to" => 'required'
        ]);
    }
}
