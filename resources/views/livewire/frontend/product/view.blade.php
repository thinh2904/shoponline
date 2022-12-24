<div>
    <div class="py-3 py-md-5">
        <div class="container">
        
            <div class="row">
                <div class="col-md-5 mt-3 col-12">
                    <div class="bg-white border" wire:ignore>
                        @if($product->productImages)
                            <!-- <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img"> -->
                            <div class="exzoom" id="exzoom">
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @foreach ($product->productImages as $itemImg)
                                            <li><img style="width:100%" src="{{ asset($itemImg->image) }}"/></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="fa-solid fa-caret-left"></i> </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="fa-solid fa-caret-right"></i> </a>
                                </p>
                            </div>
                        @else
                            No Image
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3 col-12">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Trang chủ / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            @if($product->selling_price == $product->original_price)
                                <span class="selling-price">{{ number_format($product->selling_price,0,",",".") }} ₫</span>
                            @else
                                <span class="selling-price">{{ number_format($product->selling_price,0,",",".") }} ₫</span>
                                <span class="original-price">{{ number_format($product->original_price,0,",",".") }} ₫</span>
                            @endif
                        </div>
                        <div>
                            @if($product->productColors->count() > 0)
                                @if($product->productColors)
                                    @foreach($product->productColors as $colorItem)
                                        <!-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}"> {{ $colorItem->color->name }} <span style="margin-right: 10px;"></span> -->
                                        <label class="colorSelectionLabel" style="background-color: {{$colorItem->color->code}}"
                                            wire:click="colorSelected({{ $colorItem->id }})"
                                            >
                                            {{ $colorItem->color->name }}
                                        </label>
                                    @endforeach
                                @endif

                                <div>                                 
                                    @if($this->prodColorSelectedQuantity == 'outOfStock')
                                        <label class="btn-sm py-1 mt-2 text-white bg-danger">Đã Hết Hàng</label>
                                    @elseif($this->prodColorSelectedQuantity >0 )
                                        <label class="btn-sm py-1 mt-2 text-white bg-success">Còn Hàng</label>
                                    @endif
                                </div>

                            @else

                                @if($product->quantity > 0)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">Còn Hàng</label>
                                @else
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Đã Hết Hàng</label>
                                @endif

                            @endif


                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="indecrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">

                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                <i class="fa fa-shopping-cart"></i> Thêm vào Giỏ Hàng
                            </button>



                            <button type="button" wire:click="addToWishList({{ $product->id }})" href="" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Thêm vào Danh sách Yêu thích
                                </span>
                                <span wire:loading wire:target="addToWishList">Thêm...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Mô tả sản phẩm</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Chi tiết sản phẩm</h4>
                        </div>
                        <div class="card-body">
                            <p>
                            {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>Sản phẩm 
                        @if($category) {{ $category->name }}@endif
                        tương tự
                    </h3>
                    <div class="underline bg-dark"></div>
                </div>
                @forelse ($category->relatedProducts->take(4) as $relatedProductItem)
                    <div class="col-md-3 mb-3">
                        <div class="product-card">
                            <div class="product-card-img">        
                                @if ($relatedProductItem->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                        <img src="{{ asset($relatedProductItem->productImages[0]->image) }}" alt="{{ $relatedProductItem->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $relatedProductItem->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}">
                                        {{ $relatedProductItem->name }}
                                    </a>
                                </h5>
                                <div>
                                    @if($relatedProductItem->selling_price == $relatedProductItem->original_price)
                                        <span class="selling-price">{{ number_format($relatedProductItem->selling_price,0,",",".") }} ₫</span>
                                    @else
                                        <span class="selling-price">{{ number_format($relatedProductItem->selling_price,0,",",".") }} ₫</span>
                                        <span class="original-price">{{ number_format($relatedProductItem->original_price,0,",",".") }} ₫</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4>No Products Available</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>

@push('scripts')

    <script>
        $(function(){

            $("#exzoom").exzoom({
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                "autoPlay": false,
                "autoPlayTimeout": 2000          
            });

        });
    </script>

@endpush