<?php

namespace Database\Seeders;

use App\Lib\SeedingFunction;
use App\Models\ChatRoom;
use App\Models\ChatroomBelongUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatroomBelongUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChatroomBelongUser::factory(50)->create();
        for($i=1;$i<=100;$i++){
            ChatroomBelongUser::create([
                "user_id"=>SeedingFunction::create__user_id(),
                "room_id"=>ChatRoom::inRandomOrder()->first()->id
            ]);
        }
    }
}
