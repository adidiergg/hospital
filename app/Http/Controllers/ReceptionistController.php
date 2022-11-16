<?php

namespace App\Http\Controllers;

use App\Models\Receptionist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$receptionists = Receptionist::all();
        return view('recepcionistas.index');
        //return view('recepcionistas.index',['receptionists'=>$receptionists]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recepcionistas.create');
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
            'curp' => 'required | unique:receptionists,curp',
            'name_first' => 'required',
            'name_last' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required | unique:receptionists,email',
            'hire_date' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        /*
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        */

        Receptionist::create($request->all());

        return redirect()->route('receptionists.index')->with('success','Registro realizado correctamente');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function show(Receptionist $receptionist)
    {
        
        return view('recepcionistas.show',compact('receptionist'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function edit(Receptionist $receptionist)
    {
        
        return view('recepcionistas.edit',compact('receptionist'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receptionist $receptionist)
    {
        $validator =  Validator::make($request->all(),[
            'curp' => [ 'required',Rule::unique('receptionists')->ignore($receptionist),],
            'name_first' => 'required',
            'name_last' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => [ 'required',Rule::unique('receptionists')->ignore($receptionist),],
            'hire_date' => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $receptionist->update($request->all());

        return back()->with('success','Se actualizo la información correctamente');
        
        //
    }

    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */

    public function reset(Request $request, Receptionist $receptionist)
    {
        $validator =  Validator::make($request->all(),[
            'password' => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        

        $receptionist->password = bcrypt($request->password);
        $receptionist->save();

        return back()->with('success','Se actualizo la contraseña correctamente');
        
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receptionist $receptionist)
    {
        $receptionist->state = "0";
        $receptionist->save();
        return redirect()->route('receptionists.index')->with('success','El registro se eliminó correctamente');
        //
    }
}
