@extends('layouts.auth')

@section('title', 'Login')
@section('pageTitle', 'Login')
@section('endpoint', '/login')

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
                        <h5>Login</h5>
                    </div>
                    <div class="col-auto fs--1 text-600">
                        <span class="mb-0 undefined">or</span>
                        <span><a href="/register">Create an account</a></span>
                    </div>
                </div>
                <form id="login__form">
                    <div class="mb-3">
                        <label class="form-label" for="login__email">Email</label>
                        <input type="email" class="form-control" id="login__email" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="login__password">Password</label>
                        <input type="password" class="form-control" id="login__password" name="password">
                    </div>
                    <div class="mb-3">
                        <button id="login__btn" class="btn btn-primary d-block w-100 mt-3" type="button">Log in</button>
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
    $('#login__btn').on('click', function(e) {
        e.preventDefault();

        $("#login__form").parsley().validate();

        if ($("#login__form").parsley().isValid()) {
            var data = $("#login__form").serialize();

            sendPost('/login', data);
        }
    });
</script>
@endsection
