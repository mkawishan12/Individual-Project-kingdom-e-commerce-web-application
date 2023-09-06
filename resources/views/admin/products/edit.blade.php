@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>

          </svg>

          <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
              {{session('message')}}
            </div>
          </div>

        @endif
        <div class="card">
            <div class="card-header">
                <h4>Edit Products
                    <a href="{{ url('admin/products') }}" class="btn btn-info float-end rounded-pill">Back</a>
                </h4>
            </div>
            <div class="card-body">


                @if($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        Home
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                        SEO tags
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                        Details
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                          Images
                      </button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane" type="button" role="tab">
                          Sizes
                      </button>
                      </li>

                  </ul>
                  <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Category</label>
                                <select name="category_id" class="form-control">

                                @foreach ($categories as $category)


                                <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' :''}} >
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                            </div>

                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control"/>
                            </div>

                            <div class="mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" value="{{ $product->slug }}" class="form-control"/>
                            </div>

                            <div class="mb-3">
                                <label>Select brand</label>
                                <select name="brand" class="form-control">
                                @foreach ($brands as $brand)


                                <option value="{{$brand->name}}" {{$brand->name == $product->brand ? 'selected' :''}} >
                                    {{$brand->name}}
                                </option>
                                @endforeach
                            </select>
                            </div>

                            <div class="mb-3">
                                <label>Small Description</label>
                                <textarea name="small_description"  class="form-control" rows="4">{{ $product->small_description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">

                            <div class="mb-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control"/>
                            </div>

                            <div class="mb-3">
                                <label>Meta Keywords</label>
                                <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description}}</textarea>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="text" name="original_price" value="{{ $product->original_price }}" class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending status</label>
                                        <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked':'' }}/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Availability status</label>
                                        <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked':'' }}/>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                           <div class="mb-3">
                            <label>
                                Upload Product Images
                            </label>
                            <input type="file" name="image[]" multiple class="form-control">
                           </div>
                           <div>
                            @if ($product->productImages)
                            <div class="row">
                                @foreach ($product->productImages as $image)
                                <div class="col-md-2">
                                    <img src="{{asset($image->image)}}" style="width:100px;height:100px;" class="me-4 border" alt="Img">
                                     <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                </div>
                                @endforeach
                            </div>




                            @else
                            <h5>No Images Added</h5>
                            @endif
                           </div>
                        </div>

                        <div class="tab-pane fade border p-3" id="colors-tab-pane" role="tabpanel" tabindex="0">
                            <div class="mb-3">
                                <h4>Add product colors</h4>
                                <label>
                                    Select Colours
                                </label>
                                <div class="row">
                                   @forelse ($colors as $coloritem)
                                   <div class="col-md-3">
                                       <div class="p-2 border mb-3">
                                       <input type="checkbox" name="colors[{{ $coloritem->id}}]" value=" {{ $coloritem->id}}"/>
                                       {{ $coloritem->name}}
                                       <br>
                                       Quantity : <input type="number" name="colorquantity[{{ $coloritem->id}}]">
                                   </div>
                                   </div>
                                   @empty
                                       <div class="col-md-12">
                                           <h4>No colours found</h4>
                                       </div>
                                   @endforelse

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Quantity</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->productColors as $pcolor)


                                        <tr class="product-color-tr">
                                            <td>
                                                @if($pcolor->color)
                                                {{$pcolor->color->name}}
                                                @else
                                                Color was deleted recently
                                                @endif
                                            </td>
                                            <td>
                                                <div class="input-group mb-3" style="width:150px">
                                                    <input type="number" value="{{$pcolor->quantity}}" class="productClrQuantity form-control form-control-sm">
                                                    <button type="button" value="{{$pcolor->id}}" class="updateProductColorBtn btn btn-success btn-sm text-white">Update</button>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" value="{{$pcolor->id}}" class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>

                  </div>
                  <div class="py-2 float-end">
                      <button type="submit" class="btn btn-primary text-white">Update</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
   $(document).ready(function () {

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).on('click','.updateProductColorBtn', function () {
        var product_id ="{{$product->id}}";
        var product_color_id = $(this).val();
        var qty=$(this).closest('.product-color-tr').find('.productClrQuantity').val();
        //alert(product_color_id);

        if(qty<=0){
            alert('Quantity is required')
            return false;
        }
        var data = {
            'product_id':product_id,

            'qty':qty
        };

        $.ajax({
            type: "POST",
            url: "/admin/product-color/"+product_color_id,
            data: data,
            success: function (response) {
                alert(response.message)
            }
        });
    });
    $(document).on('click','.deleteProductColorBtn', function (){
        var product_color_id = $(this).val();
        var thisClick=$(this);
        $.ajax({
            type: "GET",
            url: "/admin/product-color/"+product_color_id+"/delete",

            success: function (response) {
                thisClick.closest('.product-color-tr').remove();
                alert(response.message);

            }
        });
    });

   });
</script>
@endsection
