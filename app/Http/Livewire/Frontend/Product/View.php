<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;

class View extends Component
{
    public $category,$product ,$prodColorSelectedQuantity, $quantityCount=1, $productColorId;

    public function addToWishlist($productId)
    {
        if (Auth::check()) {

            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
            {
               // session()->flash('message','Already Added to wishlist');

                $this->dispatchBrowserEvent('message',[
                    'text' => 'Already Added to wishlist',
                    'type' => 'success',
                    'status' => 409
                 ]);

                return false;
            }

            else{
                         Wishlist::create([
                        'user_id'=>auth()->user()->id,
                        'product_id'=>$productId
                    ]);
                   // session()->flash('message','Successfully Added to the wishlist');
                   $this->dispatchBrowserEvent('message',[
                    'text' => 'Successfully Added to the wishlist',
                    'type' => 'success',
                    'status' => 200
            ]);

                }
        }
        else{

            //session()->flash('message','Please login to proceed');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Please login to proceed',
                'type' => 'error',
                'status' => 401
        ]);
            return false;
        }
    }


    public function colorSelected($productColorId)
    {
        //dd($productColorId);
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if ($this->prodColorSelectedQuantity==0) {
            $this->prodColorSelectedQuantity='outOfStock';
        }
    }

    public function incrementQuantity()
    {
        if( $this->quantityCount<10){

            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if( $this->quantityCount>1){

            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if(Auth::check())
        {
            //dd($productId);
            if($this->product->where('id',$productId)->where('status','0')->exists())
            {
                //check for product colours
                if($this->product->productColors()->count()>1)
                {
                    if($this->prodColorSelectedQuantity!=NULL)
                    {
                        if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId )->where('product_color_id',$this->productColorId )->exists())
                        {

                            $this->dispatchBrowserEvent('message',[
                                'text' => 'Product already added',
                                'type' => 'error',
                                'status' => 404
                                 ]);

                        }
                        else
                        {

                            $productColor= $this->product->productColors()->where('id',$this->productColorId)->first();
                            if($productColor->quantity>0)
                            {
                                if($productColor->quantity > $this->quantityCount)
                                {
                                    //insert product to cart with colours
                                    Cart::create([
                                        'user_id'=>auth()->user()->id,
                                        'product_id'=> $productId,
                                        'product_color_id'=>$this->productColorId,
                                        'quantity'=> $this->quantityCount
                                    ]);

                                    $this->emit('CartAddedUpdated');

                                    $this->dispatchBrowserEvent('message',[
                                        'text' => 'Product Added to cart',
                                        'type' => 'sucess',
                                        'status' => 200
                                    ]);

                                }
                                else
                                {
                                    $this->dispatchBrowserEvent('message',[
                                        'text' => 'Only'.$productColor->quantity.' items available',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Color out of stock',
                                    'type' => 'warning',
                                    'status' => 404
                                    ]);
                            }
                        }

                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message',[
                            'text' => 'Select the colour of product',
                            'type' => 'warning',
                            'status' => 404
                            ]);
                    }
                }
                else
                {


                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId )->exists()){

                            $this->dispatchBrowserEvent('message',[
                            'text' => 'Product already added',
                            'type' => 'error',
                            'status' => 404
                             ]);
                    }
                    else{


                        if($this->product->quantity>0)
                        {
                            if($this->product->quantity > $this->quantityCount)
                            {
                                //insert product to cart
                                Cart::create([
                                    'user_id'=>auth()->user()->id,
                                    'product_id'=> $productId,
                                    //'product_color_id'=>$this->productColorId,
                                    'quantity'=> $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');

                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Product Added to cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Only'.$this->product->quantity.' items available',
                                    'type' => 'warning',
                                    'status' => 404
                                    ]);
                            }
                        }

                        else
                        {
                            $this->dispatchBrowserEvent('message',[
                                'text' => 'Product is out of stocks',
                                'type' => 'warning',
                                'status' => 404
                                ]);
                        }
                    }

                }

            }
            else
            {

                $this->dispatchBrowserEvent('message',[
                    'text' => 'Product does not exist',
                    'type' => 'error',
                    'status' => 404
                     ]);
            }

        }
        else
        {
                $this->dispatchBrowserEvent('message',[
                'text' => 'Please login to proceed',
                'type' => 'error',
                'status' => 401
                 ]);
        }
    }

    public function mount($category,$product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category'=>$this->category,
            'product'=>$this->product
        ]);
    }
}
