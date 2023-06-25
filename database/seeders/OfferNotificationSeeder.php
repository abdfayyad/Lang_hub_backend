<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\OfferNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OfferNotification::factory()->count(10)->create();
    }
}
