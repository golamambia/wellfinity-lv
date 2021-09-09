@include('frontend.header')

<div class="inner-banner" style="background: url({{ asset('frontend') }}/images/inner-banner-bg.png) no-repeat center">
    <div class="container">
        <h1>Our Gallery</h1>
        <ul>
            <li>Gallery</li>
        </ul>
    </div>
</div>



<div class="gallery">
    <div class="container">
      <div class="card">
        <div class="card-image">
          <a href="{{ asset('frontend') }}/images/gallery1.png" data-fancybox="gallery" data-caption="">
            <img src="{{ asset('frontend') }}/images/gallery1.png" alt="Image Gallery">
            <div class="img-hldr">
              <img src="{{ asset('frontend') }}/images/zoom.png" alt="Image Gallery">
            </div>
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ asset('frontend') }}/images/gallery2.png" data-fancybox="gallery" data-caption="">
            <img src="{{ asset('frontend') }}/images/gallery2.png" alt="Image Gallery">
            <div class="img-hldr">
              <img src="{{ asset('frontend') }}/images/zoom.png" alt="Image Gallery">
            </div>
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ asset('frontend') }}/images/gallery3.png" data-fancybox="gallery" data-caption="">
            <img src="{{ asset('frontend') }}/images/gallery3.png" alt="Image Gallery">
            <div class="img-hldr">
              <img src="{{ asset('frontend') }}/images/zoom.png" alt="Image Gallery">
            </div>
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ asset('frontend') }}/images/gallery4.png" data-fancybox="gallery" data-caption="">
            <img src="{{ asset('frontend') }}/images/gallery4.png" alt="Image Gallery">
            <div class="img-hldr">
              <img src="{{ asset('frontend') }}/images/zoom.png" alt="Image Gallery">
            </div>
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ asset('frontend') }}/images/gallery5.png" data-fancybox="gallery" data-caption="">
            <img src="{{ asset('frontend') }}/images/gallery5.png" alt="Image Gallery">
            <div class="img-hldr">
              <img src="{{ asset('frontend') }}/images/zoom.png" alt="Image Gallery">
            </div>
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ asset('frontend') }}/images/gallery6.png" data-fancybox="gallery" data-caption="">
            <img src="{{ asset('frontend') }}/images/gallery6.png" alt="Image Gallery">
            <div class="img-hldr">
              <img src="{{ asset('frontend') }}/images/zoom.png" alt="Image Gallery">
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
</div>
   
@include('frontend.footer')
