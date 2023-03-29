<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionLogs extends Model
{
    protected $table = 'transaction_logs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
        'msisdn' => 'integer',
    ];
  
}
