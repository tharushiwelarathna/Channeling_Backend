<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Doctor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'specializationId' => 'required',
            'isPermanent' => 'required'

        ]);

        return Doctor::create($request->all());


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Doctor::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'fullName' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'specializationId' => 'required',
            'isPermanent' => 'required'

        ]);

            $doctor = Doctor::find($request->id);
            $doctor->update($request->all());
           return $doctor;



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Doctor::destroy($id);
    }

      /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name) {
        return Doctor::where('fullName', 'like', '%' .$name. '%')->get();
    }
}
