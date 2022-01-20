@extends('layouts.base-raw')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 row">
                    <h1>Order Details</h1>

                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        @endif
        <div class="row">

            <div class="col-md-12">
                <h5 >Billing Details</h5>
            </div>
            <div class="clearfix col-md-6">
                <h6>Order No. : {{$serviceBooking->order_no}}</h6>
 
                <h6>Payment Method: Cash</h6>
                <h6>Amount Payable: {{$serviceBooking->amount_payble}} (PKR)</h6>
                <h6>Payment Received By: {{$serviceBooking->order_status=='completed'?ucfirst($serviceBooking->bookingDetail->provider_name):'Job is not done yet'}}</h6>
                @if(Auth::user()->utype === 'SVP')
                <form method="POST" action="{{route('orders.update')}}">
                <lable>Order Status:</lable>
                @csrf
                @if($serviceBooking->order_status=='Pending')
                <select class="form-control" name="order_status" onchange="this.form.submit()" id="myselect">
                <option value="1" selected disabled>Pending</option>
                <option value="2">Approved</option>
                <option value="5">Rejected</option>
                @elseif($serviceBooking->order_status=='Approved')
                <select class="form-control" name="order_status" onchange="this.form.submit()" id="myselect">
                <option value="2" selected disabled>Approved</option>

                <option value="3">Inprogress</option>
                <option value="5">Rejected</option>
                </select>

                @elseif($serviceBooking->order_status=='Inprogress')
                <select class="form-control" name="order_status" onchange="this.form.submit()" id="myselect">

                <option value="4">Completed</option>
                <option value="5">Rejected</option>
                </select>

                @elseif($serviceBooking->order_status=='Rejected')
                <span>{{ucfirst($serviceBooking->order_status)}}</span>
                @else
                <span>{{ucfirst($serviceBooking->order_status)}}</span>
                @endif
                </select>
                        <!-- <button class="btn btn-primary btn-sm" ><i class="fa fa-arrow-left" aria-hidden="true"> Update</i></button> -->
                        <input type="hidden" class="form-control" name="order_id" value="{{$serviceBooking->id}}">

                </form>
                @else
                <h6>Order Status: {{ucfirst($serviceBooking->order_status)}}</h6>
                @endif
            </div>

            <div class="clearfix col-md-6">
                <h6>User Name : {{ucfirst($serviceBooking->bookingDetail->user_name)}}</h6>
                <h6>House No. : {{ucfirst($serviceBooking->bookingDetail->house_no)}}</h6>
                <h6>Block: {{ucfirst($serviceBooking->bookingDetail->block)}}</h6>
                <h6>Area: {{ucfirst($serviceBooking->bookingDetail->area)}}</h6>
                <h6>City: {{ucfirst($serviceBooking->bookingDetail->city)}}</h6>
            </div>
        </div>
       <br>
        <div class="card">
            <div class="card-body p-0">
            <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Service Name</th>
                                                <th>Qty.</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>G.Total</th>
                                                <th>Service Provider</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>{{$serviceBooking->bookingDetail->service_name}}</td>
                                                    <td>{{$serviceBooking->bookingDetail->service_qty}}</td>
                                                    <td>{{$serviceBooking->bookingDetail->price}}</td>
                                                    
                                                    <td>{{$serviceBooking->bookingDetail->dicount}}</td>
                                                    <td>{{$serviceBooking->amount_payble}}</td>
                                                    <td>{{$serviceBooking->bookingDetail->provider_name}}</td>
                                                </tr>
                                        </tbody>
                    </table> 

                <div class="card-footer clearfix">
                    <div class="float-right">
                        <button class="btn btn-primary btn-sm" onclick="window.history.back();"><i class="fa fa-arrow-left" aria-hidden="true"> Go Back</i></button>
                    </div>
                </div>
            </div>            
        </div>

    </div>

@endsection
