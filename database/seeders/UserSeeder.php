<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
    
        DB::table('users')->insert(
        [
            'email' => 'kassemStudent@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 4
        ]);
        

        // $users = User::factory()
        // ->count(10)
        // ->has(Student::factory()->count(10), 'student')
        // ->create();
        // $users->chunk(10)->each(function($chunk) {
        //     User::insert($chunk->toArray());
        // });
    }
}
