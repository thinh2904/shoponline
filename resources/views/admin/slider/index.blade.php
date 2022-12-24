@section('title','Silder')

@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Danh sách Slider
                    <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Thêm Slider
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($sliders as $slider)
                            <tr>
                                <td width="5%">{{ $slider->id }}</td>
                                <td width="20%">{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td width="10%">
                                    <!-- {{ $slider->image }} -->
                                    <img src="{{ asset("$slider->image") }}" style="width: 70px; height:70px" alt="Slider">
                                </td>
                                <td width="10%">{{ $slider->status == '0' ? 'Visible':'Hidden'}}</td>
                                <td width="20%">
                                    <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-success">Chỉnh sửa</a>
                                    <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" 
                                    onclick="return confirm('May muon xoa dung khong?');"
                                    class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection