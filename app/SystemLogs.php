<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemLogs extends Model
{
    protected $table = 'system_logs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
        'msisdn' => 'integer',
    ];
}
