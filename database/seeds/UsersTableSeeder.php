<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$Fd56fWn4FIwXkXOiGCbmI.LzJd1DAyKv7kAsRECAJ6jvSFH4MQq72',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
