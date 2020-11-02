<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Institution;
use Illuminate\Support\Facades\Storage;

class InstitutionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institution::all(); 
        return $this->showAll($institutions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'logo' => 'required|image',
            'link' => 'required',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $data['logo'] = $request->logo->store('');

        $institution = Institution::create($data);

        return $this->showOne($institution, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        return $this->showOne($institution);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Institution $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institution $institution)
    {
        if ($request->hasFile('logo')) {
            Storage::delete($institution->logo);
            $institution->logo = $request->logo->store('');
        }
        $institution->update($request->all());

        return $this->showOne($institution);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  Institution $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        Storage::delete($institution->logo);
        $institution->delete();
        return $this->showOne($institution, 204);
    }
}
