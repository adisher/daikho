<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'cb_config';
    protected $primaryKey = 'configid';
    protected $guarded = [];
    public $timestamps = false;
}
