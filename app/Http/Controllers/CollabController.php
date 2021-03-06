<?php

namespace App\Http\Controllers;

use App\Collab;
use App\Institution;
use Illuminate\Http\Request;

class CollabController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Institution $institution)
    {
        dd($institution);
       
        $collabs = $institution->collabs();

        return view('admin.admin-collabs', compact('institution', 'collabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collab = new Collab();
        $collab->institution_id = $request->institution_id;
        $collab->category = $request->category;
        $collab->title = $request->title;
        $collab->date = $request->date;
        $collab->save();

        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Añadido',
            'message' => 'La colaboración ha sido añadida a la base de datos.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collab $collab)
    {
        $req = $request->all();

        $title = $req['title'];
        $date = $req['date'];
        $category = $request['category'];
        $institution_id = $request['institution_id'];

        $updated = Collab::find($collab->id);

        $updated->title = $title ? $title : $updated->title;
        $updated->date = $date ? $date : $updated->date;
        $updated->category = $category ? $category : $updated->category;
        $updated->institution_id = $institution_id ? $institution_id : $updated->institution_id;
        /* dd($updated); */
        $updated->save();
        /* $institution->update($request->all()); */

        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Guardado',
            'message' => 'Colaboración actualizada correctamente',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collab $collab)
    {
        $collab->delete();

        return back()->with([
            'alert-type' => 'alert-danger',
            'badge-type' => 'badge-danger',
            'message-title' => 'Eliminado',
            'message' => 'Colaboración eliminada exitosamente',
        ]);
    }
}
