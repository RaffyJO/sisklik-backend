@extends('layouts.app')

@section('title', 'Add Schedule')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Add Doctor Schedules</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Doctor Schedules</a></div>
                    <div class="breadcrumb-item">Forms</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col">
                        <h2 class="section-title">Doctor Schedule</h2>
                    </div>
                    <div class="col text-right">
                        <div class="section-header-button">
                            <a href="{{ route('doctor-schedules.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div> 
                <div class="card">
                    <form action="{{ route('doctor-schedules.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Jadwal Dokter</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Doctor</label>
                                <select class="form-control selectric @error('doctor_id') is-invalid @enderror"
                                    name="doctor_id">
                                    <option value="">Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Senin</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="time" class="form-control" name="senin_start" placeholder="Mulai">
                                    </div>
                                    <div class="col">
                                        <input type="time" class="form-control" name="senin_end" placeholder="Selesai">
                                    </div>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label>Jadwal Selasa</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="time" class="form-control" name="selasa_start" placeholder="Mulai">
                                    </div>
                                    <div class="col">
                                        <input type="time" class="form-control" name="selasa_end" placeholder="Selesai">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Rabu</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="time" class="form-control" name="rabu_start" placeholder="Mulai">
                                    </div>
                                    <div class="col">
                                        <input type="time" class="form-control" name="rabu_end" placeholder="Selesai">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Kamis</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="time" class="form-control" name="kamis_start" placeholder="Mulai">
                                    </div>
                                    <div class="col">
                                        <input type="time" class="form-control" name="kamis_end" placeholder="Selesai">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Jumat</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="time" class="form-control" name="jumat_start" placeholder="Mulai">
                                    </div>
                                    <div class="col">
                                        <input type="time" class="form-control" name="jumat_end" placeholder="Selesai">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Sabtu</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="time" class="form-control" name="sabtu_start" placeholder="Mulai">
                                    </div>
                                    <div class="col">
                                        <input type="time" class="form-control" name="sabtu_end" placeholder="Selesai">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Minggu</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="time" class="form-control" name="minggu_start" placeholder="Mulai">
                                    </div>
                                    <div class="col">
                                        <input type="time" class="form-control" name="minggu_end" placeholder="Selesai">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush