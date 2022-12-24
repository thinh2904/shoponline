<div>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h4 class="text-primary">Sản Phẩm Yêu Thích</h4>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Sản Phẩm</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Giá</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Xóa sản phẩm</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($wishlist as $wishlistItem)
                            @if ($wishlistItem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">
                                                <label class="product-name">
                                                    <img src="{{ $wishlistItem->product->productImages[0]->image }}" 
                                                        style="width: 50px; height: 50px"
                                                         alt="{{ $wishlistItem->product->name }}">
                                                    {{ $wishlistItem->product->name }}
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">{{ number_format($wishlistItem->product->selling_price,0,",",".") }} ₫</label>
                                        </div>

                                        <div class="col-md-4 col-12 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:click="removeWishlistItem({{ $wishlistItem->id }})" href="" class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                        <i class="fa fa-trash"></i> Xóa
                                                    </span>
                                                    <span wire:loading wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                        <i class="fa fa-trash"></i> Đang Xóa
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h4>Không có sản phẩm yêu thích nào <a style="text-decoration: none;" href="{{url('collections')}}">Mua Ngay</a></h4>
                        @endforelse

                </div>
            </div>

        </div>
    </div>
</div>