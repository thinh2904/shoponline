@extends('layouts.admin')

@section('title', 'Thông tin đơn hàng')

@section('content')
<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif

        <div class="card border mt-3">
            <div class="card-header">
                <h3 class="text-primary">
                    Thông Tin Của Đơn Hàng
                    <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1">Quay Lại</a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1">
                        Tải Hóa Đơn
                    </a>
                    <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">
                        Xem Hóa Đơn
                    </a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" class="btn btn-info btn-sm float-end mx-1">
                        Gửi Mail
                    </a>
                </h3>
            </div>
            <div class="card-body">    
                <div class="shadow bg-white p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Thông tin đơn hàng</h5>
                                <hr>
                                <h6>Mã đơn hàng: {{ $order->id }}</h6>
                                <h6>Mã vận chuyển: {{ $order->tracking_no }}</h6>
                                <h6>Ngày đặt: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6>Phương thức thanh toán: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Trạng thái đơn hàng: <span class="text-uppercase">
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
                                <h5>Thông tin khách hàng</h5>
                                <hr>
                                <h6>Họ và Tên: {{ $order->fullname }}</h6>
                                <h6>Email: {{ $order->email }}</h6>
                                <h6>Số điện thoại: {{ $order->phone }}</h6>
                                <h6>Địa chỉ: {{ $order->address }}</h6>
                                <h6>Mã PIN: {{ $order->pincode }}</h6>
                            </div>
                        </div>    
                        <br>
                        <h5>Thông tin sản phẩm</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td width="15%">{{ $orderItem->id }}</td>
                                        <td width="8%">
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
                                                    <span> - Màu: {{ $orderItem->productColor->color->name }}</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td width="12%">{{ number_format($orderItem->price,0,",",".") }} ₫</td>
                                        <td width="10%">{{ $orderItem->quantity }}</td>
                                        <td width="12%" class="fw-bold">{{ number_format($orderItem->quantity * $orderItem->price,0,",",".") }} ₫</td>
                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price;
                                        @endphp
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Tổng chi phí:</td>
                                        <td colspan="1" class="fw-bold">{{ number_format($totalPrice,0,",",".") }} ₫</td>
                                    </tr>
                                </tbody>
                            </table>                       
                        </div>    
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4>Quy trình đặt hàng (Cập nhật tình trạng đơn hàng)</h4>
                <hr>
                <div class="shadow bg-white p-2">
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
    
                                <label class="mb-2">Cập nhật đơn hàng</label>
                                <div class="input group">
                                    <select name="order_status" class="form-select">
                                        <option value="Chưa cập nhật">Chọn tình trạng đơn hàng</option>
                                        <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }} >Đang xử lý</option>
                                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }} >Đã giao hàng</option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >Chưa xử lý</option>
                                        <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }} >Hủy đơn hàng</option>
                                        <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }} >Chưa xử lý</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white mt-2">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h5 class="mt-3">Tình trạng đơn hàng hiện tại: <span class="text-uppercase">
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
                            </span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection