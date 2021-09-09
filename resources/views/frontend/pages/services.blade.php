@include('frontend.header')
<?php
$jobsearch = get_fields_value_where('pages',"posttype='jobsearch'",'id','desc');
?>
<!------ banner area start -------->


<div class="inner-banner" style="background: url({{ asset('frontend') }}/images/inner-banner-bg.png) no-repeat center">
    <div class="container">
        <h1>What we Serve</h1>
        <ul>
            <li>Services</li>
        </ul>
    </div>
</div>
<div class="service">
    <div class="container">
        <div class="center-txt">
            <h2>Our <span>Services</span></h2>
            <div class="clear-fix"></div>
            <p>We Specialize in Creating Great Quality Templates and
                Our Engorgio Can Prove it!</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".1s ">
                <div class="service-hldr">
                  <a href="#">
                    <div class="img-hldr">
                      <img src="{{ asset('frontend') }}/images/service1.jpg" alt="">
                    </div>
                    <div class="txt">
                      <div class="icon">
                        <img src="{{ asset('frontend') }}/images/serv1.png" alt="">
                      </div>
                      <h5>Corporate Wellbeing</h5>
                      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                    </div>
                  </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">
              <div class="service-hldr">
                <a href="#">
                  <div class="img-hldr">
                    <img src="{{ asset('frontend') }}/images/service2.jpg" alt="">
                  </div>
                  <div class="txt">
                    <div class="icon">
                      <img src="{{ asset('frontend') }}/images/serv2.png" alt="">
                    </div>
                    <h5>Corporate Wellbeing</h5>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                  </div>
                </a>
              </div>
          </div>
          <div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".3s ">
            <div class="service-hldr">
              <a href="#">
                <div class="img-hldr">
                  <img src="{{ asset('frontend') }}/images/service3.jpg" alt="">
                </div>
                <div class="txt">
                  <div class="icon">
                    <img src="{{ asset('frontend') }}/images/serv3.png" alt="">
                  </div>
                  <h5>Corporate Wellbeing</h5>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                </div>
              </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".4s ">
          <div class="service-hldr">
            <a href="#">
              <div class="img-hldr">
                <img src="{{ asset('frontend') }}/images/service4.jpg" alt="">
              </div>
              <div class="txt">
                <div class="icon">
                  <img src="{{ asset('frontend') }}/images/serv4.png" alt="">
                </div>
                <h5>Corporate Wellbeing</h5>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
              </div>
            </a>
          </div>
      </div>
      <div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".5s ">
        <div class="service-hldr">
          <a href="#">
            <div class="img-hldr">
              <img src="{{ asset('frontend') }}/images/service5.jpg" alt="">
            </div>
            <div class="txt">
              <div class="icon">
                <img src="{{ asset('frontend') }}/images/serv5.png" alt="">
              </div>
              <h5>Corporate Wellbeing</h5>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
            </div>
          </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".6s ">
      <div class="service-hldr">
        <a href="#">
          <div class="img-hldr">
            <img src="{{ asset('frontend') }}/images/service6.jpg" alt="">
          </div>
          <div class="txt">
            <div class="icon">
              <img src="{{ asset('frontend') }}/images/serv6.png" alt="">
            </div>
            <h5>Corporate Wellbeing</h5>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </a>
      </div>
  </div>
  <div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".7s ">
    <div class="service-hldr">
      <a href="#">
        <div class="img-hldr">
          <img src="{{ asset('frontend') }}/images/service7.jpg" alt="">
        </div>
        <div class="txt">
          <div class="icon">
            <img src="{{ asset('frontend') }}/images/serv7.png" alt="">
          </div>
          <h5>Corporate Wellbeing</h5>
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
        </div>
      </a>
    </div>
</div>
<div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".8s ">
  <div class="service-hldr">
    <a href="#">
      <div class="img-hldr">
        <img src="{{ asset('frontend') }}/images/service8.jpg" alt="">
      </div>
      <div class="txt">
        <div class="icon">
          <img src="{{ asset('frontend') }}/images/serv8.png" alt="">
        </div>
        <h5>Corporate Wellbeing</h5>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
      </div>
    </a>
  </div>
</div>
<div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".9s ">
  <div class="service-hldr">
    <a href="#">
      <div class="img-hldr">
        <img src="{{ asset('frontend') }}/images/service9.jpg" alt="">
      </div>
      <div class="txt">
        <div class="icon">
          <img src="{{ asset('frontend') }}/images/serv9.png" alt="">
        </div>
        <h5>Corporate Wellbeing</h5>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
      </div>
    </a>
  </div>
</div>
        </div>
    </div>
</div>
<div class="service-bottom">
  <div class="container">
    <h5>Lorem ipsum dolor sit amet, consetetur sadipscing elit</h5>
    <a href="#">Contact us</a>
  </div>
</div>
<!--Service-details End-->
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
              <textarea class="form-control">Your message*</textarea>
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
  <!--Hm Contact End-->


@include('frontend.footer')