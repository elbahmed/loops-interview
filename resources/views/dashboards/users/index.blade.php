@extends('layouts.dashboard')

@section('title', 'Index')
@section('pageTitle', 'Index')
@section('endpoint', '/users')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
<li class="breadcrumb-item active"><a href="/users">User</a></li>
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

    <div class="card mb-3">
        <div class="card-header">
            <div>
                <p class="m-1">
                    <a href="/users/create" class="float-right btn btn-success">Add</a>
                </p>
            </div>
        </div>
        <div class="card-body">
            <div id="users__table">
                <div class="table-responsive scrollbar">
                    <table class="table table-striped">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th style="width: 10px; text-align: center">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Nomer Telpon</th>
                                <th>Membership</th>
                                <th>Status Pembayaran</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 0)
                            @foreach ($results as $result)
                                <tr>
                                    <td style="width: 10px; text-align: center">{{ ++$i }}</td>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->email }}</td>
                                    <td>+62 {{ $result->phone_number }}</td>
                                    @if (!$result->package_id)
                                        <td>Bukan Member</td>
                                    @elseif (!$result->is_member)
                                        <td>Belum Membayar</td>
                                    @else
                                        <td>{{ $result->package->name }} {!! $result->is_active ? '<span class="badge rounded-pill badge-soft-success">Active</span>' : '<span class="badge rounded-pill badge-soft-danger">Expired</span>' !!}</td>
                                    @endif
                                    @if (!$result->package_id)
                                        <td>Bukan Member</td>
                                    @elseif (!$result->is_member)
                                        <td><a class="float-right btn btn-sm btn-success _post-btn" href="/users/confirm-payment/{{ $result->id }}">Konfirmasi Pembayaran</a></td>
                                    @elseif(!$result->is_active)
                                        <td><a class="float-right btn btn-sm btn-warning _post-btn" href="/users/notify-payment/{{ $result->id }}">Notifikasi Pembayaran</a></td>
                                    @else
                                        <td>Active</td>
                                    @endif
                                    <td class="text-end">
                                        <div>
                                            <a class="btn p-0" href="/users/{{ $result->id }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"><span class="text-500 fas fa-eye"></span></a>
                                            <a class="btn p-0 ms-2" href="/users/edit/{{ $result->id }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="text-500 fas fa-edit"></span></a>
                                            <a class="btn p-0 ms-2 _delete" href="/users/{{ $result->id }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
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
