<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Carbon\CarbonInterval;
use App\Models\ClockIn;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $dates = CarbonPeriod::create('now', CarbonInterval::days(-1), 7);
        /*
        $user = Auth::user();

        $dates = CarbonPeriod::create(Carbon::now()->subDays(6),CarbonInterval::days(1), 7);

        $data_array  = [];

        foreach($dates as $date)
        {
            $logs = ClockIn::getLogs($user->email,$date->format('Y-m-d'));
            
            // array_push($data_array,[
            //     'date' => $date->format('Y-m-d'),
            //     'time_in' => ($logs!=null) ? $logs['time_in'] : '',
            //     'time_out' => ($logs!=null) ? $logs['time_out'] : '',
            //     'overtime_in' => ($logs!=null) ? $logs['overtime_in'] : '',
            //     'overtime_out' => ($logs!=null) ? $logs['overtime_out'] : '',
            // ]);

            $data_array[$date->format('Y-m-d')] = array(
                'date' => $date->format('Y-m-d'),
                'time_in' => ($logs!=null) ? $logs['time_in'] : '',
                'time_out' => ($logs!=null) ? $logs['time_out'] : '',
                'overtime_in' => ($logs!=null) ? $logs['overtime_in'] : '',
                'overtime_out' => ($logs!=null) ? $logs['overtime_out'] : '',
            );
        }

        return view('home',['dates' => $dates,'data_array' => $data_array]);
        */
        return view('home');
    }

    public function clockin(Request $request)
    {
        $user = Auth::user();
        $data = explode("|",$request->data);

        $result = ClockIn::updateOrCreate([
            'biometric_id' => $user->email,
            'punch_date' => $data[0]
        ],
        [
            $data[1] => now()->format('H:i'),
            'actual_'.$data[1] => now()
        ]);
        
    }

    function loadTable(Request $request){
        $user = Auth::user();

        $dates = CarbonPeriod::create(Carbon::now()->subDays(6),CarbonInterval::days(1), 7);
        $dates_r = CarbonPeriod::create('now', CarbonInterval::days(-1), 7);

        $data_array  = [];

        $prev = null;

        foreach($dates as $date)
        {
            $logs = ClockIn::getLogs($user->email,$date->format('Y-m-d'));
            
            // array_push($data_array,[
            //     'date' => $date->format('Y-m-d'),
            //     'time_in' => ($logs!=null) ? $logs['time_in'] : '',
            //     'time_out' => ($logs!=null) ? $logs['time_out'] : '',
            //     'overtime_in' => ($logs!=null) ? $logs['overtime_in'] : '',
            //     'overtime_out' => ($logs!=null) ? $logs['overtime_out'] : '',
            // ]);

            $data_array[$date->format('Y-m-d')] = array(
                'date' => $date->format('Y-m-d'),
                'time_in' => ($logs!=null) ? $logs['time_in'] : '',
                'time_out' => ($logs!=null) ? $logs['time_out'] : '',
                'overtime_in' => ($logs!=null) ? $logs['overtime_in'] : '',
                'overtime_out' => ($logs!=null) ? $logs['overtime_out'] : '',
                'diff' => $date->diffInDays(now()),
                'yesterday' => $prev,
                'nextDay' => ClockIn::getLogs($user->email,$date->addDay()->format('Y-m-d'))
            );
            $prev = $logs;
        }

        return view('homes',['dates' => $dates,'data_array' => $data_array,'show' => $request->show,'dates_r' => $dates_r]);
    }

    // public function redirectToSuccess()
    // {
    //     $user = Auth::user();

    //     $dates = CarbonPeriod::create(Carbon::now()->subDays(6),CarbonInterval::days(1), 7);

    //     $data_array  = [];

    //     foreach($dates as $date)
    //     {
    //         $logs = ClockIn::getLogs($user->email,$date->format('Y-m-d'));

    //         $data_array[$date->format('Y-m-d')] = array(
    //             'date' => $date->format('Y-m-d'),
    //             'time_in' => ($logs!=null) ? $logs['time_in'] : '',
    //             'time_out' => ($logs!=null) ? $logs['time_out'] : '',
    //             'overtime_in' => ($logs!=null) ? $logs['overtime_in'] : '',
    //             'overtime_out' => ($logs!=null) ? $logs['overtime_out'] : '',
    //         );
    //     }

    //     return view('homes',['dates' => $dates,'data_array' => $data_array]);
    // }
}
