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
        $start_times = Carbon::now();
        //$end_times = Carbon::now();

        Work::create([
            'user_id' => 1,
            'start_time' => $start_times,
            //'end_time' => $end_times
        ]);
        return view('tests.work-test1');
    }
    public function end()
    {
        $end_times = Carbon::now();
        return view('tests.work-test1');
    }
    public function update()
    {
        $end_times = Carbon::now();
        Work::update($end_times);
        return view('tests.work-test1');
    }
}