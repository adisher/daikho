<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IdeationDailyReport;
use App\JazzDailyReport;
use App\MarketingCampaigns;
use App\SmsUnsubReport;
use Carbon\Carbon;
use App\UnsubReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnsubController extends Controller
{
    public function unsubreport(){
        return view('unsubreport');
    }


    public function getunsubreport(Request $request)
    {
        $start = Carbon::parse($request->start_date);

        $end = Carbon::parse($request->end_date);
        $result = $end->gte($start);

        if (!$result) {
            return response()->json(['status' => $result]);
        }

        $users = UnsubReport::whereBetween('date', [$start, $end])->get();

        return response()->json(['status' => $result, 'data' => $users, 'sss' => $start]);
    }
}
