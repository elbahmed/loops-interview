@extends('layouts.dashboard')

@section('title', 'Show')
@section('pageTitle', 'Show')
@section('endpoint', '/packages')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="/packages">Package</a></li>
<li class="breadcrumb-item active"><a href="/packages">Show</a></li>
@endsection

@section('content')
<div class="col-md-12 px-5">
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>#{{ $result->id }} | {{ $result->name }}</h3>
                    <p class="mb-0"><strong>Masa Aktif: </strong> {{ $result->active_period }} Bulan</p>
                    <p class="mb-0"><strong>Harga: </strong> Rp {{ number_format($result->price, 2, ',', '.') }}</p>
                    <p class="mb-0"><strong>Jumlah: </strong>{{ $result->users_count }} Member</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
@endsection

@section('script')
<script>
</script>
@endsection
