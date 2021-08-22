<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Work;
use Carbon\Carbon;

class WorkController extends Controller
{
    //Work model
    public function work(){
        return view('tests.work-test1');
    }
    public function attendance(){
        return view('tests.attendance-test1');
    }

    //データベースにデータを記載
    public function start()
    {
        $times = Carbon::now();

        Work::create([
            'user_id' => 1,
            'start_time' => $times


        ]);
        return view('tests.work-test1');
    }
}