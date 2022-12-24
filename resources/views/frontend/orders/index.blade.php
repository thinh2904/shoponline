@extends('layouts.app')

@section('title', 'Đơn Hàng')

@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4"> Đơn Hàng </h4>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã Đơn</th>
                                        <th>Mã Vận Chuyển</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Phương Thức Thanh Toán</th>
                                        <th>Ngày Đặt</th>
                                        <th>Tình Trạng Đơn</th>
                                        <th>Chi Tiết</th>
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
                                                @elseif($item->status_message == 'completed')
                                                    Đã giao
                                                @elseif($item->status_message == 'cancelled')
                                                    Đã hủy
                                                @elseif($item->status_message == 'out-for-delivery')
                                                    Đang giao hàng
                                                @elseif($item->status_message == 'peding')
                                                    Chưa giải quyết
                                                @endif
                                            </td>
                                            <td><a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">Không có đơn hàng nào</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection