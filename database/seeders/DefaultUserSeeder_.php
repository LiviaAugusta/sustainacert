<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// class DefaultUserSeeder extends Seeder
// {
//     public function run(): void
//     {
//         User::updateOrCreate(
//             ['email' => 'admin@example.com'],
//             [
//                 'name'     => 'Admin',
//                 'password' => Hash::make('password'),   // <- credenziali
//             ]
//         );
//     }
// }