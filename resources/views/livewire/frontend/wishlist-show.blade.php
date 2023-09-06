{{-- header --}}
<!-- Bootstrap Static Header -->
{{-- <div style="background: url(https://bootstrapious.com/i/snippets/sn-static-header/background.jpg)" class="jumbotron bg-cover text-white">
    <div class="container py-5 text-center">
        <h1 class="display-4 font-weight-bold">Wishlist</h1>
        <p class="font-italic mb-0">Using simple jumbotron-style component, create a nice Bootstrap 4 header with a background image.</p>
        <p class="font-italic">Snippe by
            <a href="https://bootstrapious.com" class="text-white">
                <u>Bootstrapious</u>
            </a>
        </p>
        <a href="#" role="button" class="btn btn-primary px-5">See All Features</a>
    </div>
</div> --}}


{{-- header end --}}
<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">


            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif


            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">


                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>

                            </div>
                        </div>


                    @forelse ($wishlist as $wishlistitem)

                         @if ($wishlistitem->product)


                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="{{url('collections/'.$wishlistitem->product->category->slug.'/'.$wishlistitem->product->slug)}}">
                                            <label class="product-name">
                                                <img src="{{$wishlistitem->product->productImages[0]->image}}" style="width: 50px; height: 50px" alt="{{$wishlistitem->product->name}}">
                                            {{$wishlistitem->product->name}}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">Rs.{{$wishlistitem->product->selling_price}}</label>
                                    </div>
                                    <div class="col-md-4 col-12 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:click="removewishlistItem({{$wishlistitem->id}})" class="btn btn-danger btn-sm float-end">
                                                <span wire:loading.remove wire:target="removewishlistItem({{$wishlistitem->id}})">
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>
                                                <span wire:loading wire:target="removewishlistItem({{$wishlistitem->id}})">
                                                    <i class="fa fa-spinner"></i>Removing
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @empty
                        <h4>No item added for wishlist</h4>
                    @endforelse

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
