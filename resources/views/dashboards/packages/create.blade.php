@extends('layouts.dashboard')

@section('title', 'Add')
@section('pageTitle', 'Add')
@section('endpoint', '/packages/create')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="/packages">Package</a></li>
<li class="breadcrumb-item active"><a href="/packages/create">Add</a></li>
@endsection

@section('content')
<div class="col-md-12 px-5">
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Package</h3>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, perspiciatis, porro maxime numquam quibusdam doloribus repudiandae minus quae sunt asperiores ex perferendis, possimus a natus illo praesentium. Deleniti, quia minima.</p>
                </div>
            </div>
        </div>
    </div>
    <form id="packages__form">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" data-anchor="data-anchor" id="packages__card">Package</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="mb-3">
                    <label class="form-label" for="packages__name">Nama</label>
                    <input type="text" class="form-control" id="packages__name" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="packages__active-period">Masa Aktif</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="packages__active-period" name="active_period" min="1" max="1000" value="1" aria-describedby="basic-addon2"><span class="input-group-text" id="basic-addon2">Bulan</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="packages__price">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="packages__price" name="price" min="1000" value="1000">
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light">
                <div class="row flex-end-center g-0">
                    <div class="col-auto">
                        <button id="packages__btn" class="btn btn-outline-primary" type="button">
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
    $('#packages__btn').on('click', function(e) {
        e.preventDefault();

        $("#packages__form").parsley().validate();

        if ($("#packages__form").parsley().isValid()) {
            var data = $("#packages__form").serialize();

            sendPost('/packages', data);
        }
    });
</script>
@endsection
