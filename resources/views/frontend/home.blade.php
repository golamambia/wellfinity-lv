
@include('frontend.header')

<div class="banner">
  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel1" data-slide-to="1"></li>
        <li data-target="#myCarousel1" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('frontend') }}/images/banner.jpg" alt="">
          <div class="carousel-caption">
            <h1>Hello! We are Wellfinity!</h1>
              <p>We’re here to make you fall in love all over again with what you do.</p>
              <a href="#">Contact Us</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('frontend') }}/images/banner.jpg" alt="">
          <div class="carousel-caption">
            <h1>Hello! We are Wellfinity!</h1>
              <p>We’re here to make you fall in love all over again with what you do.</p>
              <a href="#">Contact Us</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('frontend') }}/images/banner.jpg" alt="">
          <div class="carousel-caption">
            <h1>Hello! We are Wellfinity!</h1>
              <p>We’re here to make you fall in love all over again with what you do.</p>
              <a href="#">Contact Us</a>
          </div>
        </div>
    </div>
</div>
</div>
<!--Banner End-->
<div class="hm-service">
  <div class="container">
    <div class="center-txt">
        <h2 class="text-center wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">Our <span>Services</span></h2>
        <div class="clear-fix"></div>
        <p class="text-center wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod 
          tempor invidunt ut labore et dolore</p>
      </div>
      <ul class="row">
        <li class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".1s ">
          <a href="#">
          <div class="img-hldr">
            <img src="{{ asset('frontend') }}/images/service1.jpg" alt="">
          <div class="txt">
            <div class="icon">
              <img src="{{ asset('frontend') }}/images/service-icon1.png" alt="">
            </div>
            <h3>Corporate Wellbeing</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </div></a>
        </li>
        <li class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">
          <a href="#">
          <div class="img-hldr">
            <img src="{{ asset('frontend') }}/images/service2.jpg" alt="">
          <div class="txt">
            <div class="icon">
              <img src="{{ asset('frontend') }}/images/service-icon2.png" alt="">
            </div>
            <h3>Events</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </div></a>
        </li>
        <li class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".3s ">
          <a href="#">
          <div class="img-hldr">
            <img src="{{ asset('frontend') }}/images/service3.jpg" alt="">
          <div class="txt">
            <div class="icon">
              <img src="{{ asset('frontend') }}/images/service-icon3.png" alt="">
            </div>
            <h3>Strategy</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </div></a>
        </li>
        <li class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".4s ">
          <a href="#">
          <div class="img-hldr">
            <img src="{{ asset('frontend') }}/images/service4.jpg" alt="">
          <div class="txt">
            <div class="icon">
              <img src="{{ asset('frontend') }}/images/service-icon4.png" alt="">
            </div>
            <h3>Creative</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </div></a>
        </li>
        <li class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".5s ">
          <a href="#">
          <div class="img-hldr">
            <img src="{{ asset('frontend') }}/images/service5.jpg" alt="">
          <div class="txt">
            <div class="icon">
              <img src="{{ asset('frontend') }}/images/service-icon5.png" alt="">
            </div>
            <h3>Digital</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </div></a>
        </li>
        <li class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".6s ">
          <a href="#">
          <div class="img-hldr">
            <img src="{{ asset('frontend') }}/images/service6.jpg" alt="">
          <div class="txt">
            <div class="icon">
              <img src="{{ asset('frontend') }}/images/service-icon6.png" alt="">
            </div>
            <h3>Talks</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </div></a>
        </li>
        <li class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".7s ">
          <a href="#">
          <div class="img-hldr">
            <img src="{{ asset('frontend') }}/images/service7.jpg" alt="">
          <div class="txt">
            <div class="icon">
              <img src="{{ asset('frontend') }}/images/service-icon7.png" alt="">
            </div>
            <h3>Production</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </div></a>
        </li>
        <li class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".8s ">
          <a href="#">
          <div class="img-hldr">
            <img src="{{ asset('frontend') }}/images/service8.jpg" alt="">
          <div class="txt">
            <div class="icon">
              <img src="{{ asset('frontend') }}/images/service-icon8.png" alt="">
            </div>
            <h3>Unleashed</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </div></a>
        </li>
        <li class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".9s ">
          <a href="#">
          <div class="img-hldr">
            <img src="{{ asset('frontend') }}/images/service9.jpg" alt="">
          <div class="txt">
            <div class="icon">
              <img src="{{ asset('frontend') }}/images/service-icon9.png" alt="">
            </div>
            <h3>Scribe</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </div></a>
        </li>
      </ul>
  </div>
  <div class="bgg">
    <img src="{{ asset('frontend') }}/images/hmservicebg1.jpg" alt="">
  </div>
</div>
<!--Hm Service End-->
<div class="hm-drink">
  <div class="container">
    <div class="hldr wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">
      <h2>Grab a <span>virtual drink</span> with us</h2>
      <h3>Let's talk about how we can help</h3>
      <a href="#">Tea</a>
      <a href="#">Coffee</a>
    </div>
  </div>
</div>
<!--Hm Drink End-->
<div class="hm-client">
  <div class="container">
    <div class="center-txt wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">
      <h2>Our <span>Clients</span></h2>
      <div class="clear-fix"></div>
    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod 
      tempor invidunt ut labore et dolore</p>
    </div>
      <ul class="row wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client1.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client2.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client3.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client4.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client5.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client6.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client7.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client8.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client9.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client10.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client11.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client12.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client13.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client14.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client15.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client16.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client17.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client18.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/starbucks.png" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client20.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client21.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client22.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client23.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client24.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client25.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client26.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client27.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client28.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client29.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client30.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client31.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client32.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client33.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client34.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client35.jpg" alt=""></li>
        <li class="col-lg-2 col-md-2 col-sm-2 d-flex flex-wrap align-items-center"><img src="{{ asset('frontend') }}/images/client36.jpg" alt=""></li>
      </ul>
  </div>
</div>
<!--Hm Client End-->
<div class="hm-testimonial">
  <div class="container">
    <div class="center-txt wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">
      <h2 class="txt-white">What our <span>Customer say</span></h2>
      <p class="whiteP">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod 
        tempor invidunt ut labore et dolore</p>
    </div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="hldr">
              <div class="img-hldr">
                <img src="{{ asset('frontend') }}/images/hm-testimonial.jpg" alt="">
              </div>
              <div class="txt">
                <div class="lft">
                  <h3>Phiwe</h3>
                  <h4>-Srinko</h4>
                  <ul class="star">
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                  </ul>
                </div>
                <div class="rht">
                  <p>I've had the pleasure of working with Ash and the Strategy team, which has been an invaluable asset to me as an entrepreneur. An excellent executive coach on leadership, strategy, public speaking and networking.</p>
                </div>
              </div>
          </div>
          </div>
          <div class="carousel-item">
            <div class="hldr">
              <div class="img-hldr">
                <img src="{{ asset('frontend') }}/images/hm-testimonial.jpg" alt="">
              </div>
              <div class="txt">
                <div class="lft">
                  <h3>Phiwe</h3>
                  <h4>-Srinko</h4>
                  <ul class="star">
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                  </ul>
                </div>
                <div class="rht">
                  <p>I've had the pleasure of working with Ash and the Strategy team, which has been an invaluable asset to me as an entrepreneur. An excellent executive coach on leadership, strategy, public speaking and networking.</p>
                </div>
              </div>
          </div>
          </div>
          <div class="carousel-item">
            <div class="hldr">
              <div class="img-hldr">
                <img src="{{ asset('frontend') }}/images/hm-testimonial.jpg" alt="">
              </div>
              <div class="txt">
                <div class="lft">
                  <h3>Phiwe</h3>
                  <h4>-Srinko</h4>
                  <ul class="star">
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>
                  </ul>
                </div>
                <div class="rht">
                  <p>I've had the pleasure of working with Ash and the Strategy team, which has been an invaluable asset to me as an entrepreneur. An excellent executive coach on leadership, strategy, public speaking and networking.</p>
                </div>
              </div>
          </div>
          </div>
      </div>
  </div>
  </div>
</div>
<!--Hm Testimonial End-->
<div class="hm-contact">
  <div class="container">
    <div class="hldr">
      <div class="lft wow fadeInLeft " data-wow-deuration="2s " data-wow-delay=".2s ">
        <h2>Let's <span>get connected</span></h2>
        <ul>
          <li><i class="zmdi zmdi-pin"></i> Building 3, 566 Chiswick High Road, Chiswick, W4 5YA</li>
          <li><i class="zmdi zmdi-email"></i> hello@wellfinity.co.uk</li>
          <li><i class="zmdi zmdi-phone-in-talk"></i> +447534067661</li>
        </ul>
        <form>
          <div class="form-group">
            <input type="text" placeholder="Your full name*" class="form-control">
          </div>
          <div class="form-group">
            <input type="email" placeholder="Your mail id**" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" placeholder="Your website*" class="form-control">
          </div>
          <div class="form-group">
            <textarea class="form-control" placeholder="Your message*"></textarea>
          </div>
          <input type="submit" value="Send message">
        </form>
      </div>
      <div class="rht">
        <img class=" wow fadeInRight " data-wow-deuration="2s " data-wow-delay=".2s " src="{{ asset('frontend') }}/images/hm-contact-img.png" alt="">
      </div>
    </div>
  </div>
</div>

@section('more-scripts')

<script>
$(document).ready(function() { 
});
</script>
@stop

@include('frontend.footer')

