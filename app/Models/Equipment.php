<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sport_type',
        'description',
        'price_per_unit',
        'quantity_available',
        'image_path',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
