<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tweet;
use App\Lib\SelfFunction;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tweet::create([
            "user_id"=>2,
            "content"=>SelfFunction::random_content(100),
            "tweet_image"=>null,
            "tweet_video"=>null,
        ]);
        Tweet::create([
            "user_id"=>1,
            "content"=>SelfFunction::random_content(100),
            "tweet_image"=>null,
            "tweet_video"=>null,
        ]);
        Tweet::create([
            "user_id"=>2,
            "content"=>SelfFunction::random_content(100),
            "tweet_image"=>null,
            "tweet_video"=>null,
        ]);
        Tweet::create([
            "user_id"=>1,
            "content"=>SelfFunction::random_content(100),
            "tweet_image"=>null,
            "tweet_video"=>null,
        ]);
        Tweet::factory(100)->create();
    }
}
