@extends('layouts.app')

@section('title', 'Faculties')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Faculty</h1>
                {{-- <div class="section-header-button">
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Faculty</a></div>
                    <div class="breadcrumb-item">All Faculty</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Faculty</h2>
                <p class="section-lead">
                    You can manage all Faculty, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Faculty</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('faculties.index') }}">
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
                                            <th>Address</th>
                                            <th>Description</th>
                                            <th>Dean</th>
                                            <th>Total Departments</th>
                                            <th>Logo</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($faculties as $faculty)
                                            <tr>

                                                <td>{{ $faculty->name }}
                                                </td>
                                                <td>
                                                    {{ $faculty->address }}
                                                </td>
                                                <td>
                                                    {{ $faculty->description }}
                                                </td>
                                                <td>
                                                    {{ $faculty->dean }}
                                                </td>
                                                <td>
                                                    {{ $faculty->departments->count() }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset('storage/faculties/' . $faculty->img_logo) }}" alt="logo" style="width: 50px; height: 50px" />
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('faculties.edit', $faculty->id) }}'
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
                                    {{ $faculties->withQueryString()->links() }}
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
