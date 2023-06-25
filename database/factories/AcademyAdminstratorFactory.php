<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AcademyAdminstratorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $academyRole = Role::where('name', 'Academy_AdminStrator')->first();
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'phone_number' => random_int(911111111 , 999999999) ,
            'photo'=>$this->faker->imageUrl ,
            'user_id' => function () use ($academyRole) {
                return User::factory()->create([
                    'role_id' => $academyRole->id,
                ])->id;
            }
        ];
    }
}
