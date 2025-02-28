<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meal extends Model
{

    use HasFactory;

    protected $fillable = [
        'admin_id',
        'title',
        'description',
        'price',
        'image_url'
    ];

    // relations
    public function baskets(): HasMany {
        return $this->hasMany(Basket::class);
    }

    public function payments(): BelongsToMany {
        return $this->belongsToMany(Payment::class, 'meal_payment')
            ->withPivot('amount', 'status');
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'admin_id');
    }

}
