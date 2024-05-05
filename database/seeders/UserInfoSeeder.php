<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserInfo;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserInfo::create([
            'user_id'=> 1,
            'account_name'=>'unko',
            'account_id'=>'Ksuw83sba',
        ]);

        UserInfo::create([
            'user_id'=> 2,
            'account_name'=>'53niki',
            'account_id'=>'gomiwosutero453',
        ]);
        UserInfo::factory(100)->create();
    }
}
