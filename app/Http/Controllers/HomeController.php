<?php

namespace App\Http\Controllers;

use App\Institution;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function ecosystem()
    {
        $institutions = Institution::all();
        return view('ecosystem', compact('institutions'));
    }

    public function template(Institution $institution)
    {
        return view('template', compact('institution'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function donation()
    {
        return view('donation');
    }

}
