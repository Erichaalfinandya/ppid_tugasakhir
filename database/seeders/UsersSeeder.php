<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            [
                'name' => 'Ericha Alfinandya',
                'email' => 'ericha.alfinandya@student.uns.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'roles' => 'admin',
                'status' => 'terverifikasi',
                'foto' => 'foto_user/1723089578.jpg',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meilinda Dwi',
                'email' => 'erichaalfinandya43@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'roles' => 'user',
                'status' => 'terverifikasi',
                'foto' => 'foto_user/1723090282.jpeg',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dinar Kribianita',
                'email' => 'fndyaerial@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('12345678'),
                'roles' => 'user',
                'status' => 'terverifikasi',
                'foto' => 'foto_user/1723101689.jpg',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
