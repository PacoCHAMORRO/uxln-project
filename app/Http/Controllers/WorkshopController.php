<?php

namespace App\Http\Controllers;
use App\Workshop;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = Workshop::all();

        return view('admin.admin-workshop', compact('workshops'));
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
        $rules = [
            'title' => 'required',
        ];

        $data = $request->all();

        $this->validate($request, $rules);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->picture->store(''); 
        }

        $workshop = Workshop::create($data);
        
        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Agregado',
            'message' => 'Taller agregado con éxito.',
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
    public function update(Request $request, Workshop $workshop)
    {
        $data = $request->all();

        if ($request->hasFile('picture')) {
            Storage::delete($workshop->picture);
            $workshop->picture = $request->picture->store('');
            $workshop->save();
        }

        $title = $data['title'];
        $content = $data['content'];

        $updated = Workshop::find($workshop->id);
        $updated->title = $title ? $title : $updated->title;
        $updated->content = $content ? $content : $updated->content;

        $updated->save();

        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Guardado',
            'message' => 'Taller actualizado correctamente!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshop $workshop)
    {
        $workshop->delete();
        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Eliminado',
            'message' => 'El taller ha sido eliminado correctamente.'
        ]);
    }
}
