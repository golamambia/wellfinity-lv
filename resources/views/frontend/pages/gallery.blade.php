@include('frontend.header')

  @foreach($extra_data as $val)
    @if($val->type==1)
<div class="inner-banner" style="background: url({{ asset('/uploads/'.$val->image) }}) no-repeat center">
    <div class="container">
         @if($val->title)<h1>{!!$val->title!!}</h1>@endif
        <ul>
            <li>{{$page->page_title}}</li>
        </ul>
    </div>
</div>
 @endif
    @endforeach



<div class="gallery">
    <div class="container">
       @foreach($extra_data as $val)
    @if($val->type==2 && $val->image && File::exists(public_path('uploads/'.$val->image)))
      <div class="card">
        <div class="card-image">
          <a href="{{ asset('/uploads/'.$val->image) }}" data-fancybox="gallery" data-caption="">
            <img src="{{ asset('/uploads/'.$val->image) }}" alt="Image Gallery">
            <div class="img-hldr">
              <img src="{{ asset('frontend') }}/images/zoom.png" alt="Image Gallery">
            </div>
          </a>
        </div>
      </div>
 @endif
    @endforeach

    </div>
    <div class="clearfix"></div>
</div>
   
@include('frontend.footer')
