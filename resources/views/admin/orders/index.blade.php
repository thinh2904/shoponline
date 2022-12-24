@extends('layouts.admin')

@section('title', 'Quản Lý Đơn Hàng')

@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h3>Thông Tin Các Đơn Hàng</h3>
            </div>
            <div class="card-body">
    
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label style="margin-bottom: 10px;">Lọc Theo Ngày</label>
                            <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label style="margin-bottom: 10px;">Tình Trạng Đơn Hàng</label>
                            <select name="status" class="form-select">
                                <option value="">Tất cả đơn hàng</option>
                                <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }} >Đang xử lý</option>
                                <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }} >Đã giao</option>
                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >Chưa xử lý</option>
                                <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }} >Đã hủy</option>
                                <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }} >Đang giao hàng</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button style="margin-top: 30px;" type="submit" class="btn btn-primary">Lọc</button>
                        </div>
                    </div>
                </form>
                <hr>
    
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Mã Vận Chuyển</th>
                                <th>Tên Khách Hàng</th>
                                <th>Phương Thức Thanh Toán</th>
                                <th>Ngày Đặt</th>
                                <th>Trạng Thái Đơn Hàng</th>
                                <th>Tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tracking_no }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->payment_mode }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        @if($item->status_message == 'in progress')
                                            Đang xử lý
                                        @elseif($item->status_message == 'out-for-delivery')
                                            Đang giao hàng
                                        @elseif($item->status_message == 'cancelled')
                                            Đã hủy
                                        @elseif($item->status_message == 'completed')
                                            Đã giao
                                        @elseif($item->status_message == 'peding')
                                            Chưa giải quyết
                                        @endif
                                    </td>
                                    <td><a href="{{ url('admin/orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Không có đơn hàng nào</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <!-- Sử dụng trang khi có method get -->
                        {{ $orders->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection