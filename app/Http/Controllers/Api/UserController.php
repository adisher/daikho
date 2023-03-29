<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ChargingUser;

class UserController extends Controller
{
    public function updateSource($msisdn){
        $user = ChargingUser::select('msisdn','source_id')->where('msisdn',$msisdn)->first();
        if ($user != null) {
            $user->source_id = 'mobile';
            $user->save();
        }

        return response()->json($user);
    }
}
