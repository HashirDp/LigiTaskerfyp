<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->

				<div class="section-title">
					<h2>All Categories</h2>
						</div>

                <div class="row">
<table>
                @foreach($scategories as $scategory)
                <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">

						<div class="category-block">
							<div class="header">
                                <h5>{{$scategory->name}}</h5>
                            </div>

                               <a href="{{route('home.services_by_category',['category_slug'=>$scategory->slug])}}"><img class="icon-img" --}}

                                                src="{{asset('images/categories')}}/{{$scategory->image}}" alt="{{$scategory->name}}">

                         </div>
				</div>
			</div>
		</div>
    @endforeach

    </div>
	  </table>
    </div>

</section>


{{$scategories->links()}}
