@extends('layouts.app')

@section('title', 'Edit Doctor')

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
                <h1>Form Edit Doctor</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Doctors</a></div>
                    <div class="breadcrumb-item">Forms</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col">
                        <h2 class="section-title">Doctors</h2>
                    </div>
                    <div class="col text-right">
                        <div class="section-header-button">
                            <a href="{{ route('doctors.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div> 
                <div class="card">
                    <form action="{{ route('doctors.update', $doctor) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Data Dokter</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name" value="{{ $doctor->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Specialist</label>
                                <input type="text"
                                    class="form-control @error('specialist')
                                is-invalid
                            @enderror"
                                    name="specialist" value="{{ $doctor->specialist }}">
                                @error('specialist')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control @error('email')
                                is-invalid
                            @enderror"
                                    name="email" value="{{ $doctor->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>ID IHS</label>
                                <input type="text"
                                    class="form-control @error('id_ihs')
                                is-invalid
                            @enderror"
                                    name="id_ihs" value="{{ $doctor->id_ihs }}">
                                @error('id_ihs')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="number"
                                    class="form-control @error('nik')
                                is-invalid
                            @enderror"
                                    name="nik" value="{{ $doctor->nik }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>SIP</label>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control @error('sip')
                                is-invalid
                            @enderror"
                                        name="sip" value="{{ $doctor->sip }}">
                                </div>
                                @error('sip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" value="{{ $doctor->phone }}">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="{{ $doctor->address }}">
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file"
                                    class="form-control @error('photo')
                                is-invalid
                            @enderror"
                                    name="photo">
                                @error('photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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