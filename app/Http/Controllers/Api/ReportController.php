<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function revenue($date){
        $enddate = date('Y-m-d');
        // $input = '05/10/2011 15:00:02';
        $date = date('Y-m-d', strtotime($date));
        $data = DB::connection('mysql')->select("SELECT date(`date`) as `date`,total_revenue as revenue FROM  daily_report WHERE `date` BETWEEN '$date' AND '$enddate'");
        return response()->json($data);
    }

    public function campaigns(){
        $campaigns = DB::connection('mysql')->table('marketing_campaigns')->select('slug','source_id')
        ->where('visible',1)->get();
        return response()->json($campaigns);
    }

    public function trials($campaign,$date){

        $end = date('Y-m-d');
        $start = date('Y-m-d', strtotime($date));
        $data = DB::connection('mysql')->select("SELECT DATE(CONCAT(SUBSTRING_INDEX(DATE_ADD(dateCreated, INTERVAL 5 HOUR),' ',1),' 00:00:00')) AS dateCreated ,COUNT(msisdn) AS trials
        FROM users WHERE DATE(CONCAT(SUBSTRING_INDEX(DATE_ADD(dateCreated, INTERVAL 5 HOUR),' ',1),' 00:00:00'))  >= '$start' AND DATE(CONCAT(SUBSTRING_INDEX(DATE_ADD(dateCreated, INTERVAL 5 HOUR),' ',1),' 00:00:00')) <= '$end' AND source_id= '$campaign'
        GROUP  BY DATE(CONCAT(SUBSTRING_INDEX(DATE_ADD(dateCreated, INTERVAL 5 HOUR),' ',1),' 00:00:00')) ORDER BY dateCreated DESC");

        return response()->json($data);

    }

}
