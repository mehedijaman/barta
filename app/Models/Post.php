<?php

namespace App\Models;

use App\Traits\HasUserStamps;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use HasUserStamps;
    use HasUuids;
    use SoftDeletes;

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

    public function author(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
