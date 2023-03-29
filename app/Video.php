<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{   
    protected $connection = 'mysql2';
    protected $table = 'cb_video';
    protected $primaryKey = 'videoid';
    protected $guarded = [];
    public $timestamps = false;

    public function getAwsCdnAttribute($value)
    {    
        if ($this->mime == 'm3u8') {
            if ( $value == 'https://d3l9kj5yo53m75.cloudfront.net') {
                return Storage::disk('s3')
                ->url('files/videos/' . $this->file_directory . '/' . $this->file_name . '/' . $this->file_name . '.m3u8'); 
            }else{
                return $value;
            }
        }else{
            return Storage::disk('s3')
            ->url('file/video/' . $this->file_directory  . '/' . $this->file_name . '/' . $this->file_name . '.'.$this->mime); 
        }


    }
    public function season()
    {
        return $this->belongsTo('App\SeriesSeason', 'season_id', 'videoid');
    }

}
