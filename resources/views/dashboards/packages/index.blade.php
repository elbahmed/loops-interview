@extends('layouts.dashboard')

@section('title', 'Index')
@section('pageTitle', 'Index')
@section('endpoint', '/packages')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
<li class="breadcrumb-item active"><a href="/packages">Package</a></li>
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

    <div class="card mb-3">
        <div class="card-header">
            <div>
                <p class="m-1">
                    <a href="/packages/create" class="float-right btn btn-success">Add</a>
                </p>
            </div>
        </div>
        <div class="card-body">
            <div id="packages__table">
                <div class="table-responsive scrollbar">
                    <table class="table table-striped">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th style="width: 10px; text-align: center">#</th>
                                <th>Name</th>
                                <th>Masa Aktif</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 0)
                            @foreach ($results as $result)
                                <tr>
                                    <td style="width: 10px; text-align: center">{{ ++$i }}</td>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->active_period }} Bulan</td>
                                    <td>Rp {{ number_format($result->price, 2, ',', '.') }}</td>
                                    <td>{{ $result->users_count }} Member</td>
                                    <td class="text-end">
                                        <div>
                                            <a class="btn p-0" href="/packages/{{ $result->id }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"><span class="text-500 fas fa-eye"></span></a>
                                            <a class="btn p-0 ms-2" href="/packages/edit/{{ $result->id }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="text-500 fas fa-edit"></span></a>
                                            <a class="btn p-0 ms-2 _delete" href="/packages/{{ $result->id }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></a>
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
