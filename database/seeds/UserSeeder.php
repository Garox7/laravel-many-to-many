<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin1',
                'email' => 'a1@a1.it',
                'password' => Hash::make('admin1'),
            ],
            [
                'name' => 'admin2',
                'email' => 'a2@a2.it',
                'password' => Hash::make('admin2'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
