<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MarketingCampaigns;
use Carbon\Carbon;
use App\User;
use App\ChargingUser;
use Illuminate\Support\Facades\DB;

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
    //      echo "========" . date("i:s") . "<br>";
    //     print_r(  $users=DB::table('users')
    //     // ->join('marketing_logs', 'users.msisdn', '=', 'marketing_logs.msisdn')
    //     ->select([DB::raw('DATE(users.dateCreated) as date'),DB::raw('count(users.msisdn) as "total_landed"'),
    //     // DB::raw('count(IF ( marketing_logs.userCharged = 0,1,NULL ) ) as converted'),
    //     DB::raw('COUNT(ISNULL(users.last_successful_charge) ) as converted'),
    //     DB::Raw('COUNT(DISTINCT(users.msisdn)) as total_unique '),
    //     // DB::Raw('count( IF ( marketing_logs.userCharged = 1,1,NULL ) ) as trial ')
    //     DB::Raw('COUNT(!ISNULL(users.last_successful_charge) ) as trial')
    //     ])
    //     ->whereDate('users.dateCreated','>=','2021-07-01')
    //     ->whereDate('users.dateCreated','<=','2021-08-20')
    //     //->whereBetween('created_at', [$start, $end])
    //     ->where('users.source_id','af1')
    //     ->groupBy(DB::raw('DATE(users.dateCreated)'))
    //     ->get()
    // );
        
    //     $query= "SELECT DATE(a.dateCreated) , COUNT(a.msisdn) as total_landed,
    //     count(IF (b.userCharged = 0,1,NULL ) ) as converted,
    //     count( IF ( b.userCharged = 1,1,NULL ) ) as trial,
    //     COUNT(DISTINCT(a.msisdn)) as total_unique FROM users a , marketing_logs b WHERE a.msisdn=b.msisdn AND  a.dateCreated >='2021-07-01' AND 
    //     a.dateCreated <= '2021-08-20' AND a.source_id =' af1' GROUP BY DATE(a.dateCreated)" ;
    //    return  $users = DB::select($query);
        
        // foreach ($users as $key => $value) {
        //     echo $value . '<br>';
        // }
        // echo "========== " . date("i:s") . "<br>";
        return view('home');
    }
  
}
