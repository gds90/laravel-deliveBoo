<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
                'name' => 'Giuseppe de Simone',
                'email' => 'giuseppe@mail.com',
                'password' => Hash::make('giuseppe@mail.com'),
            ],
            [
                'name' => 'Alberto Mandirola',
                'email' => 'alberto@mail.com',
                'password' => Hash::make('alberto@mail.com'),
            ],
            [
                'name' => 'Pietro Straneo',
                'email' => 'pietro@mail.com',
                'password' => Hash::make('pietro@mail.com'),
            ],
            [
                'name' => 'Nicolò Balbo',
                'email' => 'nicolo@mail.com',
                'password' => Hash::make('niccolo@mail.com'),
            ],
            [
                'name' => 'Alessandro Tardio',
                'email' => 'alessandro@mail.com',
                'password' => Hash::make('alessandro@mail.com'),
            ],
        ];

        foreach ($users as $user) {
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];

            $new_user->save();
        }
    }
}
