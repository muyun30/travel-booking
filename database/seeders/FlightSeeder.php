<?php
namespace Database\Seeders;
use App\Models\Flight;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    public function run(): void
    {
        Flight::truncate();

        $flights = [
            [
                'airline'         => 'Air France',
                'flight_number'   => 'AF101',
                'origin'          => 'Paris',
                'destination'     => 'New York',
                'departure_at'    => '2025-08-01 08:00:00',
                'arrival_at'      => '2025-08-01 20:00:00',
                'price'           => 650.00,
                'seats_available' => 120,
            ],
            [
                'airline'         => 'Emirates',
                'flight_number'   => 'EK202',
                'origin'          => 'Dubai',
                'destination'     => 'Paris',
                'departure_at'    => '2025-08-05 14:00:00',
                'arrival_at'      => '2025-08-05 22:00:00',
                'price'           => 480.00,
                'seats_available' => 80,
            ],
            [
                'airline'         => 'Turkish Airlines',
                'flight_number'   => 'TK305',
                'origin'          => 'Istanbul',
                'destination'     => 'Londres',
                'departure_at'    => '2025-08-10 06:00:00',
                'arrival_at'      => '2025-08-10 09:00:00',
                'price'           => 320.00,
                'seats_available' => 200,
            ],
            [
                'airline'         => 'Royal Air Maroc',
                'flight_number'   => 'AT406',
                'origin'          => 'Casablanca',
                'destination'     => 'Paris',
                'departure_at'    => '2025-08-15 10:00:00',
                'arrival_at'      => '2025-08-15 14:00:00',
                'price'           => 290.00,
                'seats_available' => 150,
            ],
            [
                'airline'         => 'Qatar Airways',
                'flight_number'   => 'QR507',
                'origin'          => 'Doha',
                'destination'     => 'Tokyo',
                'departure_at'    => '2025-08-20 23:00:00',
                'arrival_at'      => '2025-08-21 16:00:00',
                'price'           => 890.00,
                'seats_available' => 60,
            ],
            [
                'airline'         => 'Lufthansa',
                'flight_number'   => 'LH608',
                'origin'          => 'Frankfurt',
                'destination'     => 'Dubai',
                'departure_at'    => '2025-09-01 07:30:00',
                'arrival_at'      => '2025-09-01 15:30:00',
                'price'           => 410.00,
                'seats_available' => 95,
            ],
            [
                'airline'         => 'Kenya Airways',
                'flight_number'   => 'KQ301',
                'origin'          => 'Nairobi',
                'destination'     => 'Paris',
                'departure_at'    => '2025-09-05 22:00:00',
                'arrival_at'      => '2025-09-06 08:00:00',
                'price'           => 750.00,
                'seats_available' => 110,
            ],
            [
                'airline'         => 'Camair-Co',
                'flight_number'   => 'QC101',
                'origin'          => 'Yaoundé',
                'destination'     => 'Douala',
                'departure_at'    => '2025-09-10 07:00:00',
                'arrival_at'      => '2025-09-10 08:00:00',
                'price'           => 85.00,
                'seats_available' => 70,
            ],
        ];

        foreach ($flights as $flight) {
            Flight::create($flight);
        }
    }
}