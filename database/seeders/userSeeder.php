<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'danang@gmail.com',
            'name' => 'Danang',
            'password' => \Hash::make('123456'),
            'status' => 'aktif',
        ]);
    }
}
