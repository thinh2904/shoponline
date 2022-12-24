@extends('layouts.app')

@section('title', 'Đơn Hàng Của Tôi')

@section('content')

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">

                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-primary"></i> Chi Tiết Đơn Hàng
                        <a href="{{ url('orders') }}" class="btn btn-danger btn-sm float-end">Quay Lại</a>
                    </h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Thông Tin Đơn Hàng</h5>
                            <hr>
                            <h6>Mã Đơn: {{ $order->id }}</h6>
                            <h6>Mã Vận Chuyển: {{ $order->tracking_no }}</h6>
                            <h6>Ngày Đặt Hàng: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                            <h6>Phương Thức Thanh Toán: {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">
                                Trạng Thái Đơn Hàng: <span class="text-upperscase">
                                    @if($order->status_message == 'in progress')
                                        Đang xử lý
                                    @elseif($order->status_message == 'out-for-delivery')
                                        Đang giao hàng
                                    @elseif($order->status_message == 'cancelled')
                                        Đã hủy
                                    @elseif($order->status_message == 'completed')
                                        Đã giao
                                    @elseif($order->status_message == 'peding')
                                        Chưa giải quyết
                                    @endif
                                </span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>Thông Tin Khách Hàng</h5>
                            <hr>
                            <h6>Họ Tên: {{ $order->fullname }}</h6>
                            <h6>Địa Chỉ Email: {{ $order->email }}</h6>
                            <h6>Số Điện Thoại: {{ $order->phone }}</h6>
                            <h6>Địa Chỉ Nhà: {{ $order->address }}</h6>
                            <h6>Mã Pin: {{ $order->pincode }}</h6>
                        </div>
                    </div>

                    <br>
                    <h5>Sản Phẩm Trong Đơn</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã SP</th>
                                    <th>Ảnh</th>
                                    <th>Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($order->orderItems as $orderItem)
                                <tr>
                                    <td width="10%">{{ $orderItem->id }}</td>
                                    <td width="10%">
                                        @if($orderItem->product->productImages)
                                            <img src="{{ asset($orderItem->product->productImages[0]->image) }}" 
                                                style="width: 50px; height: 50px" alt="">
                                        @else
                                            <img src="" style="width: 50px; height: 50px" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $orderItem->product->name }}
                                        @if ($orderItem->productColor)
                                            @if ($orderItem->productColor->color)
                                                <span>- Màu: {{ $orderItem->productColor->color->name }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td width="10%">{{ number_format($orderItem->price,0,",",".") }} ₫</td>
                                    <td width="10%">{{ $orderItem->quantity }}</td>
                                    <td width="10%" class="fw-bold">{{ number_format($orderItem->quantity * $orderItem->price,0,",",".") }} ₫</td>
                                    @php
                                        $totalPrice += $orderItem->quantity * $orderItem->price;
                                    @endphp
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="fw-bold">Tổng Tiền Của Đơn Hàng:</td>
                                    <td colspan="1" class="fw-bold">{{ number_format($totalPrice,0,",",".") }} ₫</td>
                                </tr>
                            </tbody>
                        </table>                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection