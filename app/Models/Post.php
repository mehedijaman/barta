<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use App\Traits\HasUserStamps;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use HasUserStamps;
    use InteractsWithMedia;
    use SoftDeletes;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'content',
        'total_likes',
        'total_comments',
        'total_shares',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->id = Str::uuid();
    //     });
    // }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
