@extends('layouts.admin')

@section('content')



<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Edit Slider
                    <a href="{{ url('admin/sliders/') }}" class="btn btn-info float-end rounded-pill">Back</a>
                </h4>
            </div>
            <div class="card-body">
               <form action="{{url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT');
                <div class="mb-3">
                    <label>Title </label>
                    <input type="text" name="title" value="{{$slider->title}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{$slider->description}}</textarea>
                </div>

                <div class="mb-3">
                    <label>Image </label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{asset("$slider->image")}}" style="width:100px;height:50px;" alt="sliderimg">
                </div>


                <div>
                    <label>Status </label> <br/>
                    Hide :<input type="checkbox" name="status" {{$slider->status == '1' ? 'checked' : ''}} class="mb-3"/>
                </div>
                <button type="submit" class="btn btn-success text-white">Update</button>

               </form>



            </div>
        </div>
    </div>
</div>
@endsection
