@extends('layouts.app')

@section('title', 'Edit Profil Perusahaan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">

    <style>
        .logo-upload {
            position: relative;
            max-width: 205px;
        }

        .logo-upload .logo-preview {
            width: 67%;
            height: 140px;
            position: relative;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin-top: 10px;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Profil Perusahaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Profil Perusahaan</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Edit Faculty</h2>
                <p class="section-lead">
                    Perbarui informasi tentang fakultas Anda di halaman ini.
                </p>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="POST" action="{{ route('faculties.update', $faculty->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Fakultas</label>
                                            <input type="text" name="name" class="form-control" value="{{ $faculty->name }}" disabled>
                                            <input type="hidden" name="name" value="{{ $faculty->name }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Alamat Fakultas</label>
                                            <input type="text" name="address" class="form-control" value="{{ $faculty->address }}" disabled>
                                            <input type="hidden" name="address" value="{{ $faculty->address }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Deskripsi Fakultas</label>
                                            <input type="text" name="description" class="form-control" value="{{ $faculty->description }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Dekan Fakultas</label>
                                            <input type="text" name="dean" class="form-control" value="{{ $faculty->dean }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Logo</label>
                                            <div class="logo-upload">
                                                <input type="file" class="form-control" name="logo" accept=".png, .jpg, .jpeg" onchange="previewLogo(this)">
                                                <div class="logo-preview" id="logoPreview" ></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Total Departments</label>
                                            <input type="number" name="departments_count" class="form-control" value="{{ $faculty->departments->count() }}" disabled>
                                            <input type="hidden" name="departments_count" value="{{ $faculty->departments->count() }}">
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
    <script type="text/javascript">
        function previewLogo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('logoPreview').style.backgroundImage = 'url(' + e.target.result + ')';
                    document.getElementById('logoPreview').style.display = 'none';
                    document.getElementById('logoPreview').style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
