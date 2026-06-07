<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Admin account
        User::updateOrCreate(['email' => 'admin@iium.edu.my'], [
            'name'           => 'IIUM Admin',
            'matric_number'  => 'ADMIN001',
            'phone'          => '0123456789',
            'email'          => 'admin@iium.edu.my',
            'password'       => Hash::make('admin1234'),
            'role'           => 'admin',
        ]);

        // Test student account
        User::updateOrCreate(['email' => 'test@example.com'], [
            'name'           => 'Test Student',
            'matric_number'  => 'S12345',
            'phone'          => '0198765432',
            'email'          => 'test@example.com',
            'password'       => Hash::make('password'),
            'role'           => 'student',
        ]);

        // Seed venues if none exist
        $venues = [
            ['name' => 'Badminton Court A', 'sport_type' => 'Badminton', 'description' => 'Indoor badminton court with professional flooring.', 'price_per_hour' => 3.00, 'is_available' => true],
            ['name' => 'Badminton Court B', 'sport_type' => 'Badminton', 'description' => 'Indoor badminton court with bright lighting.', 'price_per_hour' => 3.00, 'is_available' => true],
            ['name' => 'Futsal Court', 'sport_type' => 'Futsal', 'description' => 'Full-size indoor futsal court.', 'price_per_hour' => 5.00, 'is_available' => true],
            ['name' => 'Basketball Court', 'sport_type' => 'Basketball', 'description' => 'Outdoor basketball half-court.', 'price_per_hour' => 2.00, 'is_available' => true],
            ['name' => 'Table Tennis Room', 'sport_type' => 'Ping Pong', 'description' => 'Air-conditioned room with 4 ping pong tables.', 'price_per_hour' => 2.00, 'is_available' => true],
            ['name' => 'Volleyball Court', 'sport_type' => 'Volleyball', 'description' => 'Outdoor volleyball court with net.', 'price_per_hour' => 2.00, 'is_available' => true],
        ];

        foreach ($venues as $venue) {
            Venue::updateOrCreate(['name' => $venue['name']], $venue);
        }

        $this->call(EquipmentSeeder::class);
    }
}
