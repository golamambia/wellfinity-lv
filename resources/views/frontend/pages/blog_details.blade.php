@include('frontend.header')

@foreach($blog_extra_data as $val)
  @if($val->type==1)
<!------ banner area start -------->
<div class="subpagr_banner" style="background-image:url({{ asset('/uploads/'.$val->image) }});">
  <div class="container">
     @if($blog->page_title)<h1>{!!$blog->page_title!!}</h1>@endif
    
    <nav class="breadcrumb"> <a class="breadcrumb-item" href="{{ url('/') }}">home</a> <a class="breadcrumb-item" href="{{ url($blog->slug) }}">{!!$blog->page_name!!}</a> <span class="breadcrumb-item active">{!!$page->page_name!!}</span> </nav>
  </div>
</div>
<!------ banner area stop --------> 
 @endif
@endforeach
<!------ main area start -------->
<!------ main area start -------->

<div class="mainarea p-80">
<section class="inner-blog-section-start">
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    <div class="inner-main-blog-box">
                        @if( $page->bannerimage && File::exists(public_path('uploads/'.$page->bannerimage)))<img src="{{ asset('/uploads/'.$page->bannerimage) }}" class="img-fluid blog-img" alt="">@endif 
                        <div class="blog-caption-box">
                            <p class="blg-date">
                              <?php
                              $get_date = ($page->updated_at) ? $page->updated_at : $page->created_at;
                              if (date('Y', strtotime($get_date))==date('Y')) {
                                $print_date = "<span>".date('d', strtotime($get_date))."</span> ";
                                $print_date .= date('M', strtotime($get_date));
                              }else{
                                $print_date = "<span>".date('d', strtotime($get_date))."</span> ";
                                $print_date .= date('M', strtotime($get_date));
                                $print_date .= ' '.date('Y', strtotime($get_date));
                              }
                              echo $print_date;
                              ?>
                            </p>
                            <ul class="list-inline blg-date-comments">
                                <li><i class="fa fa-user-circle" aria-hidden="true"></i> <a href="">By admin</a></li>
                                <!-- <li><i class="fa fa-comments" aria-hidden="true"></i> <a href="">2 Comments</a></li> -->
                            </ul>
                            <h4>{!!$page->page_title?$page->page_title:$page->page_name!!}</h4>
                            {!!($page->body)!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blg-search">
                      <form method="get" action="{{url($blog->slug)}}">
                        
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Here" name="s" value="{{request()->s}}">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                      </form>
                    </div>
                    <div class="blog-right-box">
                        <h4>Latest posts</h4>
                        @foreach($latest_blog as $val)
                        <div class="media">
  @if( $val->bannerimage && File::exists(public_path('uploads/'.$val->bannerimage)))<a href="{{url($val->slug)}}"><img  src="{{ asset('/uploads/'.$val->bannerimage) }}" class="img-fluid blog-single-right-img" alt="" title="{!!$val->page_title?$val->page_title:$val->page_name!!}"></a>@endif
  <div class="media-body">
    
    <p><a href="{{url($val->slug)}}">{!!get_short_name($val->page_title?$val->page_title:$val->page_name)!!}</a></p>
    
  </div>
</div>
                        
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- <img src="image/about-shape2.png" class="img-fluid contact-shape-1" alt=""> -->
    </section>
</div>
<!------ main area stop --------> 


@include('frontend.footer')