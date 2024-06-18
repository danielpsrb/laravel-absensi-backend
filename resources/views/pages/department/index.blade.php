@extends('layouts.app')

@section('title', 'Study Programs')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Study Program</h1>
                {{-- <div class="section-header-button">
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i> Home</a></div>
                    <div class="breadcrumb-item"><a href="#"><i class="fas fa-graduation-cap"></i> Study Program</a></div>
                    <div class="breadcrumb-item"><i class="fas fa-list"></i> Data</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Study Programs</h2>
                <p class="section-lead">
                    You can manage all study program, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Study Program</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('departments.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by name" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Fakultas</th>
                                            <th>Koordinator</th>
                                            <th>Kepala Jurusan</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($departments as $department)
                                            <tr>

                                                <td>{{ $department->name }}
                                                </td>
                                                <td>
                                                    {{ $department->description }}
                                                </td>
                                                <td>
                                                    {{ $department->faculty->name }}
                                                </td>
                                                <td>
                                                    {{ $department->coordinator }}
                                                </td>
                                                <td>
                                                    {{ $department->hod }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='#'
                                                            class="btn btn-sm btn-info btn-icon" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="#"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete" title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $departments->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
