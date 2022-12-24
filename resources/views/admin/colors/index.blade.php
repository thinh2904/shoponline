@section('title','Danh sách màu')

@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Danh sách màu
                    <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Thêm màu
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên màu</th>
                            <th>Mã màu</th>
                            <th>Trạng thái</th>
                            <th>Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colors as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->status ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/colors/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                <a href="{{ url('admin/colors/'.$item->id.'/delete') }}" onclick="return confirm('May muon xoa khong?')" class="btn btn-danger btn-sm">Xóa</a>
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