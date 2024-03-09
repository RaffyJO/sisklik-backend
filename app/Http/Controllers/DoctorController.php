<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('pages.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'sip' => 'required',
            'address' => 'nullable',
            'photo' => 'nullable',
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->specialist = $request->specialist;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->sip = $request->sip;
        $doctor->address = $request->address;
        if ($request->photo) {
            $doctor->photo = $request->photo;
        }
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('pages.doctors.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('pages.doctors.edit', compact('doctor'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'sip' => 'required',
            'address' => 'nullable',
            'photo' => 'nullable',
        ]);

        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->specialist = $request->specialist;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->sip = $request->sip;
        $doctor->address = $request->address;
        if ($request->photo) {
            $doctor->photo = $request->photo;
        }
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
