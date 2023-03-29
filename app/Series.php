<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'cb_series';
    protected $primaryKey = 'series_id';
    protected $guarded = [];
    public $timestamps = false;

    public function seasons()
    {
        return $this->hasMany('App\SeriesSeason', 'series_id', 'series_id');
    }
}
