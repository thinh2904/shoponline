@extends('layouts.app')
<style>
    .owl-nav {
        display: none;
    }
</style>

@section('title', 'Shop Hentai')

@section('content')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div class="carousel-inner">

        @foreach ($sliders as $key => $sliderItem)
            <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
                @if($sliderItem->image)
                    <img style="width:90%;height:auto" src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">
                @endif
                <!-- <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {!! $sliderItem->title !!}
                        </h1>
                        <p>
                            {!! $sliderItem->description !!}
                        </p>
                        <div>
                            <a href="{{'collections'}}" class="btn btn-slider">
                                Mua Ngay
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        @endforeach

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome to Shop Hentai</h4>
                    <div class="underline">
                    </div>
                    <p>
                        ??i???u ????ng s??? nh???t ?????i v???i m???i ng?????i l?? m???i ng??y th???c d???y. 
                        V?? nh???n ra trong cu???c s???ng m??nh kh??ng c?? ng?????i v?? ??i???u g?? ????? ch??? ?????i, c??? g???ng.
                    </p>
                    <p>V?? v???y h??y Mua H??ng ????? ch??? ?????i Shipper :))</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gi???i thi???u s???n ph???m -->
    <div class="gioithieu container mb-5">
        <div class="row">
            <div class="introduce-item col-md-4 col-12">
                <div class="d-flex justify-content-center">
                    <img class="w-100" src="{{ asset('uploads/images/1.jpg') }}" alt="image">
                </div>
                <p class="text-center">Qu???n Jean N??ng ?????ng Tr??? Trung</p>
                <h5 class="text-center">Qu???n Jean-r??ch N???</h5>
            </div>
            <div class="introduce-item col-md-4 col-12">
                <p class="text-center">Basic Tee</p>
                <h5 class="text-center">??o Thun Tay L???</h5>
                <div class="d-flex justify-content-center">
                    <img class="w-100" src="{{ asset('uploads/images/2.jpg') }}" alt="image">
                </div>
            </div>
            <div class="introduce-item col-md-4 col-12">
                <div class="d-flex justify-content-center">
                    <img class="w-100" src="{{ asset('uploads/images/3.jpg') }}" alt="image">
                </div>
                <p class="text-center">Trang Ph???c Try???n Th???ng K???t H???p Hi???n ?????o</p>
                <h5 class="text-center">V??y truy???n th???ng c??ch t??n</h5>
            </div>
        </div>
    </div>

    <!-- Video -->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">
            <div class="carousel-item active">
            <iframe frameborder="0" allowfullscreen="1"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                src="https://www.youtube.com/embed/XjiWmyPMRk4?controls=0&amp;rel=0&amp;playsinline=1&amp;enablejsapi=1&amp;origin=http%3A%2F%2Flocalhost&amp;widgetid=1&autoplay=1&mute=1"
                style="width: 100%; height: 700px;">
            </iframe>
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            <span class="text-danger">Nhanh Tay N??o</span>
                        </h1>
                        <p class="text-dark">
                            Nh???p M?? HENTAI20 ????? ???????c gi???m gi?? 20% cho ????n h??ng ?????u ti??n
                        </p>
                        <div>
                            <button href="#" class="btn btn-lg btn-outline-dark">
                                Mua Ngay
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- S???n ph???m n???i b???t -->
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>S???n Ph???m N???i B???t</h4>
                    <div class="underline mb-4"></div>
                </div>

                @if($trendingProducts)
                <div class="col-md-12">                 
                    <div class="owl-carousel owl-theme trending-product">
                        @foreach ($trendingProducts as $productItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-primary" style="font-size: 15px;">Trending</label>
                
                                        @if ($productItem->productImages->count() > 0)
                                            <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                                <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $productItem->brand }}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            @if($productItem->selling_price == $productItem->original_price)
                                                <span class="selling-price">{{ number_format($productItem->selling_price,0,",",".") }} ???</span>
                                            @else
                                                <span class="selling-price">{{ number_format($productItem->selling_price,0,",",".") }} ???</span>
                                                <span class="original-price">{{ number_format($productItem->original_price,0,",",".") }} ???</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Products Available</h4>
                    </div>
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

<script>
    $('.trending-product').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
</script>

@endsection