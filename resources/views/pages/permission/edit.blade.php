@extends('layouts.app')

@section('title', 'Edit Permission')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Permission</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Permission</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Edit Permission</h2>
                <p class="section-lead">
                    Perbarui informasi tentang izin karyawan.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Mahasiswa</label>
                                            <p>{{ $permission->user->name }}</p>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>NIM Mahasiswa</label>
                                            <p>{{ $permission->user->nim }}</p>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-6 col-12">
                                            <label>Program Studi</label>
                                            <p>{{ $permission->user->study_program }}</p>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Fakultas</label>
                                            <p>{{ $permission->user->faculty }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Date Permission</label>
                                            <p>{{ $permission->date_permission }}</p>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Reason</label>
                                            <p>{{ $permission->reason }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Bukti Dukung</label>
                                            <p>
                                                @if ($permission->image)
                                                    <img src="{{ asset('storage/permission/' . $permission->image) }}"
                                                        alt="Bukti Dukung" style="max-width: 100%; height: auto;">
                                                @else
                                                    Tidak ada bukti dukung
                                                @endif
                                            </p>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Status</label>
                                            <select name="status" class="form-control" style="height: 40px;">
                                                <option value="approved" {{ $permission->status ? 'selected' : '' }}>
                                                    Disetujui
                                                </option>
                                                <option value="rejected" {{ !$permission->status ? 'selected' : '' }}>
                                                    Tidak Disetujui
                                                </option>
                                                <option value="pending" {{ $permission->status === 'pending' ? 'selected' : '' }}>
                                                    Pending
                                                </option>
                                            </select>
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
