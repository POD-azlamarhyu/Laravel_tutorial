<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */
class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id"=>fake()->numberBetween(1,100),
            "content"=>fake()->realText(200),
            "tweet_image"=>fake()->image("/storage/app/public/tweet/image",640,480,'animals',true,true,null),
            "tweet_video"=>null
        ];
    }
}
