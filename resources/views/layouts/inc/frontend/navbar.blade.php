<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar bg-dark">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <a href="{{ url('/') }}" style="text-decoration: none;">
                        <h5 class="brand-name text-center">{{ $appSetting->website_name ?? 'Shop Hentai' }}</h5>
                    </a>
                </div>
                <div class="col-md-5 my-auto">
                    <form action="{{ url('search') }}" method="GET" role="search">
                        <div class="input-group">
                            <input type="search" name="search" value="{{ Request::get('search') }}" placeholder="Tìm kiếm sản phẩm" class="form-control" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('cart') }}">
                                <i class="fa fa-shopping-cart"></i> Giỏ Hàng <sup>(<livewire:frontend.cart.cart-count />)</sup>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('wishlist') }}">
                                <i class="fa fa-heart"></i> Yêu Thích <sup>(<livewire:frontend.wishlist-count />)</sup>
                            </a>
                        </li>
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng Nhập') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng Ký') }}</a>
                            </li>
                        @endif
                        @else                  
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('profile')}}"><i class="fa fa-user"></i> Thông Tin Cá Nhân</a></li>
                                <li><a class="dropdown-item" href="{{url('orders')}}"><i class="fa fa-list"></i> Đơn Hàng</a></li>
                                <li><a class="dropdown-item" href="{{url('wishlist')}}"><i class="fa fa-heart"></i> Danh Sách Yêu Thích</a></li>
                                <li><a class="dropdown-item" href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                <!-- <img style="width:50px;height:50px" src="https://hentaiz.in/wp-content/themes/ztube/assets/images/icon.png" alt=""> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <img class="navbar-toggler-icon" style="width:50px;height:50px" src="https://hentaiz.in/wp-content/themes/ztube/assets/images/icon.png" alt="">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections') }}">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/new-arrivals') }}">Hàng Mới Về</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/featured-products') }}">Sản Phẩm Nổi Bật</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
