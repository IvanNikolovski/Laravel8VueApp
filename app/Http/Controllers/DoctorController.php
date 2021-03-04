<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\User;
use App\Traits\DoctorsTrait;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use DoctorsTrait;
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::latest()->get();
        return view('doctors.index', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user =auth()->id();

        return view ('doctors.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $this->storeDoctor($request);

        //the following block resolves 302 redirect problem
        if (request()->wantsJson()) {
            return response(["ok"], 200);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        // return view('doctors.show', ['doctor' => $doctor]);
        return view('doctors.show', ['doctor' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDoctorRequest $request, Doctor $doctor)
    {  
        $this->updateDoctor($request);

        //the following block resolves 302 redirect problem
        if (request()->wantsJson()) {
            return response(["ok"], 200);
        }

        return redirect('/doctor/edit/' . $request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $this->deleteDoctor($doctor->id);
        //  Doctor::findOrFail($doctor->id)->delete();

        if (request()->wantsJson()) {
            return response(["it's deleted"], 200);
        }

        // return redirect('/doctor/create');
       
    }

    /**
     * Validation Rules.
     * @return \Illuminate\Http\Response
     */
    public function validationRules()
    {
        request()->validate([
            "name" => 'required',
            "speciality" => 'required',
            "institution" => 'required'
        ]);
       
    }
}
