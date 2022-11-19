@extends('layouts.auth')

@section('title', 'Register')
@section('pageTitle', 'Register')
@section('endpoint', '/register')

@section('content')

<div class="row flex-center min-vh-100 py-6">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <a class="d-flex flex-center mb-4" href=""><img class="me-2" src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="" width="58" />
            <span class="font-sans-serif fw-bolder fs-5 d-inline-block">falcon</span>
        </a>
        <div class="card">
            <div class="card-body p-4 p-sm-5">
                <div class="row flex-between-center mb-2">
                    <div class="col-auto">
                        <h5>Register</h5>
                    </div>
                    <div class="col-auto fs--1 text-600">
                        <span class="mb-0 undefined">Have an account?</span>
                        <span><a href="/login">Login</a></span>
                    </div>
                </div>
                <form id="register__form">
                    <div class="mb-3">
                        <label class="form-label" for="register__name">Nama</label>
                        <input type="text" class="form-control" id="register__name" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="register__email">Email</label>
                        <input type="email" class="form-control" id="register__email" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="register__phone-number">Nomer Telpon</label>
                        <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="text" class="form-control" id="register__phone-number" name="phone_number">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="register__password">Password</label>
                        <input type="password" class="form-control" id="register__password" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="register__password-confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="register__password-confirmation" name="password_confirmation">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="transaction__package_id">Membership</label>
                        <select class="form-select js-choice" id="transaction__package_id" size="1" name="package_id" data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Select Membership...</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->name }} (Rp {{ number_format($package->price, 2, ',', '.') }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button id="register__btn" class="btn btn-primary d-block w-100 mt-3" type="button">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
@endsection

@section('script')
<script>
    $('#register__btn').on('click', function(e) {
        e.preventDefault();

        $("#register__form").parsley().validate();

        if ($("#register__form").parsley().isValid()) {
            var data = $("#register__form").serialize();

            sendPost('/register', data);
        }
    });
</script>
@endsection
