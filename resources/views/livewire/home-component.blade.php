
<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Quality Service, Fair Pricing.</h1>
                    <h1> You Name It. We Do It.</h1>
					<p>COMPLETE HOME REPAIRS & CLEANING
					<div class="short-popular-category-list text-center">
						<h2>Popular Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="tv/services"><i class="fa fa-television"></i>TV</a></li>
							<li class="list-inline-item">
								<a href="home-cleaning/services"><i class="fa fa-home"></i> Home Cleaning</a>
							</li>
							<li class="list-inline-item">
								<a href="car/services"><i class="fa fa-car"></i> Cars</a>
							</li>
							<li class="list-inline-item">
								<a href="plumbing/services"><i class="fa fa-plug"></i>Electrical</a>
							</li>
							<li class="list-inline-item">
								<a href="computer-repair/services"><i class="fa fa-laptop"></i> Computer Repair</a>
							</li>
						</ul>
					</div>

				</div>
				<!-- Advance Search -->
				<div class="advance-search">
						<div class="container">
							<div class="row justify-content-center">
							@if (\Session::has('info'))
								<div class="alert alert-info">
									<ul>
										<li>{!! \Session::get('ifno') !!}</li>
									</ul>
								</div>
							@endif
								<div class="col-lg-12 col-md-12 align-content-center">
                                    <form id="sform" action="{{route('searchService')}}" method="post">
                                        @csrf
											<div class="form-row">
												<div class="form-group col-md-10">
                                            	<input type="text"  id="q" name="q" required="required" placeholder="What are you looking for"
                                                    class="input-large typeahead form-control my-2 my-lg-1"  autocomplete="off">

                                            </div>

                                            <button type="submit" class="btn btn-primary">Search Now</button>
												</div>

											</div>

									</div>
								</div>
					</div>
                </form>
				</div>

			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
        <div class="container">
            <div class="row xts-d-flex-center">
                <div class="col-lg-6 col-md-6">
                    <img src="/images/img.jpg" alt="Home Tools" width="550" height="300">
                </div>
                <div class="col-lg-6 col-md-6">
                    <h2>Why Choose LigiTasker?</h2>
                    <p>
                        LigiTasker is a value addition which covers all 360 services under one platform. Our motive is to provide best services to our corporate, commercial, and residential customers. Our main key components to success are :
                    </p>
                    <div class="row xts-icon-content">
                        <div>
                            <img alt="house staff" src="/images/test.png" width="20" height="20">
                        </div>
                        <div>
                            <h5>Vetted and background-checked in house staff</h5>
                        </div>
                    </div>
                    <div class="row xts-icon-content">
                        <div>
                            <img alt="Advanced Equipment" src="/images/bioprinter.png" width="20" height="20">
                        </div>
                        <div>
                            <h5>High-Tech and Most Advanced Equipment</h5>
                        </div>
                    </div>
                    <div class="row xts-icon-content">
                        <div>
                            <img alt="Quality Control and Safety" src="/images/quality-assurance.png" width="20" height="20">
                        </div>
                        <div>
                            <h5>Quality Control and Safety</h5>
                        </div>
                    </div>
                    <div class="row xts-icon-content">
                        <div>
                            <img alt="AffordableandUpfrontPricing" src="/images/best-price.png" width="20" height="20">
                        </div>
                        <div>
                            <h5>Affordable and Upfront Pricing</h5>
                        </div>
                    </div>
                    <div class="row xts-icon-content">
                        <div>
                            <img alt="CustomerService" src="/images/target.png" width="20" height="20">
                        </div>
                        <div>
                            <h5>24/7 Customer Service</h5>
                        </div>
                    </div>
                    <div class=" row xts-icon-content">
                        <div>
                            <img alt="Certified" src="/images/browser.png" width="20" height="20">
                        </div>
                        <div>
                            <h5>Experienced, Trained and Certified</h5>
                        </div>
                    </div>
                    <div class="row xts-icon-content">
                        <div>
                            <img alt="Guarantee" src="/images/recommend.png" width="20" height="20">
                        </div>
                        <div>
                            <h5>Post Service Guarantee</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





<!--==========================================
=            All Category Section            =
===========================================-->

<section class="client-slider-03">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Client Slider -->
			<div class="col-md-12">
				<!-- Client Slider -->
                <div class="section-title">
					<h2>All Category </h2>
				</div>
<div class="category-slider">
    @foreach($scategories as $scategory)
    <tr>
        <div class="item-service-line">
           <i class="fa"><a href="{{route('home.services_by_category',['category_slug'=>$scategory->slug])}}"><img class="icon-img" --}}

                        src="{{asset('images/categories')}}/{{$scategory->image}}" alt="{{$scategory->name}}"></a></i>
            <h5>{{$scategory->name}}</h5>
        </div>
    </tr>

@endforeach

</div>
			</div>
		</div>
</div>
	<!-- Container End -->
</section>


<!--====================================
=            Call to Action            =
=====================================-->

<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-smile-o d-block"></i>
                    <span class="counter my-2 d-block" data-count="23">0</span>
                    <h5>Happy Customers</h5>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-user-o d-block"></i>
                    <span class="counter my-2 d-block" data-count="10">0</span>
                    <h5>Active Members</h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-bookmark-o d-block"></i>
                    <span class="counter my-2 d-block" data-count="2">0</span>
                    <h5>Verified Ads</h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-smile-o d-block"></i>
                    <span class="counter my-2 d-block" data-count="20">0</span>
                    <h5>Happy Customers</h5>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</section>

@push('scripts')
    <script type="text/javascript">
        var path = "{{route('autocomplete')}}"
        $('input.typeahead').typeahead({
            source: function(query,process){
                return $.get(path,{query:query},function(data){
                    return process(data);
                });
            }
        });



    </script>
@endpush
