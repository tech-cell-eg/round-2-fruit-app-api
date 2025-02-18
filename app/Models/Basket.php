<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Basket extends Model
{

    protected $fillable = [
        'user_id',
        'meal_id',
        'quantity',
        'total_price'
    ];

    // relations
    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function meal() :BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }

}
