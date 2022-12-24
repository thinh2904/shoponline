<div>
    <div class="row">
        <div class="col-md-3">
            @if($category->brands)
            <div class="card">
                <div class="card-header">
                    <h4>Thương Hiệu</h4>
                </div>
                <div class="card-body">
                    @foreach ($category->brands as $brandItem)
                    <label class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}"> {{ $brandItem->name }}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="card mt-3">
                <div class="card-header"><h4>Mức Giá</h4></div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="high-to-low"> Từ Cao đến Thấp
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="low-to-high"> Từ Thấp đến Cao
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if($productItem->quantity > 0)
                            <label class="stock bg-success">Còn Hàng</label>
                            @else
                            <label class="stock bg-danger">Hết Hàng</label>
                            @endif

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
                                    <span class="selling-price">{{ number_format($productItem->selling_price,0,",",".") }} ₫</span>
                                @else
                                    <span class="selling-price">{{ number_format($productItem->selling_price,0,",",".") }} ₫</span>
                                    <span class="original-price">${{ number_format($productItem->original_price,0,",",".") }} ₫</span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Không còn hàng của {{ $category->name }}</h4>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>