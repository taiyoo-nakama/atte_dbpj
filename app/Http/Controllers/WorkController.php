<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Work;
use App\Models\Rest;
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
    //勤務開始
    public function start()
    {
        $start_times = Carbon::now();
        //$end_times = Carbon::now();

        Work::create([
            'user_id' => 1,
            'start_time' => $start_times,
            //'end_time' => $end_times
        ]);
        return view('tests.work-test1',['start_time' => $start_times]);
    }
    //勤務終了
    /*public function end()
    {
        $end_times = Carbon::now();
        return view('tests.work-test1');
    }*/
    public function update(Request $request)
    {
        $end_times = Carbon::now();
        Work::where('user_id',$request->user_id)->update(['end_time' => $end_times]);
        return view('tests.work-test1',['end_time' => $end_times]);
    }
    //休憩開始
    public function rest_start(Request $request)
    {
        $this->validate($request,Rest::$rules);

        $rest_starts = Carbon::now();
        Rest::create([
            'user_id' => 1,
            'rest_start' => $rest_starts
        ]);
        return view('tests.work-test1',['rest_start' => $rest_starts]);
    }
    //休憩終了
    public function rest_end(Request $request)
    {
        $this->validate($request,Rest::$rules);

        $rest_ends = Carbon::now();
        Rest::where('user_id',$request->user_id)
        ->update(['rest_end' => $rest_ends]);
        return view('tests.work-test1',['rest_end' => $rest_ends]);
    }
}