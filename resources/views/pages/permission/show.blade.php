@extends('layouts.app')

@section('title', 'Permission Detail')

@push('style')
<!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">

    <!-- magnific-popup css cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Permission Detail</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Permission Detail</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Permission Detail</h2>
                <p class="section-lead">
                    Informasi tentang detail izin mahasiswa.
                </p>
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
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
                                        <p>{{ $permission->user->department->name }}</p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Fakultas</label>
                                        <p>{{ $permission->user->faculty->name }}</p>
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
                                        <label>Bukti Pendukung Izin</label>
                                        <div class="gallery">
                                            <div class="image-container">
                                                @if ($permission->image)
                                                    <a href="{{ asset('storage/permissions/' . $permission->image) }}">
                                                        <img src="{{ asset('storage/permissions/' . $permission->image) }}" alt="Bukti Dukung" class="img-thumbnail mb-3" style="max-width: 200px">
                                                    </a>
                                                @else
                                                    <p class="badge badge-info">Tidak ada bukti pendukung</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <p>
                                                @if ($permission->status == 'approved')
                                                    Approved
                                                @elseif ($permission->status == 'rejected')
                                                    Not Approved
                                                @else
                                                    Pending Approval
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary">Edit
                                    Permission For Approve</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Images Bukti izin -->

    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

    <!-- magnific popup js cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.gallery').magnificPopup({
                delegate:'a',
                type:'image',
                gallery:{
                    enabled:true
                }
            });
        });
    </script>
@endpush
