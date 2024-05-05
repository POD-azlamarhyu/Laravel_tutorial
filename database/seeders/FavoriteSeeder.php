<?php

namespace Database\Seeders;

use App\Models\Favorite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Tweet;
use App\Models\User;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=100;$i++)
        {
            Favorite::create([
                "user_id"=>User::inRandomOrder()->first()->id,
                "tweet_id"=>Tweet::inRandomOrder()->first()->id,
            ]);
        }
    }
}
