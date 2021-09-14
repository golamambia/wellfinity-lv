@include('frontend.header')

 <!------- inner banner area start ------->
<!--Header End-->
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
<div class="about">
    <div class="container">
        <div class="center-txt">
             @foreach($extra_data as $val)
    @if($val->type==2)
            @if($val->title)<h2>{!!$val->title!!}</h2>@endif
             @if($val->sub_title)<p>{!!$val->sub_title!!}</p>@endif
                 @endif
    @endforeach
        </div>
        <ul class="abt">
             @php($count=0)
              @foreach($extra_data as $key => $val)
    @if($val->type==3)
    @php($count++)
            <li class=" wow fadeInLeft " data-wow-deuration="2s " data-wow-delay=".{{$count + 1}}s ">
                <div class="num"><span>0{{$count}}</span></div>
                <div class="img-hldr">
                    <img src="{{ asset('/uploads/'.$val->image) }}" alt="">         
                    <div class="txt">
                        <h4>{!!$val->title!!}</h4>
                        {!!$val->body!!}
                    </div>
                </div>   
            </li>
             @endif
    @endforeach
       
        </ul>
    </div>
    
    <div class="clear-fix"></div>
</div>
<!--About Us End-->
<div class="hm-contact abt-contact">
    <div class="container">
      <div class="hldr">
        <div class="lft fadeInLeft " data-wow-deuration="2s " data-wow-delay=".2s ">
             @foreach($extra_data as $key => $val)
    @if($val->type==4)
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
    @if($val->type==4)
    @if($val->btn_text)
            <input type="submit" value="{!!$val->btn_text?$val->btn_text:'Send'!!}">
             @endif
             @endif
    @endforeach
          </form>
        </div>
        <div class="rht">
            @foreach($extra_data as $key => $val)
    @if($val->type==4)
          <img class=" wow fadeInRight " data-wow-deuration="2s " data-wow-delay=".2s " src="{{ asset('/uploads/'.$val->image) }}" alt="">
           @endif
    @endforeach
        </div>
      </div>
    </div>
  </div>
  <!--Hm Contact End-->

@include('frontend.footer')

