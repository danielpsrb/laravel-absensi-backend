@extends('layouts.app')

@section('title', 'Students')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Students</h1>
                <div class="section-header-button">
                    <a href="{{ route('students.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">All Users</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Mahasiswa</h2>
                <p class="section-lead">
                    Anda dapat mengelola semua data Mahasiswa, seperti mengedit, menghapus, dan menambahkan data Mahasiswa baru.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Mahasiswa</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('users.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
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

                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>NIM</th>
                                            <th>Faculty</th>
                                            <th>Study Program</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($students as $student)
                                            <tr>

                                                <td>
                                                    @if ($student->photo_url)
                                                        <img alt="image" src="{{ Storage::url('public/students/' . $student->photo_url) }}"
                                                            width="40" alt="photo_student">
                                                    @else
                                                        <img alt="image" src="{{ asset('img/avatar/students.png') }}"
                                                            width="40" alt="avatar">
                                                    @endif
                                                </td>
                                                <td>{{ $student->name }}</td>
                                                <td>
                                                    <span class="badge badge-light text-dark">
                                                        {{ $student->nim }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $student->faculty->name }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-primary">
                                                        {{ $student->department->name }}
                                                    </span>
                                                </td>
                                                {{-- <td>{{ $student->created_at }}</td> --}}
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('students.edit', $student->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="{{route('students.destroy', $student->id )}}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $students->withQueryString()->links() }}
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
