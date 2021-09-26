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
        $param = [
            'item' => Work::where('date',Carbon::today())->first(),
            'rest' => Rest::where('date',Carbon::today())->first(),
            $user = Auth::user(),
        ];
        return view('tests.work-test1',$param);
        /* $user = Work::user();
        $items = Work::paginate(4);
        $param = ['items' =>$items,'user'=>$user];*/
    }
    public function rest(Request $request){
        $param = [
        ];
        return view('tests.work-test1',$param);
    }

    public function attendance(){
        return view('tests.attendance-test1');
    }

    //勤務開始
    public function start(Request $request){
        //createメソッド
        Work::create([
            'user_id' => 1,
            'date' => Carbon::today(),
            'start_time' => Carbon::now(),
        ]);
        return redirect('/');
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
        Work::where('user_id',$request->user_id)
        ->update(['end_time' => $end_times]);
        //return view('tests.work-test1',['end_time' => $end_times]);
        return view('tests.thanks');

    }
    //Thanksページ
    public function thanks()
    {
        return view('tests.thanks');
    }
    //休憩開始
    public function rest_start(Request $request)
    {
        //$this->validate($request,Rest::$rules);

        Rest::create([
            'user_id' => 1,
            'date' => Carbon::today(),
            'rest' => Carbon::now(),
        ]);
        return redirect('/');

    }
    //休憩終了
    public function rest_end(Request $request)
    {
        $this->validate($request,Rest::$rules);

        $rest_ends = Carbon::now();
        Rest::where('user_id',$request->user_id)
        ->update(['rest_end' => $rest_ends]);
        return view('tests.breaks_end');
    }
}