@extends('layouts.app')

@section('title', 'Profile')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, {{ auth()->user()->name}}</h2>
                <p class="section-lead">
                    Change information about yourself on this page.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img
                                    alt="image"
                                    src="{{ asset('storage/profiles/' . $user->image_url) }}"
                                    class="rounded-circle profile-widget-picture"
                                >
                                <input type="file" id="avatar" name="image_url" style="display: none;" accept="image/*">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Posts</div>
                                        <div class="profile-widget-item-value">187</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Followers</div>
                                        <div class="profile-widget-item-value">6,8K</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Following</div>
                                        <div class="profile-widget-item-value">2,1K</div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <label>Name</label>
                                <div class="profile-widget-name">{{ auth()->user()->name}}
                                    <div class="text-muted d-inline font-weight-normal"></div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <label>Email</label>
                                <div class="profile-widget-name">{{ auth()->user()->email}}
                                    <div class="text-muted d-inline font-weight-normal"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card profile-widget">
                            <div class="profile-widget-item">
                                <div class="profile-widget-description">
                                    <h5>Delete Account</h5>
                                    <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
                                    <button class="btn btn-danger">Delete account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <form method="POST"
                                action="{{ route('profile.update') }}"
                                class="needs-validation"
                                novalidate=""
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="name">Name</label>
                                            <input type="text"
                                                id="name"
                                                name="name"
                                                class="form-control"
                                                value="{{auth()->user()->name}}"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the Name
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="email">Email</label>
                                            <input
                                                type="text"
                                                id="email"
                                                name="email"
                                                class="form-control"
                                                value="{{auth()->user()->email}}"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Profile Picture</label>
                                            <div class="avatar-upload">
                                                <div>
                                                    <input
                                                        type="file"
                                                        id="imageProfile"
                                                        name="photo"
                                                        accept=".png, .jpg, .jpeg"
                                                        onchange="previewImage(this)"
                                                    >
                                                    <label for="imageProfile"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-left">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="POST"
                                enctype="multipart/form-data"
                                action="{{ route('profile.change-password') }}"
                                class="needs-validation"
                                novalidate="">
                                @csrf
                                <div class="card-header">
                                    <h4>Update Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="current_pwd">Current Password</label>
                                            <input type="password"
                                                id="current_pwd"
                                                class="form-control"
                                                name="current_pwd"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the current password
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="new_pwd">New Password</label>
                                            <input
                                                id="new_pwd"
                                                name="new_pwd"
                                                type="password"
                                                class="form-control pwstrength @error('password') is-invalid @enderror"
                                                data-indicator="pwindicato"
                                            >
                                            @error('password')
                                                <div class="alert alert-danger mt-2">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="confirm_pwd">Confirm Password</label>
                                            <input
                                                id="confirm_pwd"
                                                type="password"
                                                class="form-control"
                                                name="confirm_pwd"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the confirm password
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-left">
                                    <button class="btn btn-primary">Save</button>
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
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

    <!-- Page Specific JS File -->
    <script type="text/javascript">
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(700);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush

<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
    }

    .avatar-upload .avatar-preview {
        width: 67%;
        height: 147px;
        position: relative;
        border-radius: 3%;
        border: 6px solid #F8F8F8;
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 3%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
