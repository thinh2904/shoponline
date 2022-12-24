@extends('layouts.app')

@section('title','Đổi mật khẩu')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('message'))
                    <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                @endif

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="card shadow">
                    <div class="card-header bg-dark">
                        <h4 class="mb-0 text-white">Đổi mật khẩu
                            <a href="{{ url('profile') }}" class="btn btn-light float-end">Quay lại</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('change-password') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Mật khẩu củ</label>
                                <input type="password" name="current_password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Mật khẩu mới</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                            <div class="mb-3 text-end">
                                <hr>
                                <button type="submit" class="btn btn-dark">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection