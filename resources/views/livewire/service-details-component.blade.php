<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>{{$service->name}}</h1>
            </div>
            </div>
        </div>
    </div>
    <section class="content-central">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 single-blog">
                            <div class="post-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="post-header">
                                            <div class="post-info-wrap">
                                                <div class="post-meta" style="height: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="single-carousel">
                                            <div class="img-hover">
                                                <img src="{{asset('images/services')}}/{{$service->image}}" alt="{{$service->name}}"
                                                width="100%" height="100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="post-content">
                                            <h3>{{$service->name}}</h3>
                                            <h3>{{$service->description}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <aside class="widget" style="margin-top: 18px;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Booking Details</div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td style="border-top: none;">Price</td>
                                                <td style="border-top: none;"><span>PKR</span> {{$service->price}}</td>
                                            </tr>
                                            <tr>
                                                <td>Quntity</td>
                                                <td>1</td>
                                            </tr>
                                            @php
                                                $total = $service->price;
                                            @endphp
                                            <tr>
                                                <td>Total</td>
                                                <td><span>PKR</span> {{$total}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-footer">
                                        <form method="POST" action="{{route('service.book')}}">
                                        @csrf
                                        <legend>Personal Information:</legend>
                                            <input style="margin-bottom: 10px;" id="validationCustomUsername" type="text" class="form-control"  required name="user_name" value="{{Auth::user()?Auth::user()->name:''}}" aria-describedby="inputGroupPrepend" placeholder="Name ">
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                                </div>
                                            <input style="margin-bottom: 10px;" type="text" class="form-control" required name="house_no" value="" placeholder="House no.">
                                            <input style="margin-bottom: 10px;" type="text" class="form-control" required name="block" value="" placeholder="Block">
                                            <input style="margin-bottom: 10px;" type="text" class="form-control" required name="area" value="" placeholder="Area">
                                            <input style="margin-bottom: 10px;" type="text" class="form-control" required name="city" value="" placeholder="City">

                                            <input type="hidden" class="form-control" name="service_id" value="{{$service->id}}">
                                            <input type="hidden" class="form-control" name="s_total" value="{{$total}}">

                                            <input type="submit" class="btn btn-primary" name="submit"
                                                value=" Book Now">
                                        </fieldset>

                                        </form>
                                    </div>
                                </div>
                            </aside>
                            <aside>
                                @if($r_service)
                                <h3>Related Service</h3>
                                <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini"
                                    style="max-width: 360px">
                                    <a href="{{route('home.service_details',['service_slug'=>$r_service->slug])}}">
                                        <div class="img-hover">
                                            <img src="{{asset('images/services/thumbnails')}}/{{$r_service->thumbnail}}" alt="{{$r_service->name}}"
                                                class="img-responsive">
                                        </div>
                                        <div class="info-gallery">
                                            <h3>
                                                {{$r_service->name}}
                                            </h3>
                                            <hr class="separator">
                                            <p>{{$r_service->name}}</p>
                                            <div class="content-btn"><a href="{{route('home.service_details',['service_slug'=>$r_service->slug])}}"
                                                    class="btn btn-warning">View Details</a></div>
                                            <div class="price"><span>$</span><b>From</b>{{$r_service->price}}</div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
