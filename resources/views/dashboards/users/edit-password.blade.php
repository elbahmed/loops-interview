@extends('layouts.dashboard')

@section('title', 'New Password')
@section('pageTitle', 'New Password')
@section('endpoint', '/users/edit-password/' . $result->id)

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="/users">User</a></li>
<li class="breadcrumb-item active"><a href="/users/edit-password/{{ $result->id }}">New Password</a></li>
@endsection

@section('content')
<div class="col-md-12 px-5">
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>New Password</h3>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, perspiciatis, porro maxime numquam quibusdam doloribus repudiandae minus quae sunt asperiores ex perferendis, possimus a natus illo praesentium. Deleniti, quia minima.</p>
                </div>
            </div>
        </div>
    </div>
    <form id="users__form">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" data-anchor="data-anchor" id="users__card">New Password</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="mb-3">
                    <label class="form-label" for="users__password">Password Lama</label>
                    <input type="password" class="form-control" id="users__old-password" name="old_password">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="users__password">Password Baru</label>
                    <input type="password" class="form-control" id="users__password" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="users__password-confirmation">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="users__password-confirmation" name="password_confirmation">
                </div>
            </div>
            <div class="card-footer bg-light">
                <div class="row flex-end-center g-0">
                    <div class="col-auto">
                        <button id="users__btn" class="btn btn-outline-primary" type="button">
                            <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('style')
@endsection

@section('script')
<script>
    $('#users__btn').on('click', function(e) {
        e.preventDefault();

        $("#users__form").parsley().validate();

        if ($("#users__form").parsley().isValid()) {
            var data = $("#users__form").serialize();

            sendPut('/users/edit-password/{{ $result->id }}', data);
        }
    });
</script>
@endsection
