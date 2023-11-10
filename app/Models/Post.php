<?php

namespace App\Models;

use App\Traits\HasUserStamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUserStamps;

    protected $fillable = [
        'content',
        'media',
        'total_likes',
        'total_comments',
        'total_shares',
        'privacy_level',
        'hashtags',
        'created_by',
        'updatd_by',
    ];
}
