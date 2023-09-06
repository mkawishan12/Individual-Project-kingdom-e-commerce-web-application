@extends('layouts.admin')

@section('content')



<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Size List
                    <a href="{{ url('admin/colors/create') }}" class="btn btn-info float-end rounded-pill">Add Size</a>
                </h4>
            </div>
            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Size Name</th>
                            <th>Size Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colors as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->status == 1 ? 'Not Available' :'Available'}}</td>
                            <td>
                                <a href="{{url('admin/colors/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{url('admin/colors/'.$item->id.'/delete')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
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
