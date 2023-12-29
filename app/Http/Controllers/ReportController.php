<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use App\Models\TrackerModels;

class ReportController extends Controller
{
    public function report()
    {
        try {
            return view('reportwork.report');
        } catch (Exception $e) {
            return back()->with("error", "Something Went Wrong");
        }
    }

    public function daterange(Request $request)
    {
        try {
            
            $array = explode("@", $request->dateRangehid);
            $startDate = $array[0];
            $endDate = $array[1];
            $data = DB::table('users')
                ->join('visitors', 'users.ip_address', '=', 'visitors.ip')
                ->select("*")
                ->whereRaw('DATE(visitors.created_at) BETWEEN ? AND ?', [date('Y-m-d', strtotime($startDate)), date('Y-m-d', strtotime($endDate))])
                ->get();
            
            return view('reportwork.report', compact('data'));
        } catch (Exception $e) {
            return back()->with("error", "Something Went Wrong");
        }
    }

    public function wifiCount($slug)
    {
  
        $unique_ip = true;
        
        $visitors = DB::table('visitors')->get();
        foreach ($visitors as $visitor) {
            if ($visitor->ip == request()->ip() && $visitor->date == now()->format('Y-m-d')) {
                $unique_ip = false;
            }
        }

        if ($unique_ip) {
            $visitor = DB::table('visitors')->insert([
                'ip' => request()->ip(),
                'date' => now()->format('Y-m-d'),
                'zone' => $slug // Insert the zone into the database
            ]);
        }
    }
}