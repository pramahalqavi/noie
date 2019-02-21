<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Charts;
use App\Models\Visitor;

class StatisticsController extends Controller {
    public function index() {
        $visitors = DB::table('visitors')
            ->whereYear('visit_date','=',date('Y'))
            ->whereMonth('visit_date','=',date('m'))
            ->groupBy('visit_date');
        // $visitors = Visitor::whereYear('visit_date','=',date('Y'))
        //     ->whereMonth('visit_date','=',date('m'))
        //     ->get()->groupBy(DB::raw('DATE(visit_date)'));
        // $time = strtotime($visitors[0]->visit_date);
        // dd((int)date('d',$time));
        // dd($visitors);
        $dailyVisitors = [];
        foreach ($visitors as $visitor) {
            // $dailyVisitors = 
        }
        return view('admin-side/stat');
    }
}
