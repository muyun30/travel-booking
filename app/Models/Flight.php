<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'airline', 'flight_number', 'origin', 'destination',
        'departure_at', 'arrival_at', 'price', 'seats_available'
    ];

    public function bookings() { return $this->morphMany(Booking::class, 'bookable'); }
    public function reviews()  { return $this->morphMany(Review::class, 'reviewable'); }
}
