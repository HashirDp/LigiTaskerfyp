<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="section-title">
                <h2>All Services</h2>
                 </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-6">
                                            @if(Auth::user()->utype=='SVP')
                                            <a href="{{route('/sprovider/add_service')}}" class="btn btn-info pull-right">Add New</a>
                                            @else
                                            <a href="{{route('/admin/add_service')}}" class=""></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Price</th>

                                                <th>Category</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($services as $service)
                                                <tr>
                                                    <td>{{$service->id}}</td>
                                                    <td><img src="{{asset('images/services/thumbnails')}}/{{$service->thumbnail}}"   height="60" /> </td>
                                                    <td>{{$service->name}}</td>
                                                    <td>{{$service->price}}</td>

                                                    <td>{{$service->category->name}}</td>
                                                    <td>{{$service->created_at}}</td>
                                                    <td>
                                                    @if(Auth::user()->utype=='SVP')
                                                        <a href="{{route('/sprovider/edit_service',['service_slug'=>$service->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                                    @else
                                                        <a href="{{route('/admin/edit_service',['service_slug'=>$service->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                                    @endif
                                                        <a href="#" onclick="confirm('Are you sure, you want to delete this service?') || event.stopImmediatePropagation()" style="margin-left:10px;" wire:click.prevent="deleteService({{$service->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$services->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @livewireScripts
</div>
