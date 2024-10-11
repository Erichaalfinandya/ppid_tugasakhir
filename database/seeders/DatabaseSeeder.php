<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'roles'=>'admin',
                'password'=>bcrypt('12345678')
            ],
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'roles'=>'user',
                'password'=>bcrypt('12345678')
            ],
            
            [
                'name'=>'user1',
                'email'=>'user1@gmail.com',
                'roles'=>'user',
                'password'=>bcrypt('12345678')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }

        $this->call([
            JenisInformasiSeeder::class,
            RincianJenisInformasiSeeder::class,
            PejabatSeeder::class,
            MaklumatPelayananSeeder::class,
            MaklumatPelayananListSeeder::class,
            ProfilDasarHukumSeeder::class,
            ProfilGeneralSeeder::class,
            ProfilStrukturOrganisasiSeeder::class,
            ProfilTugasTanggungJawabSeeder::class,
            ProfilVisiMisiSeeder::class
        ]);
    }
}
