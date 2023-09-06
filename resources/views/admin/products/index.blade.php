@extends('layouts.admin')

@section('content')



<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Products
                    <a href="{{ url('admin/products/create') }}" class="btn btn-info float-end rounded-pill">Add products</a>
                </h4>
            </div>
            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Original Price</th>
                            <th>Selling Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    @if($product->category)
                                    {{$product->category->name}}
                                    @else
                                    No Category
                                    @endif

                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->original_price}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->status == '1' ? 'Not Available':'Available'}}</td>
                                <td>
                                    <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('admin/products/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No Products Available</td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
