
<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02 col-md-12 col-lg-12 col-sm-12">
            <div class="container col-md-12 col-lg-12 col-sm-12">
                <h1><a href="{{route('home.service_categories')}}">Category of</a> <a href="{{route('home.services_by_category',['category_slug'=>$scategory->slug])}}">{{ucfirst($scategory->name)}}</a></h1>
            </div>
        </div>
    </div>

    <section class="content-central col-md-12 col-lg-12 col-sm-12">

            @if($scategory->services->count() > 0)
            @foreach($scategory->services as $service)
            <div class="col-lg-4 col-md-4 col-6 remove-padding">
                      <div class="img-hover ">
                            <img src="{{asset('images/services/thumbnails')}}/{{$service->thumbnail}}" alt="{{$service->name}}"
                              width="600" height="300">
                        </div>
                        <div class="info-gallery">
                                    <h3>{{$service->name}}</h3>
                                    <p>{{$service->tagline}}</p>
                                    <div class="price"><span>PKR:</span>{{$service->price}}</div>
                                    <div class="content-btn col-sm-12"><a href="{{route('home.service_details',['service_slug'=>$service->slug])}}"
                                            class="btn btn-primary">Book Now</a>
                                    </div>
                        </div>

                        <hr class="separator">
            @endforeach
            @else
            <div class="col-lg-4 col-md-4 col-6 remove-padding"><p class="text-center">There is any services.</p></div>
            @endif
        </div>

    </section>

</div>

