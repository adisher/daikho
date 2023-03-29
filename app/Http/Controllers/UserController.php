<?php

namespace App\Http\Controllers;
use App\ChargingUser;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userRecord(){
        return view('userrecord');
    }

    public function getUserRecord(Request $request){
        $user = null;
        if (ChargingUser::where('msisdn',"$request->phone")->exists()) {
            $user = ChargingUser::with('transactionLogs','systemLogs')->where('msisdn','=',"$request->phone")->get();
        }
       
       
        return response()->json(['user'=>$user]);
    }

    public function bulkUnsub(){
        return view('user.bulkunsub');
    }
    public function getUnsub(){
        return view('user.unsub');
    }
    public function unsub(Request $req){
        $msisdn = $req->msisdn;
        if (ChargingUser::where('msisdn',$msisdn)->exists()) {
            $user = ChargingUser::where('msisdn',$msisdn)->first();
            $user->is_subscribed = 0;
            $user->status = 'US';
            $user->unsub_by = 'ideation';
            $user->unsub_date = date('Y-m-d');
            $user->save();

            return response()->json(['status'=> 1, 'message' => 'User Unsub Success','user' => $user]);

        }else{
            return response()->json(['status'=> 0, 'message' => 'User Not Found','user' => []]);
        }

    }
    public function getUser(Request $req){
        $msisdn = $req->msisdn;
        if (ChargingUser::where('msisdn',$msisdn)->exists()) {
            $user = ChargingUser::where('msisdn',$msisdn)->first();
            return response()->json(['status'=> 1,'user'=>$user,'message'=>'User Found']);
        }else{
            return response()->json(['status'=> 1,'user'=>[],'message'=>'User Not Found']);
        }
    }
    public function fileUnsub(Request $request){
    //    $request->validate([
    //     'file' => 'required'
    //    ]);
       $file = $request->file('bulk');
       $uniqueName = date("Ymd-his");
       $destinationPath = 'bulkunsubFiles';
       $fileName = $uniqueName . '.' . $file->getClientOriginalExtension();
       $uploadSuccess = $file->move(storage_path($destinationPath) , $fileName);
       $src = $destinationPath . '/' . $fileName;
       $filen = storage_path($src);
       $lines = file($filen, FILE_IGNORE_NEW_LINES);

       $count = 0;
       $already = 0;
       $notexist = 0;
       $phoneNumbersData = [];

       if (count($lines) > 0) {

           foreach ($lines as $key => $line) {

              
                if (substr($line, 0, 2) == '92') {

                    $str_to_replace = '0';
                    $phone = $str_to_replace . substr($line, 2);
                } else {
                    $phone = $line;
                }

                if (ChargingUser::where('msisdn',$phone)->exists()) {
                    $user = ChargingUser::where('msisdn',$phone)->first();
                    if ($user->is_subscribed == 1) {
                        $user->update([
                            'status' => 'US',
                            'is_subscribed' => 0,
                            'unsub_by' => 'ideation',
                            'unsub_date' => date('Y-m-d')
                        ]);
                        $count++;
                    }else{
                        $already++;
                    }

                }else{
                    $notexist++;
                }



            }
        }

        return response()->json(['message'=>$count .' have been unsubscribed','total'=>count($lines),'count' => $count,'already'=>$already,'notexist' => $notexist,"date"=>date('Y-m-d'),"filename"=> $file->getClientOriginalName()]);
    
    }
}
