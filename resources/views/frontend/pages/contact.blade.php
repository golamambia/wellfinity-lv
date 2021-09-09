@include('frontend.header')

<!--Header End-->
<div class="inner-banner" style="background: url({{ asset('frontend') }}/images/inner-banner-bg.png) no-repeat center">
    <div class="container">
        <h1>Connect with us</h1>
        <ul>
            <li>Contact</li>
        </ul>
    </div>
</div>
<div class="contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14746.536057470747!2d88.35307365!3d22.48038355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1sen!2sin!4v1630266240138!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<div class="contact">
    <div class="container">
      <div class="center-txt">
        <h2>Let's <span>get connected</span></h2>
        <p>We Specialize in Creating Great Quality Templates and Our Engorgio Can Prove it!</p>
      </div>
      <div class="hldr">
          <ul>
              <li><i class="zmdi zmdi-pin"></i> Building 3, 566 Chiswick High Road, Chiswick, W4 5YA</li>
              <li><i class="zmdi zmdi-email"></i> hello@wellfinity.co.uk</li>
              <li><i class="zmdi zmdi-phone-in-talk"></i> +447534067661</li>
          </ul>
          <div class="contact-form">
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
      </div>
    </div>
    <div class="bgg">
      <img src="{{ asset('frontend') }}/images/cnt-bg.png" alt="">
    </div>
</div>

@include('frontend.footer')