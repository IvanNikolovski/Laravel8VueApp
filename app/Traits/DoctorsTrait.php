<?php

namespace App\Traits;
use App\Http\Requests\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

trait DoctorsTrait{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */

    public function storeDoctor(Request $request)
    {
        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->user_id = $request->user_id;
        $doctor->speciality = $request->speciality;
        $doctor->is_active = $request->is_active ? 1 : 0;
        $doctor->institution = $request->institution;

        $doctor->save();
    } 

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    
    public function updateDoctor(Request $request)
    {
        $doctor = Doctor::findOrFail($request->id);
        $doctor->name = $request->name;
        $doctor->speciality = $request->speciality;
        $doctor->institution = $request->institution;
        $doctor->is_active = $request->is_active ? 1 : 0;

        $doctor->save();
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    
    public function deleteDoctor($doctorId)
    {
        Doctor::findOrFail($doctorId)->delete();
    }
}
