<?php

namespace Database\Factories;

use App\Models\BoardsCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
        $arrImg = [
            '/img/Pat_Mat.jpg'
            ,'/img/20210308225137.861310.jpg'
            ,'/img/i16141537287.jpg'
            ,'/img/ine.jpg'
            ,'/img/농담곰1.jpg'
        ];

        $userInfo = User::inRandomOrder()->first();
        $date = $this->faker->dateTimeBetween($userInfo->created_at);

        return [
            'u_id' => $userInfo->u_id
            ,'bc_type' => BoardsCategory::inRandomOrder()->first()->bc_type
            ,'b_title' => $this->faker->realText(50)
            ,'b_content' => $this->faker->realText(200)
            ,'b_img' => Arr::random($arrImg)
            ,'created_at' => $date
            ,'created_at' => $date
        ];
    }
}
