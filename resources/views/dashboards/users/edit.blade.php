@extends('layouts.dashboard')

@section('title', 'Edit')
@section('pageTitle', 'Edit')
@section('endpoint', '/users/edit')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="/users">User</a></li>
<li class="breadcrumb-item active"><a href="/users/edit">Edit</a></li>
@endsection

@section('content')
<div class="col-md-12 px-5">
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>User</h3>
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
                        <h5 class="mb-0" data-anchor="data-anchor" id="users__card">User</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="mb-3">
                    <label class="form-label" for="users__name">Nama</label>
                    <input type="text" class="form-control" id="users__name" name="name" value="{{ $result->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="users__email">Email</label>
                    <input type="email" class="form-control" id="users__email" name="email" value="{{ $result->email }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="users__phone-number">Nommer Telpon</label>
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input type="text" class="form-control" id="users__phone-number" name="phone_number" value="{{ $result->phone_number }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="transaction__package_id">Membership</label>
                    <select class="form-select js-choice" id="transaction__package_id" size="1" name="package_id" data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option value="">Select Membership...</option>
                        @foreach ($packages as $package)
                            @if ($package->id == $result->package->id)
                                <option selected value="{{ $package->id }}">{{ $package->name }} (Rp {{ number_format($package->price, 2, ',', '.') }})</option>
                            @else
                                <option value="{{ $package->id }}">{{ $package->name }} (Rp {{ number_format($package->price, 2, ',', '.') }})</option>
                            @endif
                        @endforeach
                    </select>
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

            sendPut('/users/{{ $result->id }}', data);
        }
    });
</script>
@endsection
