<?php
$servicelp = get_fields_value_where('pages',"page_template=3",'id','desc');
//echo $servicelp->count();
?>
     
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php if(@$setting[0]->value){ echo @$setting[0]->value.' | '.config('site.title') ; }else{ echo config('site.title'); } ?></title>
  <meta name="keywords" content="<?php if(@$setting[1]->value){ echo @$setting[1]->value ; }else{ echo config('site.meta_keyword'); } ?>">
  <meta name="description" content="<?php if(@$setting[2]->value){ echo @$setting[2]->value ; }else{ echo config('site.meta_description'); } ?>">
    @if(config('site.logo2') && File::exists(public_path('uploads/'.config('site.logo2'))))
    <link rel="shortcut icon" href="{!! ( config('site.logo2') && File::exists(public_path('uploads/'.config('site.logo2'))) ) ? asset('/uploads/'.config('site.logo2')) : '' !!}" type="image/x-icon" />
    @endif

<?php 
if (@$page) {
  echo $page->schema_code;
}elseif (@$country) {
  echo $country->schema_code;
}
?>
      
    <link rel="stylesheet" type="text/css" href="{{ asset("/frontend/css/validationEngine.jquery.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/frontend/custom-style.css") }}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
<!-- Bootstrap -->
<link href="{{ asset("/frontend/css/bootstrap.min.css") }}" rel="stylesheet">
<!--<link href="css/jquery.popup.min.css" rel="stylesheet" type="text/css">-->
<link href="{{ asset("/frontend/css/style.css") }}" rel="stylesheet">
<link href="{{ asset("/frontend/css/responsive.css") }}" rel="stylesheet">
<link href="{{ asset("/frontend/css/thimepage.css") }}" rel="stylesheet" type="text/css">
<link href="{{ asset("/frontend/css/timepick.css") }}" rel="stylesheet" type="text/css">
{!! config('site.google_analytics') !!}
</head>

<body class="host_version">
{!! config('site.google_body_tag') !!}
@php
$header_menu = get_fields_value_where('pages',"(display_in='1' or display_in='3') and posttype='page' and parent_id='0'",'menu_order','asc');
$header_class = 'privacy-header';
 if (@$extra_data) {

  foreach($extra_data as $val){
      if($val->type==1 && $val->image && File::exists(public_path('uploads/'.$val->image)) ){
      $header_class = '';
    }
  }
}
@endphp
 

<div class="topheader clearfix">
  <div class="container clearfix">
    <div class="call">
      <h5><i class="fas fa-phone-alt"></i><a href="tel:{!!config('site.phone')!!}">{!!config('site.phone')!!}</a></h5>
    </div>
   <!--  <div class="marquee_text">This text flows right to left by jQuery marquee Plug-In. That direction and speed can optionally be changed.</div> -->

    <marquee class="marquee_text" behavior="scroll" gap="0" truespeed="" direction="left" scrollamount="2" scrolldelay="50" onmouseover="this.stop();" onmouseout="this.start();">
Our Communities groups are inviting new and bringing residents back. 
</marquee>
    <div class="topr">
      <h6><i class="fas fa-envelope"></i><a href="mailto:{!!config('site.email')!!}">{!!config('site.email')!!}</a></h6>
      <div class="social">
        <ul>
          <li><a href="{!!config('site.facebook_link')!!}"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="{!!config('site.twitter_link')!!}"><i class="fab fa-twitter"></i></a></li>
            
            <li><a href="{!!config('site.instagram_link')!!}"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<header class="header_area clearfix">
  <div class="container clearfix">
    <div class="logo"><a  href="{{ url('/') }}"><img class="logoone" src="{!! ( config('site.logo') && File::exists(public_path('uploads/'.config('site.logo'))) ) ? asset('/uploads/'.config('site.logo')) : asset('/frontend/images/logo.png') !!}"></a>   </div>
    <div class="header_right d-flex align-items-center clearfix">
      <div class="menu">
        <div class="menuButton"> <span></span> <span></span> <span></span> </div>
        <ul>
          <?php          
        $counter = 0;
        ?>
        @foreach($header_menu as $menu)
        <?php
        $counter++;
        $slug = $menu->slug;
        if ($menu->menu_link>0) {
          $slug = get_field_value('pages',"slug",'id',$menu->menu_link);
        }
        $slug = ($menu->id==1) ? '' : $slug ;
        $active_menu = '';
        if (@$page) {
          $active_menu = ($page && ($page->parent_id==$menu->id || $page->id==$menu->id || $menu->menu_link==$page->id)) ? 'active' : '' ;
        }
        $header_sub_menu = get_fields_value_where('pages',"(display_in='1' or display_in='3') and parent_id='".$menu->id."'",'menu_order','asc');
        ?>
        <li class="{!!$active_menu!!}"><a  href="{{url('/'.$slug)}}">{!!$menu->page_name!!} @if($header_sub_menu->count() > 0)<span><i class="fas fa-chevron-down"></i></span>@endif </a>
         
          @if($header_sub_menu->count() > 0)
          <ul>
          @foreach($header_sub_menu as $sub_menu)
          <?php
          $sub_slug = $sub_menu->slug;
          if ($sub_menu->menu_link>0) {
            $sub_slug = get_field_value('pages',"slug",'id',$sub_menu->menu_link);
          }
          $sub_slug = ($menu->id==1) ? '' : $sub_slug ;
          $active_sub_menu = '';
          if (@$page) {
            $active_sub_menu = ($page && ($page->parent_id==$sub_menu->id || $page->id==$sub_menu->id || $sub_menu->menu_link==$page->id)) ? 'active' : '' ;
          }
          ?>
          <li class="{!!$active_sub_menu!!}"><a  href="{{url('/'.$sub_menu->slug)}}">{{$sub_menu->page_name}}</a></li>
          @endforeach
         
          </ul>
          @endif
        </li>
        @endforeach
        </ul>
      </div>
      <div class="header_rightresponsivebox d-flex align-items-center">
        <ul class="d-flex align-items-center">
            
        <?php
        $header_mn = get_fields_value_where('pages',"page_template=12",'id','desc');
        //$counter++;
        //echo $slug = $menu->page_template;
        
        ?>
         @foreach($header_mn as $menu)
          @if($menu->page_template=='12')
           
          <li><a href="{{ url('/'.$menu->slug) }}" class="btn btn-primary"><span> <img src="{{asset('/frontend/images/boockingicon.png')}}" alt=""></span>{!!$menu->page_name!!}</a></li>
         @endif
          @endforeach
          <li><a href="tel:{!!config('site.phone')!!}" class=""><i class="fas fa-phone-alt"></i></a></li>
          <li><a href="mailto:{!!config('site.email')!!}" class=""><i class="fas fa-envelope"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</header>






