@include('frontend.header')

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
<div class="contact-map">
  @foreach($extra_data as $key => $val)
    @if($val->type==2)
    @if($val->title)
    {!!$val->title!!}
   
@else

 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14746.536057470747!2d88.35307365!3d22.48038355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1sen!2sin!4v1630266240138!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
   @endif

    @endif
    @endforeach
</div>
<div class="contact">
    <div class="container">
      <div class="center-txt">
        @foreach($extra_data as $key => $val)
    @if($val->type==3)
           @if($val->title)<h2>{!!$val->title!!}</h2>@endif
           @if($val->sub_title)<p>{!!$val->sub_title!!}</p>@endif
           @endif
    @endforeach
        
      </div>
      <div class="hldr">
          <ul>
               <li><i class="zmdi zmdi-pin"></i> {!!config('site.address')!!}</li>
            <li><i class="zmdi zmdi-email"></i>{!!config('site.email')!!}</li>
            <li><i class="zmdi zmdi-phone-in-talk"></i> {!!config('site.phone')!!}</li>
          </ul>
          <div class="contact-form">
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
    @if($val->type==3)
    @if($val->btn_text)
            <input type="submit" value="{!!$val->btn_text?$val->btn_text:'Send'!!}">
             @endif
             @endif
    @endforeach
              </form>
          </div>
      </div>
    </div>
    <div class="bgg">
      <img src="{{ asset('frontend') }}/images/cnt-bg.png" alt="">
    </div>
</div>

@include('frontend.footer')