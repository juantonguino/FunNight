<?php

namespace App\Http\Controllers;
use App\pais;

use Illuminate\Http\Request;

class paisController extends Controller
{
    //
    public function index()
    {
        $paiseslist = pais::all();
        $selected = array();
        return  compact('paiseslist', 'selected');
    }

  
}
