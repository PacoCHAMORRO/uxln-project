<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Institution;

class InstitutionAPIController extends ApiController
{
    public function index()
    {
        $institutions = Institution::all(); 
        return $this->showAll($institutions);
    }
}
