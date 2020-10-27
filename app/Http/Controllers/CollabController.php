<?php

namespace App\Http\Controllers;

use App\Collab;
use App\Institution;
use Illuminate\Http\Request;

class CollabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Collab::all();
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

        $institution->collab()->save($collab);

        return response()->json($collab, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Collab $collab
     * @return \Illuminate\Http\Response
     */
    public function show(Collab $collab)
    {
        return $collab;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Collab $collab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $collab->update($request->all());

        return response()->json($collab, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Collab $collab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collab $collab)
    {
        $collab->delete();
        return response()->json(null, 204);
    }
}
