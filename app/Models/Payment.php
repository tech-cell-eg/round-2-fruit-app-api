<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{

    protected $table = 'payment';
    protected $fillable = [
        'transaction_id',
        'amount',
        'status',
        'user_id'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function meals(): BelongsToMany {
        return $this->belongsToMany(Meal::class, 'meal_payment')
            ->withPivot('amount', 'status');
    }

}
