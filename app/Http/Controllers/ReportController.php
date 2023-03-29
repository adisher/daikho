<?php

namespace App\Http\Controllers;

use App\IdeationDailyReport;
use App\JazzDailyReport;
use App\DailyReport;
use App\MarketingCampaigns;
use App\SmsUnsubReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = MarketingCampaigns::orderBy('id','desc')->get();
        return view('report', compact('campaigns'));
    }
    public function detailedreport()
    {
        if (Auth::user()->id == 15) {
            return view('detailedreport');
        } else {
            return view('detailedReportJazz');
        }

    }

    public function reportideation()
    {

        return view('reportideation');
    }

    public function getdetailedreport(Request $request)
    {
        $start = Carbon::parse($request->start_date);

        $end = Carbon::parse($request->end_date);
        $result = $end->gte($start);

        if (!$result) {
            return response()->json(['status' => $result]);
        }
        if (Auth::user()->id == 15) {

            $users = DailyReport::whereBetween('date', [$start, $end])->get();

        } else {

            $users = DailyReport::where('status', '1')->whereBetween('date', [$start, $end])->get();

        }
        return response()->json(['status' => $result, 'data' => $users, 'sss' => $start]);
    }

    public function getideationreport(Request $request)
    {
        $start = Carbon::parse($request->start_date);

        $end = Carbon::parse($request->end_date);
        $result = $end->gte($start);

        if (!$result) {
            return response()->json(['status' => $result]);
        }

        $users = DailyReport::whereBetween('date', [$start, $end])->get();

        return response()->json(['status' => $result, 'data' => $users, 'sss' => $start]);
    }

    public function getreport(Request $request)
    {
        $start = Carbon::parse($request->start_date);

        $end = Carbon::parse($request->end_date);
        $result = $end->gte($start);
        $start = Carbon::parse($request->start_date)->toDateString();

        $end = Carbon::parse($request->end_date)->toDateString();
        if (!$result) {
            return response()->json(['status' => $result]);
        }

        $source_id = $request->campaign_select;

        // $orderbydate = DB::table('users as w')
        //         ->select(array(DB::Raw('count(w.id) as Total_Landed'),DB::Raw('w.created_at as Date'),DB::Raw('COUNT(DISTINCT(w.Phone)) as Total_UNIQUE ')))
        //         ->where('w.source_id',$source_id)
        //         ->whereBetween('created_at', [$start, $end])
        //         ->groupBy('w.created_at')
        //         ->orderBy('w.created_at')
        //         ->get();
        // $users=DB::table('users')->join('marketing_logs', 'users.msisdn', '=', 'marketing_logs.msisdn')->select([DB::raw('DATE(users.dateCreated) as date'),DB::raw('count(users.msisdn) as "total_landed"'),DB::raw('count(IF ( marketing_logs.userCharged = 0,1,NULL ) ) as converted'),
        // DB::Raw('COUNT(DISTINCT(users.msisdn)) as total_unique '),
        // DB::Raw('count( IF ( marketing_logs.userCharged = 1,1,NULL ) ) as trial ')])
        // ->whereDate('users.dateCreated','>=',$start)
        // ->whereDate('users.dateCreated','<=',$end)
        // //->whereBetween('created_at', [$start, $end])
        // ->where('users.source_id',$source_id)
        // ->groupBy(DB::raw('DATE(users.dateCreated)'))
        // ->get();

        // $users = DB::select("SELECT DATE(CONCAT(SUBSTRING_INDEX(DATE_ADD(dateCreated, INTERVAL 5 HOUR),' ',1),' 00:00:00')) AS dateCreated ,COUNT(msisdn) AS total_users,
        //             COUNT(last_successful_charge) AS total_subscribed
        //             FROM users WHERE
        //             DATE(CONCAT(SUBSTRING_INDEX(DATE_ADD(dateCreated, INTERVAL 5 HOUR),' ',1),' 00:00:00'))  >= '$start' AND DATE(CONCAT(SUBSTRING_INDEX(DATE_ADD(dateCreated, INTERVAL 5 HOUR),' ',1),' 00:00:00')) <= '$end' AND source_id= '$source_id'
        //             GROUP  BY DATE(CONCAT(SUBSTRING_INDEX(DATE_ADD(dateCreated, INTERVAL 5 HOUR),' ',1),' 00:00:00')) ORDER BY dateCreated DESC");
        //$users=User::where('source_id',$source_id)->whereBetween('created_at', [$start, $end])->get();

        //$users = DB::select("CALL SP_HOME_RPTM('$source_id','', '$start','$end')");
        $users = DB::select("SELECT DATE(dateCreated) AS `date`,COUNT(CASE WHEN callback = 1 THEN 1 END) AS charged,COUNT(CASE WHEN callback = 0 THEN 1 END) AS trial,COUNT(CASE WHEN callback = 1 THEN 1 END)*5 AS revenue FROM users WHERE source_id = '$source_id' and date(dateCreated) >= '$start' and date(dateCreated) <= '$end' GROUP BY DATE(dateCreated)");

        return response()->json(['status' => $result, 'data' => $users, 'sss' => $start]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editreport($id)
    {
        $row = JazzDailyReport::where('id', $id)->first();
        return response()->json($row);
    }

    public function updatereport(Request $request, $id)
    {

        $start = \Carbon\Carbon::parse($request->start)->format('Y-m-d');
        $end = \Carbon\Carbon::parse($request->end)->format('Y-m-d');

        $report = JazzDailyReport::find($id);

        $report->user_base = $request->user_base;
        $report->active_users = $request->active_users;
        $report->daily_revenue = $request->daily_revenue;
        $report->daily_revenue_new = $request->daily_revenue_new;
        $report->daily_revenue_returning = $request->daily_revenue_returning;
        $report->daily_unique_charged = $request->daily_unique_charged;
        $report->new_trials = $request->new_trials;
        $report->new_subscriptions = $request->new_subscriptions;
        $report->subs_app = $request->subs_app;
        $report->subs_web = $request->subs_web;
        $report->total_streaming_minutes = $request->total_streaming_minutes;
        $report->total_stream_counts = $request->total_stream_counts;

        $report->save();

        $users = JazzDailyReport::whereBetween('reference_date', [$start, $end])->get();

        return response()->json(['data' => $users]);

    }
    public function updateStatus(Request $request, $id)
    {

        $report = JazzDailyReport::find($id);

        if ($request->status == true) {

            $report->status = '1';
            $report->save();
            return response()->json(['success' => 'Record Published']);

        } else {
            $report->status = '0';
            $report->save();
            return response()->json(['success' => 'Record UnPublished']);
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function smsunsub()
    {
        return view('smsunsub');
    }

    public function smsreport(Request $request)
    {
        $start = Carbon::parse($request->start_date);

        $end = Carbon::parse($request->end_date);
        $result = $end->gte($start);

        if (!$result) {
            return response()->json(['status' => $result]);
        }

        $users = SmsUnsubReport::whereBetween('date', [$start, $end])->get();

        return response()->json(['status' => $result, 'data' => $users, 'sss' => $start]);
    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
