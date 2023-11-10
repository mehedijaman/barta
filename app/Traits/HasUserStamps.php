<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasUserStamps{
    public static function bootHasUserStamps(){
        static::creating(function ($model) {
            $userId = Auth::id();
            $model->created_by = $userId;
        });

        static::updating(function ($model) {
            $userId = Auth::id();
            $model->updated_by = $userId;
        });
    }
}
