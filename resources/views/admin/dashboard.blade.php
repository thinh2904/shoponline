@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
        <h2 class="alert alert-success">{{ session('message') }}</h2>
        @endif
        <div class="me-md-3 me-xl-5">
            <h2>Dashboard</h2>
            <p class="mb-md-0">Bảng thống kê</p>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Tổng đơn hàng</label>
                    <h1>{{ $totalOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="text-white">Xem</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label>Số đơn hôm nay</label>
                    <h1>{{ $todayOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="text-white">Xem</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label>Tổng đơn tháng này</label>
                    <h1>{{ $thisMonthOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="text-white">Xem</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                    <label>Tổng đơn cả năm</label>
                    <h1>{{ $thisYearOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="text-white">Xem</a>
                </div>
            </div>
        </div>

</div>

@endsection