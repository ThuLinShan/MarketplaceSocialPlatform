<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    // Disable auto-incrementing because you are using custom IDs
    public $incrementing = false;

    // Set the key type to bigint
    protected $keyType = 'bigint';

    public $timestamps = false;

    // Automatically manage timestamps for all models extending this class
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = now()->getTimestamp() * 1000 + random_int(0, 999);
            $model->created_at =  now()->getTimestamp();
            $model->updated_at =  now()->getTimestamp();
        });

        static::updating(function ($model) {
            $model->version = intval($model->version) + 1;
            $model->updated_at =  now()->getTimestamp();
        });
    }
}
