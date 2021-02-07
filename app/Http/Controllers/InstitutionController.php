<?php

namespace App\Http\Controllers;
use App\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
/* use App\Http\Controllers\Controller; */

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        /* $institutions = Institution::all(); 
        return $this->showAll($institutions); */
        $institutions = Institution::all();
        return view('admin.admin-institutions', compact('institutions'));
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
            'logo' => 'image',
        ];

        $data = $request->all();

        $this->validate($request, $rules);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->logo->store(''); 
        }

        $institution = Institution::create($data);
        
        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Agregado',
            'message' => 'Recurso añadido con éxito',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        return view('admin.admin-collabs', compact('institution'));
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
            $institution->save();
        }

        $req = $request->all();

        $name = $req['name'];
        $link = $req['link'];
        $description = $req['description'];

        $updated = Institution::find($institution->id);
        $updated->name = $name ? $name : $updated->name;
        $updated->link = $link ? $link : $updated->link;
        $updated->description = $description ? $description : $updated->description;

        $updated->save();

        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Guardado',
            'message' => 'Institución actualizada',
        ]);
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
        
        return back()->with([
            'alert-type' => 'alert-danger',
            'badge-type' => 'badge-danger',
            'message-title' => 'Eliminado',
            'message' => 'Se ha eliminado la institución de la base de datos.',
        ]);
    }
}
