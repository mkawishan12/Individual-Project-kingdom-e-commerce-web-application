<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)

            <div class="card">
                <div class="card-header"><h4>Brands</h4></div>
                <div class="card-body">
                    @foreach ($category->brands as $brandItem)

                    <div class="form-check form-switch">
                    <label class="form-check-label" for="flexSwitchCheckDefault">
{{-- custom --}}
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" wire:model="brandInputs" value="{{$brandItem->name}}"/>{{$brandItem->name}}
                    </label>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="card mt-3">
                <div class="card-header"><h4>Price </h4></div>
                <div class="card-body">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
                        <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
                      </svg>

                    <div class="wrapper">



                        <input type="radio" style="display:none;" name="priceSort" wire:model="priceInput" value="high-to-low" id="option-1" checked>
                        <input type="radio" style="display:none;" name="priceSort" wire:model="priceInput" value="low-to-high" id="option-2">
                          <label for="option-1" class="option option-1">
                            <div class="dot"></div>
                             <span>High</span>
                             </label>
                          <label for="option-2" class="option option-2">
                            <div class="dot"></div>
                             <span>Low</span>
                          </label>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-9">

                    <div class="row">
                        @forelse ($products as $productitem)


                        <div class="col-md-4">
                            <div class="product-card">
                                <div class="product-card-img">
                                    @if($productitem->quantity>0)
                                    <label class="stock bg-success">In Stock</label>
                                    @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                    @endif
                                    @if ($productitem->productImages->count()>0)
                                    <a href="{{url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)}}">
                                    <img src="{{asset($productitem->productImages[0]->image)}}" alt="{{$productitem->name}}">
                                    </a>
                                    @endif

                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{$productitem->brand}}</p>
                                    <h5 class="product-name">
                                    <a href="{{url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)}}">
                                            {{$productitem->name}}
                                    </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">Rs. {{$productitem->selling_price}}</span>
                                        <span class="original-price">Rs. {{$productitem->original_price}}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <div class="p-2">
                                <h4>No products available for {{$category->name}}</h4>
                            </div>
                        </div>
                        @endforelse
                    </div>

        </div>
    </div>
</div>
