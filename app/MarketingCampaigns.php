<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketingCampaigns extends Model
{
    protected $table = 'marketing_campaigns';
    protected $fillable = ['slug', 'url', 'visible', 'slug', 'url', 'status', 'source_id', 'callback_id', 'freeSignup', 'callbacks'];
    protected $primaryKey = 'id';
}
