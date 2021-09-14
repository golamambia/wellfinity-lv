@include('frontend.header')
<?php
$blog = get_fields_value_where('pages',"page_template=4",'id','desc');
//$comment_list2 = get_fields_value_where('comment',"blogid=".$page->id,'id ','desc');
?>
@foreach($blog as $lval)
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
  <div class="blog blog-post">
    <div class="container">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-8 col-md-8">
          <div class="blog-hldr">
            <div class="img-hldr">
               
    
              <a href="#">
                <img src="{{ asset('/uploads/'.$page->bannerimage) }}" alt="">
                <div class="date"><?=date('d',strtotime($page->created_at));?><span><?=date('M, Y',strtotime($page->created_at));?></span></div>
              </a>
            </div>
            <h3><a href="#">{!!$page->page_title!!}</a><i class="zmdi zmdi-share"></i></h3>
            <ul>
              <li>BY <span style="text-transform: uppercase;">{!!config('site.title')!!}</span> | {!!$page->cat_name!!}</li>
             <!--  <li><i class="zmdi zmdi-comments"></i> 5k Comments</li> -->
            </ul>
            <hr>
           {!!$page->body!!}

            <div class="mt-5">
               @php($count=0)
               @if($lists->count() > 0)
              <h3 class="mb-5"><span>Related</span> Blogs</h3>
 @foreach($lists as $lt_val)
 
    @php($count++)
              <div class="r-row">
                <div class="row">
                  <div class="col-lg-4 col-md-4 pr-2">
                    <div class="img-hldr">
                        <a href="{{url('/'.$lt_val->slug)}}">
                      <img src="{{ asset('/uploads/'.$lt_val->bannerimage) }}" alt="" style="width: 100%;">
                    </a>
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8">
                    <div class="r-blog">
                      <h3> <a href="{{url('/'.$lt_val->slug)}}">{!!$lt_val->page_title!!}<!-- <i class="zmdi zmdi-share"></i> --></a></h3>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <div class="date-blog">
                          <p><?=date('d',strtotime($lt_val->created_at));?></p>
                          <p><?=date('M, Y',strtotime($lt_val->created_at));?></p>
                        </div>
                      </div>
                      <div class="col-9 para-blog">
                        <p style="text-transform:uppercase;">BY <span>{!!config('site.title')!!}</span> | {!!$page->cat_name!!}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
         @endforeach
            @endif

            </div>

            <!-- leave a reply -->
            <div class="reply-hldr">
              <h3><span>Leave a</span> Reply</h3>
              <div class="hm-contact">
                   @if($errors->any())   
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
            </div>
            @endif
             @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Success</h4>
                Post has been successful.
              </div>
              @endif
          <form method="POST" action="{{ url('comment') }}" class="customvalidation">
              @csrf
              <input type="hidden" name="blogid" value=" {!!$page->id!!}">
                  <div class="form-group">
                    <input type="text" placeholder="Your full name*" class="form-control" data-validation-engine="validate[required]" name="fullname" value="{{ old('fullname') }}">
                  </div>
                  <div class="form-group">
                    <input type="email" placeholder="Your mail id**" class="form-control" data-validation-engine="validate[required,custom[email]]" name="email" value="{{ old('email') }}">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" data-validation-engine="validate[required]" name="message" placeholder="Your message*">{{ old('message') }}</textarea>
                  </div>
                  <input type="submit" value="Send message">
                </form>
              </div>
            </div>




            <div class="comments">
              <h3 class="comments-title">{{$comment_list->count()}} Comments</h3>
            
              <ol class="media-list">
            @foreach($comment_list as $val)
                <li id="comment-878" class="comment even thread-even depth-1 media comment-878">
                 <div class="img-hldr"><img alt="" src="{{ asset('frontend') }}/images/img.png"></div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#"> {!!$val->fullname!!}</a></h4>
                    <p class="post-meta"><a
                          href="#"><?=date('F',strtotime($val->created_at));?>
                          <?=date('d, Y',strtotime($val->created_at));?></a></time>
                    </p>
            
            
                    <p>{!!$val->message!!}</p>
            
                    <div class="comment-reply">
                    </div>
                  </div>
                </li>
                  @endforeach
            
              </ol>
            
            
            </div>
          </div>
        </div>

        <!-- right column -->
        <div class="col-lg-4 col-md-4">
          <div class="hldr">
            <h4>Search Bar</h4>
           <form action="{{url('/')}}/blog" method="get">
                    <div class="search">
                        <input type="text" name="s" placeholder="Search your keyword" value="{{Request()->s}}">
                        <input type="submit" value="">
                    </div>
                    </form>
          </div>

          <div class="hldr">
            @foreach($blog as $lval)
<?php

$service_extra = get_fields_value_where('pages_extra',"page_id=".$lval->id,'id','desc');
?>
@foreach($service_extra as $val)
  @if($val->type==3)
            @if($val->title)<h4>{!!$val->title!!}</h4>@endif
            {!!$val->body!!}
             @endif
 @endforeach
@endforeach
          </div>

          <div class="hldr sld-hldr">
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

          <div class="hldr">
            <h4>Top Categories</h4>
           <form action="{{url('/')}}/blog" method="get">
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="c" onchange="this.form.submit()">
                        <option selected>Select categories</option>
                         @foreach($category as $val)
                        <option <?php if(Request()->c==$val->id){echo"selected";}?> value="{!!$val->id!!}">{!!$val->name!!}</option>
                        @endforeach
                      </select>
                  </form>
          </div>

          <div class="hldr follow mt-0">
            <h4>Follow us</h4>
            <ul class="social">
              <li><a href="{!!config('site.facebook_link')!!}" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
            <li><a href="{!!config('site.twitter_link')!!}" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
          
            <li><a href="{!!config('site.instagram_link')!!}" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
          <li><a href="{!!config('site.pinterest')!!}" target="_blank"><i class="zmdi zmdi-pinterest"></i></a></li>
          <li><a href="{!!config('site.youtube_link')!!}" target="_blank"><i class="zmdi zmdi-youtube-play"></i></a></li>
            </ul>
          </div>

          <!-- <div class="hldr">
            <h4>Search Bar</h4>
            <div class="search">
              <input type="text" placeholder="Search your keyword">
              <input type="submit" value="">
            </div>
          </div> -->

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

        </div>
      </div>
    </div>

    <!-- <div class="bgg">
      <img src="{{ asset('frontend') }}/images/cnt-bg.png" alt="">
    </div> -->
  </div>
  <!--blog End-->

@include('frontend.footer')