@include('frontend.header')


<!------ banner area start -------->

@foreach($extra_data as $val)
  @if($val->type==1)
<!------ banner area start -------->
<div class="inner-banner" style="background: url({{ asset('/uploads/'.$val->image) }}) no-repeat center">
    <div class="container">
        @if($val->title)<h1>{!!$val->title!!}</h1>@endif
        <ul>
            <li>{{$page->page_title}}</li>
        </ul>
    </div>
</div>
<!------ banner area stop --------> 
 @endif
@endforeach
<!------ banner area stop --------> 


<!-------About Us start  ------->
<div class="service">
    <div class="container">
        <div class="center-txt">
           @foreach($extra_data as $val)
           @if($val->type!=1)
           <h2>{!!$val->title!!}</h2>
            <div class="clear-fix"></div>
           {!!$val->body!!}
           @endif
             @endforeach
        </div>

      </div>
    </div>
<!-------About Us stop  -------> 


@include('frontend.footer')