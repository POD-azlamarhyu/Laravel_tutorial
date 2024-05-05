<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'tarou',
            'email' => 'hello@example.com',
            'password' => Hash::make('password1'),

        ]);
    
        User::create([
            'name' => 'yamada',
            'email' => 'world@example.com',
            'password' => Hash::make('unko1unko1'),
        ]);
        User::create([
            'name' => 'mankomanok',
            'email' => 'unko_unko@example.com',
            'password' => Hash::make('fuckinunko'),
        ]);
        User::create([
            'name' => 'omankoomanko',
            'email' => 'manko.world@example.com',
            'password' => Hash::make('chnkounko1'),
        ]);
        User::factory(100)->create();
    }
}
