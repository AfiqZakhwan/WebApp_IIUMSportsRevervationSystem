<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $items = [
            [
                'name' => 'Carbon Fiber Racket',
                'sport_type' => 'Badminton',
                'description' => 'Lightweight racket for swift shuttle control.',
                'price_per_unit' => 5.00,
                'quantity_available' => 12,
                'image_path' => 'images/IIUM_emblem.png',
            ],
            [
                'name' => 'Badminton Shoes',
                'sport_type' => 'Badminton',
                'description' => 'Grip-enhancing shoes for fast court movement.',
                'price_per_unit' => 7.50,
                'quantity_available' => 8,
                'image_path' => 'images/IIUM_emblem.png',
            ],
            [
                'name' => 'Table Tennis Paddle',
                'sport_type' => 'Ping Pong',
                'description' => 'Professional paddle for spin and speed.',
                'price_per_unit' => 4.50,
                'quantity_available' => 10,
                'image_path' => 'images/IIUM_emblem.png',
            ],
            [
                'name' => 'Volleyball',
                'sport_type' => 'Volleyball',
                'description' => 'Durable indoor volleyball for team play.',
                'price_per_unit' => 3.00,
                'quantity_available' => 15,
                'image_path' => 'images/IIUM_emblem.png',
            ],
            [
                'name' => 'Basketball',
                'sport_type' => 'Basketball',
                'description' => 'Official size basketball with excellent grip.',
                'price_per_unit' => 4.00,
                'quantity_available' => 10,
                'image_path' => 'images/IIUM_emblem.png',
            ],
        ];

        foreach ($items as $item) {
            Equipment::updateOrCreate(
                ['name' => $item['name'], 'sport_type' => $item['sport_type']],
                $item
            );
        }
    }
}
