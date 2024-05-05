<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $number = 3;
    public function definition(): array
    {
        
        return [
            "user_id" => function (){return self::$number++;},
            "account_name"=>fake()->name(),
            "account_id"=>fake()->unique()->password(6,20),
            "user_bio"=>fake()->text(100)
        ];
    }
}
