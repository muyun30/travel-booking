<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Créer admin
        User::create([
            'name'     => 'Administrateur',
            'email'    => 'admin@travelbooking.com',
            'password' => Hash::make('admin1234'),
            'role'     => 'admin',
        ]);

        // Créer user test
        User::create([
            'name'     => 'John Doe',
            'email'    => 'john@example.com',
            'password' => Hash::make('password123'),
            'role'     => 'user',
        ]);

        $this->call([
            FlightSeeder::class,
            HotelSeeder::class,
        ]);
    }
}