<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 years');
        // 레코드 하나에 대한 데이터
        // 팩토리는 단독으로 실행하는 것이 아닌 시더쪽에서 호출해 실행함
        return [
            'u_email' => $this->faker->unique()->safeEmail()
            ,'u_password' =>Hash::make('qwer1234')
            ,'u_name' => $this->faker->name()
            ,'created_at' => $date
            ,'updated_at' => $date
        ];
    }
}
