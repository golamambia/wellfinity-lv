@include('frontend.header')
<?php
$service = get_fields_value_where('pages',"page_template=3",'id','desc');

?>
@foreach($service as $lval)
<?php

$service_extra = get_fields_value_where('pages_extra',"page_id=".$lval->id,'id','desc');
?>
@foreach($service_extra as $val)
  @if($val->type==1)
<div class="inner-banner" style="background: url({{ asset('/uploads/'.$val->image) }}) no-repeat center">
    <div class="container">
         @if($val->title)<h1>{!!$val->title!!}</h1>@endif
        <ul>
          <li><a href="{{ url('/') }}/{!!$lval->slug!!}">{{$val->title}}</a></li>
            <li>{!!$page->page_title!!}</li>

        </ul>
    </div>
</div>
 @endif
 @endforeach
@endforeach
<div class="service-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 wow fadeInLeft " data-wow-deuration="2s " data-wow-delay=".2s ">
                <div class="img-hldr">
                  @foreach($extra_data as $val)
            @if($val->type==2)
                  @if($val->image && File::exists(public_path('uploads/'.$val->image2))) <img src="{{ asset('/uploads/'.$val->image2) }}" alt="service" title="">   @endif 
                   @endif
            @endforeach
                </div>
            </div>
            <div class="col-lg-7 col-md-7 wow fadeInRight " data-wow-deuration="2s " data-wow-delay=".2s ">
                <div class="hldr">
                  @foreach($extra_data as $val)
            @if($val->type==2)
                    <div class="title">
                        <div class="icon">
                           @if($val->image && File::exists(public_path('uploads/'.$val->image))) <img src="{{ asset('/uploads/'.$val->image) }}" alt="service" title="">   @endif 
                        </div>
                        <h3>{!!$val->title!!}</h3>
                    </div>
                   {!!$val->body!!}
                   <a href="{{url('/'.$val->btn_url)}}" >{!!$val->btn_text?$val->btn_text:'Get in touch'!!}</a>
                   

                     @endif
            @endforeach
                </div>
            </div>
            <div class="col-lg-12">
              <div class="center-txt wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">
                 @foreach($extra_data as $val)
            @if($val->type==3)
                <h2>{!!$val->title!!}</h2>
                <p>{!!$val->sub_title!!}</p>
                  @endif
            @endforeach
              </div>
            </div>
             @php($count=0)
             @foreach($extra_data as $val)
            @if($val->type==4)
             @php($count++)
            <div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".{{$count + 1}}s ">
              <div class="Dtlshldr">
                <div class="icon">@if($val->image && File::exists(public_path('uploads/'.$val->image))) <img src="{{ asset('/uploads/'.$val->image) }}" alt="service" title="">   @endif </div>
                <h4>{!!$val->title!!}</h4>
                  {!!$val->body!!}
              </div>
            </div>
           
            @endif
            @endforeach

        </div>
    </div>
    <div class="bgg">
      <img src="{{ asset('frontend') }}/images/hmservicebg1.jpg" alt="">
    </div>
</div>

@include('frontend.footer')