<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeriesCategories extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'cb_series_categories';
    protected $primaryKey = 'category_id';
    protected $guarded = [];
    public $timestamps = false;
}
