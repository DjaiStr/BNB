<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class OmgevingSeeder extends Seeder
{
    public function run()
    {
        $activities = [
            [
                'name' => 'voetballen',
                'description' => 'Hier kan je voetballen',
                'website' => 'https://www.voetbal.nl',
                'image' => 'https://www.amrathhotelalkmaar.nl/upload/heading/home-1500x1000_1.jpg',
            ],
            [
                'name' => 'wandelen',
                'description' => 'Prachtige wandelroutes in de natuur.',
                'website' => 'https://www.wandelen.nl',
                'image' => 'https://www.example.com/wandelen.jpg',
            ],
            [
                'name' => 'museumbezoek',
                'description' => 'Bezoek ons lokaal museum vol historie.',
                'website' => 'https://www.museum.nl',
                'image' => 'https://www.example.com/museum.jpg',
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
        Activity::factory()->count(10)->create();
    }
}
