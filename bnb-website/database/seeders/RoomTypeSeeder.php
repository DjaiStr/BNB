<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    public function run()
    {
        RoomType::create([
            'name' => 'Single Room',
            'description' => 'A room for one person.',
            'base_price' => 50.00,
        ]);

        RoomType::create([
            'name' => 'Double Room',
            'description' => 'A room for two people.',
            'base_price' => 75.00,
        ]);

        // voeg meer kamers toe zo nodig
    }
}
