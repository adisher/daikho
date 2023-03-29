<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoCategories extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'cb_video_categories';
    protected $primaryKey = 'category_id';
    protected $guarded = [];
    public $timestamps = false;

    public function scopeExclude($query, $id)
    {
        return $query->where('category', 'like', '#'.$id.'#');
    }
}
