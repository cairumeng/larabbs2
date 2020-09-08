<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'topic_id', 'user_id', 'content', 'created_at', 'updated_at'
    ];
}
