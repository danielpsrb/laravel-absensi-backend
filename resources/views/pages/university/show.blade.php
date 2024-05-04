@extends('layouts.app')

@section('title', 'Profile')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile Universitas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile Perusahaan</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Profil Universitas</h2>
                <p class="section-lead">
                    Informasi tentang universitas Anda.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Universitas</label>
                                        <p>{{ $university->name }}</p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Alamat Perusahaan</label>
                                        <p>{{ $university->address }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email Perusahaan</label>
                                        <p>{{ $university->email }}</p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nomor Telepon</label>
                                        <p>{{ $university->phone_number }}</p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Radius KM</label>
                                        <p>{{ $university->radius_km }} KM</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Latitude</label>
                                        <p>{{ $university->latitude }}</p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Longitude</label>
                                        <p>{{ $university->longitude }}</p>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-6 col-12">
                                        <label>Waktu Masuk</label>
                                        <p>{{ $university->time_in }}</p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Waktu Pulang</label>
                                        <p>{{ $university->time_out }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('universites.edit', $university->id) }}" class="btn btn-primary">Edit Profil
                                    Universitas</a>
                            </div>
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
