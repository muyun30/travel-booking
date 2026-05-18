<?php
namespace Database\Seeders;
use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        Hotel::truncate();

        $hotels = [
            [
                'name'            => 'Hotel Le Grand Paris',
                'city'            => 'Paris',
                'country'         => 'France',
                'address'         => '15 Avenue des Champs-Élysées, Paris',
                'price_per_night' => 250.00,
                'stars'           => 5,
                'description'     => 'Hôtel de luxe au cœur de Paris avec vue sur la Tour Eiffel.',
            ],
            [
                'name'            => 'Burj Al Arab',
                'city'            => 'Dubai',
                'country'         => 'Émirats Arabes Unis',
                'address'         => 'Jumeirah Beach Road, Dubai',
                'price_per_night' => 1500.00,
                'stars'           => 5,
                'description'     => 'L\'hôtel le plus luxueux du monde en forme de voile sur la mer.',
            ],
            [
                'name'            => 'Tokyo Shibuya Hotel',
                'city'            => 'Tokyo',
                'country'         => 'Japon',
                'address'         => '2-1 Dogenzaka, Shibuya, Tokyo',
                'price_per_night' => 180.00,
                'stars'           => 4,
                'description'     => 'Hôtel moderne au centre de Shibuya proche de toutes les attractions.',
            ],
            [
                'name'            => 'Riad Marrakech Prestige',
                'city'            => 'Marrakech',
                'country'         => 'Maroc',
                'address'         => 'Derb Sidi Bouloukate, Médina, Marrakech',
                'price_per_night' => 120.00,
                'stars'           => 4,
                'description'     => 'Magnifique riad traditionnel avec piscine et hammam dans la médina.',
            ],
            [
                'name'            => 'New York Times Square Inn',
                'city'            => 'New York',
                'country'         => 'États-Unis',
                'address'         => '235 West 46th Street, New York',
                'price_per_night' => 320.00,
                'stars'           => 4,
                'description'     => 'Hôtel situé en plein cœur de Times Square avec vue panoramique.',
            ],
            [
                'name'            => 'Istanbul Bosphorus Palace',
                'city'            => 'Istanbul',
                'country'         => 'Turquie',
                'address'         => 'Çırağan Caddesi 32, Beşiktaş, Istanbul',
                'price_per_night' => 200.00,
                'stars'           => 5,
                'description'     => 'Palace historique avec vue spectaculaire sur le Bosphore.',
            ],
            [
                'name'            => 'London Central Hotel',
                'city'            => 'Londres',
                'country'         => 'Royaume-Uni',
                'address'         => '10 Oxford Street, London',
                'price_per_night' => 280.00,
                'stars'           => 3,
                'description'     => 'Hôtel confortable proche de Westminster et du London Eye.',
            ],
            [
                'name'            => 'Hilton Yaoundé',
                'city'            => 'Yaoundé',
                'country'         => 'Cameroun',
                'address'         => 'Boulevard du 20 Mai, Yaoundé',
                'price_per_night' => 95.00,
                'stars'           => 5,
                'description'     => 'Le meilleur hôtel de la capitale camerounaise au cœur du centre-ville.',
            ],
            [
                'name'            => 'Akwa Palace Douala',
                'city'            => 'Douala',
                'country'         => 'Cameroun',
                'address'         => 'Rue du Roi Albert, Akwa, Douala',
                'price_per_night' => 80.00,
                'stars'           => 4,
                'description'     => 'Hôtel élégant dans le quartier des affaires de Douala.',
            ],
            [
                'name'            => 'Radisson Blu Dakar',
                'city'            => 'Dakar',
                'country'         => 'Sénégal',
                'address'         => 'Place de l\'Indépendance, Dakar',
                'price_per_night' => 110.00,
                'stars'           => 5,
                'description'     => 'Hôtel 5 étoiles face à l\'océan Atlantique au cœur de Dakar.',
            ],
        ];

        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
 
            }
    }
}