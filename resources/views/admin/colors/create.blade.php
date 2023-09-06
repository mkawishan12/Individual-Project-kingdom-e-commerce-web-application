@extends('layouts.admin')

@section('content')



<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Add Size
                    <a href="{{ url('admin/colors') }}" class="btn btn-info float-end rounded-pill">Back</a>
                </h4>
            </div>
            <div class="card-body">
               <form action="{{url('admin/colors/create')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Size Name </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Size Code </label>
                    <input type="text" name="code" class="form-control">
                </div>
                <div>
                    <label>Status </label> <br/>
                    <input type="checkbox" name="status"/>
                </div>
                <button type="submit" class="btn btn-success">Add</button>

               </form>



            </div>
        </div>
    </div>
</div>
@endsection
