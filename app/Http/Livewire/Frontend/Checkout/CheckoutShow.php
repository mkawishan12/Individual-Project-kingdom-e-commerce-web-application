<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use Livewire\Component;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount=0;
    public $fullname,$email,$phone,$zipcode,$address,$paymentMode=NULL,$paymentId=NULL;

    protected $listeners = [
        'validationForAll'
    ];

    public function validationForAll()
    {
        $this->validate();
    }

    public function rules()
    {
        return [

            'fullname'=>'required|string|max:150',
            'email'=>'required|email|max:150',
            'phone'=>'required|string|max:10|min:9',
            'zipcode'=>'required|string|max:5|min:5',
            'address'=>'required|string|max:350',
        ];

    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id'=>auth()->user()->id,
            'tracking_no'=>'kd-'.Str::random(10),
            'fullname'=>$this->fullname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'zipcode'=>$this->zipcode,
            'address'=>$this->address,
            'status_message'=>'in progress',
            'payment_mode'=>$this->paymentMode,
            'payment_id'=>$this->paymentId
        ]);

        foreach ($this->carts as $cartItem) {
            $orderItems = OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$cartItem->product_id,
                'product_color_id'=>$cartItem->product_color_id,
                'product_size_id'=>$cartItem->product_size_id,
                'quantity'=>$cartItem->quantity,
                'price'=>$cartItem->product->selling_price
            ]);

            if($cartItem->product_color_id != NULL){
                $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
                $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            }else{
                $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            }

        }
        return $order;


    }

    public function codOrder()
    {
        $this->paymentMode='Cash on delivery';
        $codOrder = $this->placeOrder();
        if($codOrder){

            Cart::where('user_id',auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount=0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }


    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show',[
            'totalProductAmount'=>$this->totalProductAmount
        ]);
    }
}
