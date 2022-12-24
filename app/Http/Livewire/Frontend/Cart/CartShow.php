<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;
    
    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->productColor()->where('id',$cartData->product_color_id)->exists()){

                $productColor = $cartData->productColor()->where('id',$cartData->product_color_id)->first();
                if($cartData->quantity < 10){
                    if($productColor->quantity > $cartData->quantity){
    
                        $cartData->increment('quantity');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Đã cập nhật số lượng',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }else{
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Chỉ còn có '.$productColor->quantity. ' sản phẩm tại cửa hàng',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }
                }
            }else{
                if($cartData->quantity < 10){                    
                    if($cartData->product->quantity > $cartData->quantity){
    
                        $cartData->increment('quantity');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Cập nhật số lượng thành công',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }else{
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Chỉ còn có '.$cartData->product->quantity. ' sản phẩm tại cửa hàng',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }         
                }
            }

        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Có gì đó sai sai',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->productColor()->where('id',$cartData->product_color_id)->exists()){

                $productColor = $cartData->productColor()->where('id',$cartData->product_color_id)->first();
                if($cartData->quantity > 1){
                    if($productColor->quantity >= $cartData->quantity){
    
                        $cartData->decrement('quantity');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Đã cập nhật lại số lượng',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }else{
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Chỉ còn có '.$productColor->quantity.' sản phẩn tại cửa hàng',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }
                }
            }else{
                if($cartData->quantity > 1){
                    if($cartData->product->quantity > $cartData->quantity){
    
                        $cartData->decrement('quantity');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Đã cập nhật lại số lượng',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }else{
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Chỉ còn có '.$cartData->product->quantity. ' sản phẩm tại cửa hàng',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }         
                }
            }

        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Có gì đó sai sai',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id',auth()->user()->id)->where('id',$cartId)->first();
        if($cartRemoveData){
            $cartRemoveData->delete();
            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã xóa sản phẩm khỏi giỏ hàng',
                'type' => 'success',
                'status' => 200
            ]);
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Có gì đó sai sai',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cart' => $this->cart
        ]);
    }
}
