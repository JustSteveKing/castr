<?php

declare(strict_types=1);

namespace Database\Seeders;

use Castr\Domains\Shared\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Steve',
            'email' => 'juststevemcd@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
