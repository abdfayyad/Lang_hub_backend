<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SuperAdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $superAdminRole = Role::where('name' , 'Super_Admin') ;
        return [
            'name' => fake()->name(),
            'user_id'=> function()use ($superAdminRole){
                return User::factory()->create([
                    'role_id'=> $superAdminRole->id  
                ])->id ;
            }
        ];
    }
}
