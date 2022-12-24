<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class View extends Component
{

    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId;

    public function addToWishList($productId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Đã thêm vào sản phẩm yêu thích');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Đã thêm vào sản phẩm yêu thích',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message','Đã thêm vào sản phẩm yêu thích');
                session()->flash('message','Please Login');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Đã thêm vào sản phẩm yêu thích',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
        else
        {
            session()->flash('message','Vui lòng Đăng nhập');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Vui lòng Đăng nhập',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        // dd($productColorId);
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function indecrementQuantity()
    {
        if ($this->quantityCount < 10){
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if(Auth::check())
        {
            // dd($productId);
            if($this->product->where('id',$productId)->where('status','0')->exists())
            {
                // Check for Product color Quantity and add to cart
                if($this->product->productColors()->count() > 0)
                {
                    if($this->prodColorSelectedQuantity != NULL)
                    {
                        if(Cart::where('user_id',auth()->user()->id)
                                ->where('product_id', $productId)
                                ->where('product_color_id', $this->productColorId)
                                ->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Bạn đã đặt sản phẩm này vào giỏ hàng rồi',
                                'type' => 'success',
                                'status' => 200
                            ]);
                        }
                        else
                        {
                            $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                            if($productColor->quantity > 0)
                            {
                                if($productColor->quantity >= $this->quantityCount)
                                {
                                    // Insert Product to Cart
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);

                                    $this->emit('CartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Đã thêm vào giỏ hàng',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                }
                                else
                                {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Chỉ còn có '.$productColor->quantity.' sản phẩm tại cửa hàng',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            }else{
    
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Đã hết hàng',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Vui lòng chọn màu của sản phẩm',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }
                else
                {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id', $productId)->exists())
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Bạn đã đặt sản phẩm này vào giỏ hàng rồi',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }
                    else
                    {
                        if($this->product->quantity > 0)
                        {
                            if($this->product->quantity >= $this->quantityCount)
                            {
                                // Insert Product to Cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);

                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Đã thêm vào giỏ hàng',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Chỉ còn có '.$this->product->quantity.' sản phẩm tại cửa hàng',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Đã hết hàng',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Sản phẩm không tồn tại',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Vui lòng đăng nhập để thêm vào giỏ hàng',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
