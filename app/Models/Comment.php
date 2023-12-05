<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Traits\HasUserStamps;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasUserStamps;
    use SoftDeletes;
    use HasUuids;

    protected $fillable = [
        'post_id',
        'user_id',
        'content',
        'total_likes',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->uuid = Str::uuid();
    //     });
    // }


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
