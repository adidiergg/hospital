<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pacientes.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
        //
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
            'curp' => 'required | unique:patients,curp',
            'name_first' => 'required',
            'name_last' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required | unique:patients,email',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success','Registro realizado correctamente');
        //
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('pacientes.show',compact('patient'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('pacientes.edit',compact('patient'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {

        $validator =  Validator::make($request->all(),[
            'curp' => [ 'required',Rule::unique('receptionists')->ignore($patient),],
            'name_first' => 'required',
            'name_last' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => [ 'required',Rule::unique('receptionists')->ignore($patient),],
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $patient->update($request->all());

        return back()->with('success','Se actualizo la información correctamente');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->state = "0";
        $patient->save();
        return redirect()->route('patients.index')->with('success','El registro se eliminó correctamente');
        //
    }
}
