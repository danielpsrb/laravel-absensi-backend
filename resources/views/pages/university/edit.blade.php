@extends('layouts.app')

@section('title', 'Edit Profil Universitas')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Profil Universitas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Profil Perusahaan</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Edit Profil Universitas</h2>
                <p class="section-lead">
                    Perbarui informasi tentang universitas Anda di halaman ini.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="POST" action="{{ route('universites.update', $university->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Universitas</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $university->name }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Email Universitas</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $university->email }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Alamat Universitas</label>
                                            <input type="text" name="address" class="form-control"
                                                value="{{ $university->address }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Telepon Universitas</label>
                                            <input type="tel" name="phone_number" class="form-control" value="{{ $university->phone_number }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Deskripsi Universitas</label>
                                            <input type="text" name="description" class="form-control" value="{{ $university->description }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Latitude</label>
                                            <input type="text" name="latitude" class="form-control"
                                                value="{{ $university->latitude }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Longitude</label>
                                            <input type="text" name="longitude" class="form-control"
                                                value="{{ $university->longitude }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Radius KM</label>
                                            <input type="number" step="0.01" name="radius_km" class="form-control"
                                                value="{{ $university->radius_km }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Waktu Masuk</label>
                                            <input type="time" name="time_in" class="form-control"
                                                value="{{ $university->time_in }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Waktu Pulang</label>
                                            <input type="time" name="time_out" class="form-control"
                                                value="{{ $university->time_out }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
