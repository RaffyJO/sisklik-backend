<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function index(Request $request)
    {
        $doctorSchedules = DoctorSchedule::with('doctor')
            ->when($request->input('doctor_id'), function ($query, $doctor_id) {
                return $query->where('doctor_id', $doctor_id);
            })

            ->orderBy('doctor_id', 'asc')
            ->paginate(10);
        return view('pages.doctor_schedules.index', compact('doctorSchedules'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('pages.doctor_schedules.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
        ]);

        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];

        foreach ($days as $day) {
            // Memeriksa apakah ada waktu mulai dan waktu selesai untuk hari ini
            if ($request->{$day . '_start'} && $request->{$day . '_end'}) {
                $doctorSchedule = new DoctorSchedule;
                $doctorSchedule->doctor_id = $request->doctor_id;
                $doctorSchedule->day = $day;
                // Mengambil waktu mulai dan waktu selesai dari input yang berbeda
                $doctorSchedule->time = $request->{$day . '_start'} . ' - ' . $request->{$day . '_end'};
                $doctorSchedule->save();
            }
        }

        return redirect()->route('doctor-schedules.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $doctorSchedule = DoctorSchedule::find($id);
        $doctors = Doctor::all();
        return view('pages.doctor_schedules.edit', compact('doctorSchedule', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
            'time' => 'required',
        ]);

        $doctorSchedule = DoctorSchedule::find($id);
        $doctorSchedule->doctor_id = $request->doctor_id;
        $doctorSchedule->day = $request->day;
        $doctorSchedule->time = $request->time;
        $doctorSchedule->status = $request->status;
        $doctorSchedule->note = $request->note;
        $doctorSchedule->save();

        return redirect()->route('doctor-schedules.index');
    }

    public function destroy($id)
    {
        DoctorSchedule::find($id)->delete();
        return redirect()->route('doctor-schedules.index');
    }
}
