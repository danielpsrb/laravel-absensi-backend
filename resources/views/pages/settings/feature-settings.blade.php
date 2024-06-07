@extends('layouts.app')

@section('title', 'Settings')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Settings</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Settings</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Overview</h2>
                <p class="section-lead">
                    Organize and adjust all settings about this site.
                </p>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Two Factor Authentication</h4>
                            </div>
                            <div class="card-body">
                                @if (session('status') == "two-factor-authentication-disabled")
                                    <div class="alert alert-warning" role="alert">
                                        Two factor Authentication has been disabled.
                                    </div>
                                @endif

                                @if (session('status') == 'two-factor-authentication-enabled')
                                    <div class="alert alert-success" role="alert">
                                        Two factor Authentication has been enabled.
                                    </div>
                                @endif

                                <form method="POST" action="{{ auth()->user()->two_factor_secret ? route('two-factor.disable') : route('two-factor.enable') }}">
                                    @csrf
                                    @if (auth()->user()->two_factor_secret)
                                        @method('DELETE')
                                        <div class="pb-5">
                                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                        </div>
                                        <div>
                                            <h3>Recovery Codes:</h3>
                                            <ul>
                                                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                                    <li>{{ $code }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <button class="btn btn-danger">Disable</button>
                                    @else
                                        <button class="btn btn-primary">Enable</button>
                                    @endif
                                </form>
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

    <!-- Page Specific JS File -->
@endpush
