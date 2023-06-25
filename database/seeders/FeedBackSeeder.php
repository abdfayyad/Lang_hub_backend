<?php

namespace Database\Seeders;

use App\Models\FeedBack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedBackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feed = FeedBack::factory()
        ->count(10)
        ->create() ;
        
    }
}
