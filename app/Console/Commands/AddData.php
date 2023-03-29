<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily adds new records based on date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        try { 
            date_default_timezone_set("Asia/Karachi");
            $this->info(date('Y-m-d H:i:s'). '::: started cronjob');
            $date = date('Y-m-d');
            $previous_date =  date('Y-m-d', strtotime($date.' - 1 day'));
            $report = DB::select("CALL daily_report_new('".$previous_date."')");//date('Y-m-d', strtotime($date .' -1 day'));
            

            $streaming_data = DB::connection('mysql2')->select("CALL streaming_data_jazz_report('".$previous_date."')");
            
            $new_data = DB::connection('mysql2')->select('SELECT * FROM streaming_records where reference_date = "'.$previous_date.'" LIMIT 1');
            $update_ideation = DB::connection('mysql')->update('UPDATE ideation_daily_report set total_streaming_minutes = '.$new_data[0]->total_streaming_minutes.', total_stream_counts = '.$new_data[0]->total_stream_counts.' WHERE reference_date = "'.$previous_date.'"');
            $update_jazz = DB::connection('mysql')->update('UPDATE jazz_daily_report set total_streaming_minutes = '.$new_data[0]->total_streaming_minutes.', total_stream_counts = '.$new_data[0]->total_stream_counts.' WHERE reference_date = "'.$previous_date.'"');

            $this->info(date('Y-m-d H:i:s'). '::: Finished Cronjob');
        // Closures include ->first(), ->get(), ->pluck(), etc.
        } catch(\Illuminate\Database\QueryException $ex){ 
            //dd($ex->getMessage()); 
            $this->info(date('Y-m-d H:i:s'). ':::'.$ex->getMessage());
        // Note any method of class PDOException can be called on $ex.
        }
    }
}
