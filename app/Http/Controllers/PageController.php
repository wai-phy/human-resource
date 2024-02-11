<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $employee = auth()->user();
        return view('home',compact('employee'));
    }
}
