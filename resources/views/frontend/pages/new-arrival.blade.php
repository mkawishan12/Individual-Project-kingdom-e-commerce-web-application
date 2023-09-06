@extends('layouts.app')
@section('title', 'New Arrivals')
@section('content')

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>New Arrival Products</h4>
                <div class="underline"></div>
            </div>








            @forelse ($newArrivalProducts as $productitem)
                <div class="col-md-3">


                            <div class="product-card">
                                <div class="product-card-img">
                                    <label class="stock bg-info">New</label>

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

                        <div class="col-md-12 p-2">
                            <h4>No products available</h4>
                        </div>

             @endforelse





        </div>

            </div>
        </div>
    </div>
  </div>

@endsection
