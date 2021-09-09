@include('frontend.header')

<!-- slider area start -->
<div class="home-slider innerbg">
  <div class="cycle-slideshow home-slideshow"  data-cycle-slides="&gt; div" data-cycle-pager=".home-pager" data-cycle-timeout="5000"  data-cycle-prev="#HomePrev" data-cycle-next="#HomeNext">
    <div class="slide" style="background-image:url({!! asset('/frontend/images/inner-bg.jpg') !!});">
      <div class="caption">
        <div class="container">
          <div class="con">
            <h4>Page Not Found</h4>
            <ul>
              <li><a href="{{url('/')}}">Home</a> </li>
              <li>404</li>
            </ul>           
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="home-pager"></div>
</div>
<!-- slider area stop --> 

<div class="somthing">
	<div class="container">
		<div class="text-center">
			<!-- <div class="error404 center">404</div> -->
			<div class="heading-block nobottomborder">
				<h4>Oops! </h4>
				<span>The page you were looking for couldn’t be found.</span>
				<!-- <span>Try searching for the best match or browse the links below:</span> -->
			</div>
			<!-- <form action="{{ url('/search') }}" method="get" class="nobottommargin">
				<div class="input-group input-group-lg">
				
	                <input type="text" class="form-control" name="q" placeholder="Search for Pages...">
					<div class="input-group-append">
						<button class="btn btn-success" type="submit">Search</button>
					</div>

				</div>
			</form> -->
		</div>
  </div>
</div>

@include('frontend.footer')