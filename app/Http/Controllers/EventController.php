<?php

namespace App\Http\Controllers;
use App\Event;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.admin-timeline', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $rules = [
            'title' => 'required',
            'date' => 'required',
        ];

        $data = $request->all();

        $this->validate($request, $rules);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->picture->store(''); 
        }

        $event = Event::create($data);
        
        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Agregado',
            'message' => 'Evento añadido con éxito a la línea de tiempo.',
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
     * Update the specified resource and field in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if ($request->hasFile('picture')) {
            Storage::delete($event->picture);
            $event->picture = $request->picture->store('');
            $event->save();
        }

        $req = $request->all();

        $title = $req['title'];
        $date = $req['date'];
        $description = $req['description'];

        $updated = Event::find($event->id);
        $updated->title = $title ? $title : $updated->title;
        $updated->date = $date ? $date : $updated->date;
        $updated->description = $description ? $description : $updated->description;

        $updated->save();

        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Guardado',
            'message' => 'Línea del tiempo actualizada',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Storage::delete($event->picture);
        $event->delete();
        
        return back()->with([
            'alert-type' => 'alert-danger',
            'badge-type' => 'badge-danger',
            'message-title' => 'Eliminado',
            'message' => 'Se ha eliminado el evento de la línea del tiempo.',
        ]);
    }
}
