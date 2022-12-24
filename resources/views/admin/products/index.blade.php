@extends('layouts.admin')

@section('title','Tất cả sản phẩm')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card-header">
            <h3>Tất Cả Sản Phẩm
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">
                    Thêm Sản Phẩm
                </a>
            </h3>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Danh Mục</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Trạng Thái</th>
                            <th>Tùy Chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if($product->category)
                                    {{ $product->category->name }}
                                @else
                                    No Category
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->status == '1' ? 'Ẩn':'Đang bán' }}</td>
                            <td>
                                <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-sm btn-success">Chỉnh Sửa</a>
                                <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('A Dou Sua Ờ Bao Dát?')" class="btn btn-sm btn-danger">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7"><img src="https://isuckhoe.net/wp-content/uploads/2021/06/isuckhoe_bmngqdr.jpg" style="width: 300px;height:300px;border-radius:0;" alt=""></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection