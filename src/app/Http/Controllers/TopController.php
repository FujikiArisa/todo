<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    function top()
    {
        return view ('pages/top');
    }
}