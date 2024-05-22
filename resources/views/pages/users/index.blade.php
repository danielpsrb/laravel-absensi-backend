@extends('layouts.app')

@section('title', 'Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>
                <div class="section-header-button">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add New</a>
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
                <h2 class="section-title">Users</h2>
                <p class="section-lead">
                    You can manage all Users, such as editing, deleting and more.
                </p>
                <div class="row mt-4">
                    <div class="col-15">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
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
                                    <table class="table-striped table-hover table">
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">NIM</th>
                                            <th class="text-center">Program Studi</th>
                                            <th>NIP</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <span>
                                                        {{ $user->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-light text-dark">
                                                        {{ $user->nim }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-primary">
                                                        {{ $user->study_program }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $user->nip }}
                                                </td>
                                                <td>
                                                    @if ($user->role === 'admin' || $user->role === 'staff admin')
                                                        <span class="badge badge-warning">Admin</span>
                                                    @elseif($user->role === 'user')
                                                        <span class="badge badge-success">User</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('users.edit', $user->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                            method="POST" class="ml-2 confirm-delete">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-sm btn-danger btn-icon">
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
                                    {{ $users->withQueryString()->links() }}
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

    <!-- SweetAlert JS -->
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Menggunakan event handler 'submit' untuk form dengan kelas 'confirm-delete'
            $('.confirm-delete').submit(function(event) {
                // Mencegah form submit default
                event.preventDefault();

                // Menyimpan referensi form yang diklik
                var form = $(this);

                // Menampilkan SweetAlert untuk konfirmasi penghapusan
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    // Jika pengguna mengkonfirmasi penghapusan
                    if (result.isConfirmed) {
                        // Submit form
                        form.unbind('submit').submit();
                    }
                });
            });
        });
    </script>
@endpush
