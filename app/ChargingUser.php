<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargingUser extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'msisdn';
    protected $guarded = [];
    public $timestamps = false;
    protected $keyType = 'integer';

    public function transactionLogs(){
        return $this->hasMany('App\TransactionLogs', 'msisdn');
    }
    public function systemLogs(){
        return $this->hasMany('App\SystemLogs', 'msisdn');
    }
}
