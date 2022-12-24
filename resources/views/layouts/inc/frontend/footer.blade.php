<div class="mt-5">
    <div class="footer-area bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{ $appSetting->website_name ?? 'Shop Hentai' }}</h4>
                    <div class="footer-underline"></div>
                    <p>
                    Bạn không thể chỉ hỏi khách hàng xem họ muốn gì và rồi cố đem nó cho họ. 
                    Tới lúc bạn hoàn thiện nó, họ đã muốn thứ mới mẻ khác rồi.
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trang chủ</a></div>
                    <div class="mb-2"><a href="{{ url('/about-us') }}" class="text-white">Về chúng tôi</a></div>
                    <div class="mb-2"><a href="{{ url('/contact-us') }}" class="text-white">Liên hệ</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="#" class="text-white">Chi nhánh</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Mua Ngay</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Danh mục sản phẩm</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Sản phẩm bán chạy</a></div>
                    <div class="mb-2"><a href="{{ url('/new-arrivals') }}" class="text-white">Hàng mới về</a></div>
                    <div class="mb-2"><a href="{{ url('/featured-products') }}" class="text-white">Sản phẩm nổi bật</a></div>
                    <div class="mb-2"><a href="{{ url('/cart') }}" class="text-white">Giỏ hàng</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Liên Lạc</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{ $appSetting->address ?? 'Shop Hentai' }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> +84 {{ $appSetting->phone1 ?? 'Shop Hentai' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $appSetting->mail1 ?? 'Shop Hentai' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2022 - {{ $appSetting->website_name ?? 'Shop Hentai' }} - Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media text-white">
                        Kết nối với Shop:
                        <!-- <a href="https://www.facebook.com/groups/346923913717647"><i class="fa fa-facebook"></i></a> -->
                        <a href="{{ $appSetting->facebook ?? 'Shop Hentai' }}"><i class="fa fa-facebook"></i></a>
                        <!-- <a href="https://twitter.com/hashtag/gaixinh?src=hashtag_click"><i class="fa fa-twitter"></i></a> -->
                        <a href="{{ $appSetting->twitter ?? 'Shop Hentai' }}"><i class="fa fa-twitter"></i></a>
                        <!-- <a href="https://www.instagram.com/nhagirlxinh/"><i class="fa fa-instagram"></i></a> -->
                        <a href="{{ $appSetting->instagram ?? 'Shop Hentai' }}"><i class="fa fa-instagram"></i></a>
                        <!-- <a href="https://www.youtube.com/@vitaminaothienthann9270"><i class="fa fa-youtube"></i></a> -->
                        <a href="{{ $appSetting->youtube ?? 'Shop Hentai' }}"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>