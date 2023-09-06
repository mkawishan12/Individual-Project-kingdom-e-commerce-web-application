@extends('layouts.app')
@section('title', 'Home page')
@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">


    <div class="carousel-inner">
        @foreach ($sliders as $key=> $slideritem)
      <div class="carousel-item {{$key== 0 ? 'active':''}}">
        @if($slideritem->image)
        <img src="{{asset("$slideritem->image")}}" class="d-block w-100" alt="...">
        @endif
        <div class="carousel-caption d-none d-md-block">
            <div class="custom-carousel-content">
                <h1>
                    {!!$slideritem->title!!}
                </h1>
                <p>
                    {!!$slideritem->description!!}
                </p>
                <div>
                    <a href="#" class="btn btn-slider">
                        Get Now
                    </a>
                </div>
            </div>
        </div>


    </div>
      @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3>Welcome to Kingdom Mens Fashion</h3>
                <div class="underline"></div>
                <p></p>
            </div>
        </div>
    </div>
  </div>

  <div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline"></div>
            </div>


            @if ($trendingProducts)
        <div class="col-md-12">




                    <div class="owl-carousel owl-theme trending-product">
                        @foreach ($trendingProducts as $productitem)


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
                                        <span class="selling-price">{{$productitem->selling_price}}</span>
                                        <span class="original-price">{{$productitem->original_price}}</span>
                                    </div>

                                </div>
                            </div>


                            @endforeach
                        </div>
                    </div>

                    @else

                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No products available</h4>
                        </div>
                    </div>
                    @endif

        </div>

            </div>
        </div>
    </div>
  </div>


@endsection

@section('script')

  <script>
    $('.trending-product').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
    })
  </script>

@endsection
