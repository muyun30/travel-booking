<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name', 'city', 'country', 'address',
        'price_per_night', 'stars', 'description'
    ];

    public function bookings() { return $this->morphMany(Booking::class, 'bookable'); }
    public function reviews()  { return $this->morphMany(Review::class, 'reviewable'); }
}

