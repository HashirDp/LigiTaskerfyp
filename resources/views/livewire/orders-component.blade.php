@extends('layouts.base-raw')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders History</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        @endif
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-body p-0">
            <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>order #</th>
                                                <th>Service Name</th>
                                                <th>Discount</th>
                                                <th>G.Total</th>
                                                <th>Service Provider</th>
                                                <th>Order Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(sizeof($serviceBookings)>0)
                                            @foreach($serviceBookings as $order)
                                                <tr>
                                                    <td>{{$order->order_no}}</td>
                                                    <td>{{$order->bookingDetail->service_name}}</td>
                                                    <td>{{$order->bookingDetail->dicount}}</td>
                                                    <td>{{$order->amount_payble}}</td>
                                                    <td>{{$order->bookingDetail->provider_name}}</td>
                                                    <td>{{$order->order_status}}</td>
                                                    <td>{{$order->created_at}}</td>
                                                    <td>
                                                        @if(Auth::user()->utype === 'SVP')
                                                            <a href="{{route('orders.view',['order_id'=>$order->id])}}"><i class="fa fa-eye  text-info"> View </i></a>
                                                            <a href="{{route('orders.edit',['order_id'=>$order->id])}}"><i class="fa fa-edit  text-info"> Edit </i></a>
                                                        @else
                                                            <a href="{{route('customers.orders.view',['order_id'=>$order->id])}}"><i class="fa fa-eye  text-info"> View Details</i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan=8 style="text-align:center">
                                                    No record found!
                                                </td>
                                            </tr>

                                            @endif
                                        </tbody>
                    </table> 

                <div class="card-footer clearfix">
                    <div class="float-right">
                         {{$serviceBookings->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
