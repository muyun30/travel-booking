<?php
namespace Database\Seeders;
use App\Models\Flight;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    public function run(): void
    {
        $flights = [
            ['airline'=>'Air France','flight_number'=>'AF101','origin'=>'Paris','destination'=>'New York','departure_at'=>'2025-07-01 08:00:00','arrival_at'=>'2025-07-01 20:00:00','price'=>650.00,'seats_available'=>120],
            ['airline'=>'Emirates','flight_number'=>'EK202','origin'=>'Dubai','destination'=>'Paris','departure_at'=>'2025-07-05 14:00:00','arrival_at'=>'2025-07-05 22:00:00','price'=>480.00,'seats_available'=>80],
        ];
        foreach ($flights as $f) Flight::create($f);
    }
}
