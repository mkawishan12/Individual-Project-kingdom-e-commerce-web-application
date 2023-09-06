@extends('layouts.admin')

@section('content')



<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Slider list
                    <a href="{{ url('admin/sliders/create') }}" class="btn btn-info float-end rounded-pill">Add Slider</a>
                </h4>
            </div>
            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($sliders as $slider)
                       <tr>
                        <td>{{$slider->id}}</td>
                        <td>{{$slider->title}}</td>
                        <td>{{$slider->description}}</td>
                        <td>
                            <img src="{{asset("$slider->image")}}" style="width:50px;height:50px;" alt="img">
                        </td>
                        <td>{{$slider->status == '1' ? 'Hidden' : 'Visible'}}</td>
                        <td>
                            <a href="{{url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-success btn-sm text-white">Edit</a>
                            <a href="{{url('admin/sliders/'.$slider->id.'/delete')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm text-white">Delete</a>

                        </td>
                       </tr>
                       @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
@endsection
