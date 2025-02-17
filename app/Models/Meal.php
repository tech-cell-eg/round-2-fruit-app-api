<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meal extends Model
{

    protected $fillable = [
        'title',
        'description',
        'price',
        'image_url'
    ];

    // relations
    public function baskets(): HasMany {
        return $this->hasMany(Basket::class);
    }

}
