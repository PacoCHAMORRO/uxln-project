<?php

namespace App\Http\Controllers;

use App\Collab;
use App\Institution;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CollabController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Institution $institution)
    {
        $collabs = $institution->collabs;

        return $this->showAll($collabs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Institution $institution)
    {
        $collab = new Collab($request->all());
        /* Collab::create($request->all()); */

        $institution->collabs()->save($collab);

        return response()->json($collab, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Collab $collab
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution, Collab $collab)
    {
        return $this->showOne($collab);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Collab $collab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institution $institution, Collab $collab)
    {
        $collab->update($request->all());
        return $this->showOne($collab);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Collab $collab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution, Collab $collab)
    {
        $collab->delete();
        return response()->json(null, 204); 
    }
}
