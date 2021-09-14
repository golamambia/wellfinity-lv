@include('frontend.header')
<?php
$service_type = get_fields_value_where('pages',"posttype='service'",'id','desc');
$testimonial = get_fields_value_where('gs_testimonial',"status='1'",'id','desc');

?>
<!------ banner area start -------->
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
<div class="service">
    <div class="container">
        <div class="center-txt">
             @foreach($extra_data as $val)
    @if($val->type==2)
            @if($val->title)<h2>{!!$val->title!!}</h2>@endif
            <div class="clear-fix"></div>
             @if($val->sub_title)<p>{!!$val->sub_title!!}</p>@endif
                 @endif
    @endforeach
           
        </div>
        <div class="row">
                    @if($service_type->count() > 0)
 @foreach($service_type as $lt_val)
 <?php
$extra_datamn = get_fields_value_where('pages_extra',"page_id=".$lt_val->id,'id','desc');
$i=0;
?>
   
 @php($count=0)
              @foreach($extra_datamn as $key => $val)
    @if($val->type==1)
    @php($count++)
            <div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".{{$count + 1}}s ">
                <div class="service-hldr">
                  <a href="{{url('/'.$lt_val->slug)}}">
                    <div class="img-hldr">
                       <img src="{{ asset('/uploads/'.$val->image2) }}" alt=""> 
                    </div>
                    <div class="txt">
                      <div class="icon">
                        <img src="{{ asset('/uploads/'.$val->image) }}" alt=""> 
                      </div>
                      <h5>{!!$val->title!!}</h5>
                      <p>{!!$val->sub_title!!}</p>
                    </div>
                  </a>
                </div>
            </div>
 @endif
    @endforeach
             @endforeach
            @endif
        </div>
    </div>
</div>
<div class="service-bottom">
  <div class="container">
    @foreach($extra_data as $val)
  @if($val->type==3)
     @if($val->title)<h5>{!!$val->title!!}</h5>@endif
     @if($val->btn_url)<a href="{!!$val->btn_url!!}" >{!!$val->btn_text?$val->btn_text:'contact Us'!!}</a>@endif
    
      @endif
@endforeach
  </div>
</div>
<!--Service-details End-->
<div class="hm-testimonial">
    <div class="container">
      <div class="center-txt wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">
         @foreach($extra_data as $val)
  @if($val->type==4)
     @if($val->title)<h2 class="txt-white">{!!$val->title!!}</h2>@endif
        <p class="whiteP">{!!$val->sub_title!!}</p>
           @endif
@endforeach
      </div>
  
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @php($count=0)
         @foreach($testimonial as $val)
             @if( $val->image && File::exists(public_path('uploads/'.$val->image)))
          <li data-target="#myCarousel" data-slide-to="{{$count}}" @if($count==0) class="active" @endif></li>
         @endif
         @php($count++)
            @endforeach
        </ol>
  
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
           @php($countn=0)
         @foreach($testimonial as $val)
        
             @if( $val->image && File::exists(public_path('uploads/'.$val->image)))
             <div class="carousel-item @if($countn==0) active @endif">
              <div class="hldr">
                <div class="img-hldr">
                 <img src="{{ asset('/uploads/'.$val->image) }}" alt="">
                </div>
                <div class="txt">
                  <div class="lft">
                     <h3>{!!$val->name!!}</h3>
                  <h4>-{!!$val->designation!!}</h4>
                    <ul class="star">
                       <?php 

                     for($i=0;$i<$val->rating;$i++){
                     ?>
                     <li><a href="#"><img src="{{ asset('frontend') }}/images/star.png" alt=""></a></li>

                    <?php }?>
                    </ul>
                  </div>
                  <div class="rht">
                     {!!$val->body!!}
                  </div>
                </div>
            </div>
            </div>
            @endif
          @php($countn++)
            @endforeach

        </div>
    </div>
    </div>
  </div>
  <!--Hm Testimonial End-->
  <div class="hm-contact">
    <div class="container">
      <div class="hldr">
        <div class="lft wow fadeInLeft " data-wow-deuration="2s " data-wow-delay=".2s ">
         @foreach($extra_data as $key => $val)
    @if($val->type==5)
           @if($val->title)<h2>{!!$val->title!!}</h2>@endif
           @endif
    @endforeach
          <ul>
            <li><i class="zmdi zmdi-pin"></i> {!!config('site.address')!!}</li>
            <li><i class="zmdi zmdi-email"></i>{!!config('site.email')!!}</li>
            <li><i class="zmdi zmdi-phone-in-talk"></i> {!!config('site.phone')!!}</li>
          </ul>
           @if($errors->any())   
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
            </div>
            @endif
          <form method="POST" action="{{ url('contact') }}" class="customvalidation">
              @csrf
            <div class="form-group">
              <input type="text" placeholder="Your full name*" data-validation-engine="validate[required]" name="name" class="form-control">
            </div>
            <div class="form-group">
              <input type="email" placeholder="Your mail id**" data-validation-engine="validate[required,custom[email]]" name="email" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Your website*" class="form-control" data-validation-engine="validate[required]" name="website">
            </div>
            <div class="form-group">
              <textarea placeholder="Your message*" class="form-control" data-validation-engine="validate[required]" name="message"></textarea>
            </div>
                @foreach($extra_data as $key => $val)
    @if($val->type==5)
    @if($val->btn_text)
            <input type="submit" value="{!!$val->btn_text?$val->btn_text:'Send'!!}">
             @endif
             @endif
    @endforeach
          </form>
        </div>
        <div class="rht">
          @foreach($extra_data as $key => $val)
    @if($val->type==5)
          <img class=" wow fadeInRight " data-wow-deuration="2s " data-wow-delay=".2s " src="{{ asset('/uploads/'.$val->image) }}" alt="">
           @endif
    @endforeach
        </div>
      </div>
    </div>
  </div>
  <!--Hm Contact End-->


@include('frontend.footer')