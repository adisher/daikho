<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Series;
class SeriesSeason extends Model
{   
    protected $connection = 'mysql2'; 
    protected $table = 'cb_series_seasons';
    protected $primaryKey = 'season_id';

    /**
     * Get the series that owns the SeriesSeason
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function series()
    {
        return $this->belongsTo('App\Series', 'series_id', 'season_id');
    }

    /**
     * Get all of the videos for the SeriesSeason
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function episodes()
    {
        return $this->hasMany('App\Video', 'season_id', 'season_id')->select(['videoid', 'series_id', 'season_id','title','description','is_free','aws_cdn','date_added','file_name','duration','default_thumb','file_directory','aws_thumb_path','aws_migrate','mime']);
    }
}
