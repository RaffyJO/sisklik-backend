<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin SisKlik',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '081234565436',
            'role' => 'admin',
        ]);

        \App\Models\ProfileClinic::factory()->create([
            'name' => 'Klinik Raffy',
            'address' => 'Jl. Perum Jaya No.12',
            'phone' => '081234565436',
            'email' => 'raffyjo@gmail.com',
            'doctor_name' => 'Dr. Raffy',
            'unique_code' => '241003',
        ]);

        $this->call(DoctorSeeder::class);
        $this->call(DoctorScheduleSeeder::class);
        $this->call(PatientSeeder::class);
    }
}
