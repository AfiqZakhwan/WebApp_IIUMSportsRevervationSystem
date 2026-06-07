<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sport_type',
        'description',
        'price_per_hour',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price_per_hour' => 'decimal:2',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }
}
