<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Institution;  

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Institution::all(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $institution = Institution::create($request->all());

        return response()->json($institution, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        return $institution;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institution $institution)
    {
        $institution->update($request->all());

        return response()->json($institution, 200);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(institution $institution)
    {
        $institution->delete();

        return response()->json(null, 204);
    }
}
