<?php

namespace Database\Factories;

use App\Models\ChatRoom;
use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatroomBelongUser>
 */
class ChatroomBelongUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id"=>fake()->numberBetween(1,50),
            "room_id"=>ChatRoom::inRandomOrder()->first()->id
        ];
    }
}
