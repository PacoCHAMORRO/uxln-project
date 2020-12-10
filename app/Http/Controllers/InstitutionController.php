<?php

namespace App\Http\Controllers;
use App\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $institutions = Institution::all(); 
        return $this->showAll($institutions); */

        /* return new InstitutionCollection(Institution::all()); */
        $institutions = Institution::all();
        return view('admin-institutions', compact('institutions'));
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
        
        return back();
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
            $institution->save();
        }

        /* dd($request->all()); */

        $req = $request->all();

        $name = $req['name'];
        $link = $req['link'];
        /* $logo = $req['logo']; */
        $description = $req['description'];

        $updated = Institution::find($institution->id);

        $updated->name = $name ? $name : $updated->name;
        $updated->link = $link ? $link : $updated->link;
        /* $updated->logo = $logo ? $logo : $updated->logo; */
        $updated->description = $description ? $description : $updated->description;

        /* dd($updated); */
        $updated->save();
        /* $institution->update($request->all()); */

        return back();
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
        
        return back();
    }
}
