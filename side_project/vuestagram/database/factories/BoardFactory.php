<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::select('user_id')->inRandomOrder()->first();
        return [
            'user_id' => $user->user_id,
            'content' => $this->faker->realText(rand(10, 100)),
            'img' => '/img/avatars-Nh8hEW4pWNdSFoba-pKjaFA-t1080x1080'.rand(0,9).'.jpg',
            'like' => rand(1,300),
        ];
    }
}
