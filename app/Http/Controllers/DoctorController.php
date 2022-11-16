<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('doctores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(),[
            'curp' => 'required | unique:doctors,curp',
            'name_first' => 'required',
            'name_last' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required | unique:doctors,email',
            'hire_date' => 'required',
            'password' => 'required',
            'license' => 'required',
            'speciality' => 'required',

        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        Doctor::create($request->all());

        return redirect()->route('doctors.index')->with('success','Registro realizado correctamente');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {

        return view('doctores.show', compact('doctor'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('doctores.edit', compact('doctor'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
        $validator =  Validator::make($request->all(),[
            'curp' => [ 'required',Rule::unique('doctors')->ignore($doctor),],
            'name_first' => 'required',
            'name_last' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => [ 'required',Rule::unique('doctors')->ignore($doctor),],
            'hire_date' => 'required',
            'license' => 'required',
            'speciality' => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $doctor->update($request->all());

        return back()->with('success','Se actualizo la información correctamente');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */

    public function reset(Request $request, Doctor $doctor)
    {
        $validator =  Validator::make($request->all(),[
            'password' => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        
        $doctor->password = bcrypt($request->password);
        $doctor->save();
        //$doctor->update($request->all());
        return back()->with('success','Se actualizo la contraseña correctamente');
        
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->state = "0";
        $doctor->save();
        return redirect()->route('doctors.index')->with('success','El registro se eliminó correctamente');
        //
    }
}
