@extends('layouts.admin')
@section('title', 'Orders')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Orders
                </h4>
            </div>
                <div class="card-body">

                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Filter by date:</label>
                                <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label>Filter by status:</label>
                                <select name="status" class="form-select">
                                    <option value="">-- All --</option>
                                    <option value="in progress"{{Request::get('status')=='in progress' ?'selected':''}}>In Progress</option>
                                    <option value="completed"{{Request::get('status')=='completed' ?'selected':''}}>Completed</option>
                                    <option value="pending"{{Request::get('status')=='pending' ?'selected':''}}>Pending</option>
                                    <option value="cancelled"{{Request::get('status')=='cancelled' ?'selected':''}}>Cancelled</option>
                                    <option value="out-for-delivery"{{Request::get('status')=='out-for-delivery' ?'selected':''}}>Out for delivery</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <br/>
                                <button type="submit" class="btn btn-primary text-white">Filter</button>
                            </div>

                        </div>
                    </form>
                    <hr>



                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Tracking No</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Ordered Date</th>
                                    <th>Status message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($orders as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->tracking_no}}</td>
                                        <td>{{$item->fullname}}</td>
                                        <td>{{$item->payment_mode}}</td>
                                        <td>{{$item->created_at->format("d-m-Y")}}</td>
                                        <td>{{$item->status_message}}</td>
                                        <td><a href="{{url('admin/orders/'.$item->id)}}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No orders to show</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                        <div>
                            {{$orders->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
