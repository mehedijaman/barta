<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasUserStamps
{
    public static function bootHasUserStamps()
    {
        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }
}
