@extends('layouts.app')

@section('title', 'Thank You for Shopping')

@section('content')

    <div class="py pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(session('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif
                    
                    <div class="p-4 shadow bg-white">
                        <img src="https://i.pinimg.com/originals/29/2c/9a/292c9ac0467abb4652c13e923167adf0.png" alt="Thank You">
                        <h4>Cám ơn bạn đã mua hàng tại {{ $appSetting->website_name ?? 'Shop Hentai' }}</h4>
                        <a href="{{ url('collections') }}" class="btn btn-primary">Mua Tiếp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection