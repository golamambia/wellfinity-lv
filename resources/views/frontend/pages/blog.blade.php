@include('frontend.header')
<?php
$bloglist = get_fields_value_where('pages',"posttype='post'",'id','desc');


?>
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
<div class="blog">
    <div class="container">
        <div class="center-txt">
           @foreach($extra_data as $val)
    @if($val->type==2)
            @if($val->title)<h2>{!!$val->title!!}</h2>@endif
            <div class="clear-fix"></div>
            <p>{!!$val->sub_title!!}</p>
             @endif
    @endforeach
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
               @php($count=0)
               @if($lists->count() > 0)
 @foreach($lists as $lt_val)
 <?php
$extra_datamn = get_fields_value_where('pages_extra',"page_id=".$lt_val->id,'id','desc');
$i=0;
?>
               
   
    @php($count++)
                <div class="blog-hldr">
                    <div class="img-hldr">
                        <a href="{{url('/'.$lt_val->slug)}}"><img src="{{ asset('/uploads/'.$lt_val->bannerimage) }}" alt=""></a>
                    </div>
                    <!-- <h3><a href="{{url('/'.$lt_val->slug)}}">{{ asset('/uploads/'.$lt_val->bannerimage) }}</a><i class="zmdi zmdi-share"></i></h3> -->
                    <ul>
                        <li>BY <span style="text-transform: uppercase;">{!!config('site.title')!!}</span> | {!!$lt_val->cat_name!!}</li>
                        <!-- <li><i class="zmdi zmdi-comments"></i> 5k Comments</li> -->
                    </ul>
                    <hr>
                    {{substr(strip_tags($lt_val->body),0,500)}}...
                    
                    <a href="{{url('/'.$lt_val->slug)}}" class="rdmr">Read more</a>
                </div>

           
 
             @endforeach
             @else


             <div class="blog-hldr">
                   <br><br>
                  <h3 style="color: #c22727;
    text-align: center;">No blog found!</h3>
                  
                </div>

            @endif


               <!--  <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">&laquo;</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul> -->
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="hldr">
                    <h4>Search Bar</h4>
                    <form>
                    <div class="search">
                        <input type="text" name="s" placeholder="Search your keyword" value="{{Request()->s}}">
                        <input type="submit" value="">
                    </div>
                    </form>
                </div>
                <div class="hldr">
                  @foreach($extra_data as $val)
    @if($val->type==3)
                    <h4>{!!$val->title!!}</h4>
                   {!!$val->body!!}
                     @endif
    @endforeach
                </div>
                <div class="hldr">
                    <h4>Top Categories</h4>
                    <form>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="c" onchange="this.form.submit()">
                        <option selected>Select categories</option>
                         @foreach($category as $val)
                        <option <?php if(Request()->c==$val->id){echo"selected";}?> value="{!!$val->id!!}">{!!$val->name!!}</option>
                        @endforeach
                      </select>
                  </form>
                </div>
                <div class="hldr">
                     @if($archive_list->count() > 0)
                    <h4>Archives</h4>
                    <ul class="Archives">
                        
                         @foreach($archive_list as $val)
                        <li><a href="{{url('/')}}/blog?year=<?=date('Y',strtotime($val->year));?>-<?=date('m',strtotime($val->month));?>">{!!$val->month!!} {!!$val->year!!} <i class="zmdi zmdi-long-arrow-right"></i></a></li>
                         @endforeach
                    </ul>
                    @endif
                </div>
                <div class="hldr">
                     @if($servicelist->count() > 0)
                    <h4>Wellfinity Services</h4>
                    <div class="owl-carousel blog-service owl-theme">
                         @foreach($servicelist as $lt_val)
                          <?php
$extra_datamn = get_fields_value_where('pages_extra',"page_id=".$lt_val->id,'id','desc');
$i=0;
?>
   
 @php($count=0)
              @foreach($extra_datamn as $key => $val)
    @if($val->type==1)
    @php($count++)
                        <div class="item">
                          
                            <div class="serv">
                                <a href="{{url('/'.$lt_val->slug)}}">
                                    <div class="img-hldr">
                                         <img src="{{ asset('/uploads/'.$val->image2) }}" alt=""> 
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('/uploads/'.$val->image) }}" alt=""> 
                                    </div>
                                    <p>{!!$val->title!!}</p>
                                </a>
                            </div>

                           

                        </div>

                        @endif
    @endforeach
             @endforeach
           
               
                    </div>
                     @endif
                </div>
                <div class="hldr follow">
                    <h4>Follow us</h4>
                    <ul class="social">
                       <li><a href="{!!config('site.facebook_link')!!}" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
            <li><a href="{!!config('site.twitter_link')!!}" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
          
            <li><a href="{!!config('site.instagram_link')!!}" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
          <li><a href="{!!config('site.pinterest')!!}" target="_blank"><i class="zmdi zmdi-pinterest"></i></a></li>
          <li><a href="{!!config('site.youtube_link')!!}" target="_blank"><i class="zmdi zmdi-youtube-play"></i></a></li>
                      </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bgg">
      <img src="{{ asset('frontend') }}/images/cnt-bg.png" alt="">
    </div>
</div>
<!--blog End-->

@include('frontend.footer')