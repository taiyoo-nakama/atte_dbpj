<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    //
    public function work(){
        return view('tests.work-test1');
    }
    public function attendance(){
        return view('tests.attendance-test1');
    }
}