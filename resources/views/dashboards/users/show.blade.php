@extends('layouts.dashboard')

@section('title', 'Show')
@section('pageTitle', 'Show')
@section('endpoint', '/users')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="/users">User</a></li>
<li class="breadcrumb-item active"><a href="/users">Show</a></li>
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
                    <p class="mb-0"><strong>Email: </strong>{{ $result->email }}</p>
                    <p class="mb-0"><strong>Nomer Telpon: </strong>+62 {{ $result->phone_number }}</p>
                    <p class="mb-0"><strong>Membership: </strong>{{ $result->package->name }} {!! strtotime(date_add(date_create($result->payment_at), date_interval_create_from_date_string($result->package->active_period))) >= now() ? '<span class="badge rounded-pill badge-soft-success">Active</span>' : '<span class="badge rounded-pill badge-soft-danger">Expired</span>' !!}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div>
                <p class="m-1">
                    <a href="/users/edit/{{ $result->id }}" class="float-right btn btn-success">Edit</a>
                    <a href="/users/edit-password/{{ $result->id }}" class="float-right btn btn-warning">Edit Password</a>
                    <a href="/users/{{ $result->id }}" class="float-right btn btn-danger _delete">Delete</a>
                </p>
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
