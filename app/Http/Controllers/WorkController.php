<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Worker;
use App\Models\Work;
use App\Models\Rest;
use Carbon\Carbon;

class WorkController extends Controller
{
    //Work model
    public function work(Request $request){
       /* $user = Work::user();
        $items = Work::paginate(4);
        $param = ['items' =>$items,'user'=>$user];*/
        $date = Carbon::now()->toDateString();
        Work::where('date')
        ->work(['date' => $date])->get();
    return view('tests.work-test1',[
        'date' => $date,
    ]/*$param*/);
    }
    public function attendance(){
        return view('tests.attendance-test1');
    }

    //勤務開始
    public function start(Request $request)
    {
        //createメソッド
        $timestamp = Work::create([
            'user_id' => 1,
            $start_times = Carbon::now(),
            //'date' => '',
            //$date = Carbon::today(),
        ]);
        return view('tests.work-test1',[
            'start_times' => $start_times,
            //'date' => $date,
        ]);
    }
    //勤務終了
    
    public function update(Request $request)
    {
        //エラー確認（1日一回の打刻）
        /*if(!empty($timestamp->update)){
            return view('test.work-test1');
        }*/

        //updateめそっど
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