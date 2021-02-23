<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmqxApiController extends Controller
{
    public function index()
    {
        return view("emqxApi");
    }
}
