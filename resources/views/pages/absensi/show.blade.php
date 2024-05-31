@extends('layouts.app')

@section('title', 'Attendances')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Attendances</h1>
                {{-- <div class="section-header-button">
                    <a href="{{ route('attendances.create') }}" class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Attendances</a></div>
                    <div class="breadcrumb-item">All Attendances</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    {{-- <div class="col-12">
                        @include('layouts.alert')
                    </div> --}}
                </div>
                <h2 class="section-title">Attendances</h2>
                <p class="section-lead">
                    You can manage all Attendances, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('attendances.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by user name" name="name">
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
                                            <th>Data Tangal</th>
                                            <th>Time in</th>
                                            <th>Time out</th>
                                            <th class="text-center">Latlong in</th>
                                            <th class="text-center">Latlong out</th>

                                            <th>Action</th>
                                        </tr>
                                        @foreach ($attendances as $attendance)
                                            <tr>
                                                <td>
                                                    <span class="badge badge-light">
                                                        {{ $attendance->user->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light">
                                                        <i class="fas fa-calendar-alt"></i> {{ $attendance->date }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light">
                                                        <i class="fas fa-clock"></i> {{ $attendance->time_in }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light">
                                                        <i class="fas fa-clock"></i> {{ $attendance->time_out }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light">
                                                        <i class="fas fa-map-marker-alt"></i> {{ $attendance->latlon_in }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light">
                                                        <i class="fas fa-map-marker-alt"></i> {{ $attendance->latlon_out }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('attendances.edit', $attendance->id) }}'
                                                            class="btn btn-sm btn-info btn-icon" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="{{ route('attendances.destroy', $attendance->id) }}"
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
                                    {{ $attendances->withQueryString()->links() }}
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
