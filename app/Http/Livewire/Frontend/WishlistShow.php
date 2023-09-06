<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public function removewishlistItem(int $wishlistId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id',$wishlistId)->delete();
        $this->emit('wishlistUpdateEvent'); //fireevent

        redirect('wishlist')->with('message','Item removed from the wishlist!');
        //session()->flash('message','Item removed from wishlist');
        // $this->dispatchBrowserEvent('message',[
        //     'text' => 'Item removed from wishlist',
        //     'type' => 'success',
        //     'status' => 200
        //  ]);




    }

    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlist' => $wishlist

        ]);
    }
}
