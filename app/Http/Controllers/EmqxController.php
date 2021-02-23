<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmqxController extends Controller
{
    public function index()
    {
        return view('emqx-test');
    }
}
