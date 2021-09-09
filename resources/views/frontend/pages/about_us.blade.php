@include('frontend.header')

 <!------- inner banner area start ------->
<!--Header End-->
<div class="inner-banner" style="background: url({{ asset('frontend') }}/images/inner-banner-bg.png) no-repeat center">
    <div class="container">
        <h1>We work with companies of all sizes</h1>
        <ul>
            <li>About Us</li>
        </ul>
    </div>
</div>
<div class="about">
    <div class="container">
        <div class="center-txt">
            <h2>How Do <span>We Work</span></h2>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod 
                tempor invidunt ut labore et dolore</p>
        </div>
        <ul class="abt">
            <li class=" wow fadeInLeft " data-wow-deuration="2s " data-wow-delay=".2s ">
                <div class="num"><span>01</span></div>
                <div class="img-hldr">
                    <img src="{{ asset('frontend') }}/images/abt1.png" alt="">         
                    <div class="txt">
                        <h4>We <span>Think</span></h4>
                        <p>We believe that people deserve to love what they do, that growing your business should be enjoyable and that organisations should focus on what they do best. We believe that the most successful teams are the ones that have days where they just don't feel like they're working.</p>
                    </div>
                </div>   
            </li>
            <li class=" wow fadeInRight " data-wow-deuration="2s " data-wow-delay=".3s ">
                <div class="num"><span>02</span></div>
                <div class="img-hldr">
                    <img src="{{ asset('frontend') }}/images/abt2.png" alt="">
                               
                <div class="txt">
                    <h4>We <span>Feel</span></h4>
                    <p>We feel happiest when we are excited about what we do, when we share in your experiences and when we work with you towards common goals. We love to be creative and to go the extra mile to be the best we can. We find ways to keep the excitement going in what you do. </p>
                </div>
                </div> 
            </li>
            <li class=" wow fadeInLeft" data-wow-deuration="2s" data-wow-delay=".4s">
                <div class="num"><span>03</span></div>
                <div class="img-hldr">
                    <img src="{{ asset('frontend') }}/images/abt3.png" alt="">            
                    <div class="txt">
                        <h4>We <span>Do</span></h4>
                        <p>We take the time to understand your values and to take care of all the noise so that you can focus on doing what you do best. We do everything we can to facilitate the success of the people we work with. We do more than simply deliver the service.</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    
    <div class="clear-fix"></div>
</div>
<!--About Us End-->
<div class="hm-contact abt-contact">
    <div class="container">
      <div class="hldr">
        <div class="lft fadeInLeft " data-wow-deuration="2s " data-wow-delay=".2s ">
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

