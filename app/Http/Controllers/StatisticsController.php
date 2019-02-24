<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Charts;
use App\Models\Visitor;
use DateTime;
use DatePeriod;
use DateInterval;

class StatisticsController extends Controller {
    public function index() {
        $visitors = DB::table('visitors')
            ->select('visit_date', DB::raw('count(*) as count_visitor'))
            ->whereYear('visit_date','=',date('Y'))
            ->whereMonth('visit_date','=',date('m'))
            ->groupBy('visit_date')
            ->get();
        $dailyVisitors = [];
        $dt = date_create(date('Y').'-'.date('m').'-'.'1');
        while ($dt->format('m') === date('m')) {
            $dailyVisitors[(int)$dt->format('d')] = 0;
            $dt->add(new DateInterval('P1D'));
        }
        foreach ($visitors as $visitor) {
            $time = strtotime($visitor->visit_date);
            $dayNo = (int) date('d',$time);
            $dailyVisitors[$dayNo] = $visitor->count_visitor;
        }
        
        $visitors = DB::table('visitors')
            ->select(DB::raw('MONTH(visit_date) as month'), DB::raw('count(*) as count_visitor'))
            ->whereYear('visit_date','=',date('Y'))
            ->groupBy('month')
            ->get();
        $monthlyVisitors = [];
        for ($i = 0; $i < 12; ++$i) {
            $monthlyVisitors[$i] = 0;
        }
        foreach ($visitors as $visitor) {
            $monthlyVisitors[$visitor->month-1] = $visitor->count_visitor;
        }

        $visitors = DB::table('visitors')
            ->select(DB::raw('YEAR(visit_date) as year'), DB::raw('count(*) as count_visitor'))
            ->groupBy('year')
            ->get();
        $years = [];
        foreach ($visitors as $visitor) {
            array_push($years,$visitor->year);
        }
        $yearlyVisitors = [];
        for ($i = min($years); $i <= max($years); ++$i) {
            $yearlyVisitors[$i] = 0;
        }
        foreach ($visitors as $visitor) {
            $yearlyVisitors[$visitor->year] = $visitor->count_visitor;
        }

        $country_count = DB::table('visitors')
            ->select('country_code', DB::raw('count(*) as count_visitor'))
            ->groupBy('country_code')
            ->paginate(100)
            ->sortByDesc('count_visitor');
        
        return view('admin-side/stat',['dailyVisitors' => $dailyVisitors, 'monthlyVisitors' => $monthlyVisitors, 'yearlyVisitors' => $yearlyVisitors, 'years' => $years, 'country_count' => $country_count]);
    }
}
