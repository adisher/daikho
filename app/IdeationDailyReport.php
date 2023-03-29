<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeationDailyReport extends Model
{
    protected $table = 'ideation_daily_report';
    protected $fillable = [
        'user_base', 'active_users', 'daily_revenue','daily_revenue_new','daily_revenue_returning','daily_unique_charged','succes_rate_charging','new_trials','new_subscriptions','subs_app','subs_web'
    ];
    public $timestamps = false;
}
