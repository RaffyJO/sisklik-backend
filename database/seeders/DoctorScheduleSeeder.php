<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua dokter
        $doctors = Doctor::all();

        // Loop melalui setiap dokter
        foreach ($doctors as $doctor) {
            // Loop melalui setiap hari dalam seminggu
            foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $day) {
                // Buat satu jadwal untuk setiap hari untuk dokter saat ini
                DoctorSchedule::factory()->create([
                    'doctor_id' => $doctor->id,
                    'day' => $day,
                    'time' => '08:00 - 12:00' // Atur waktu default
                ]);
            }
        }
    }
}
