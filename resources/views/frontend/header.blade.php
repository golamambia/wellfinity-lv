
     
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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset("/frontend/css/material-design-iconic-font.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/frontend/css/style.css") }}">
  <link rel="stylesheet" href="{{ asset("/frontend/css/owl.carousel.css") }}">
   <link rel="stylesheet" href="{{ asset("/frontend/css/owl.theme.default.min.css") }}">
   <link rel="stylesheet" href="{{ asset("/frontend/fonts/stylesheet.css") }}">
   <link rel="stylesheet" href="{{ asset("/frontend/css/animate.css") }}" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
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
 
<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <ul class="cntc">
          <li><i class="zmdi zmdi-pin"></i>{!!config('site.address')!!}</li>
          <li><i class="zmdi zmdi-email"></i>{!!config('site.email')!!}</li>
          <li><i class="zmdi zmdi-phone-in-talk"></i> {!!config('site.phone')!!}</li>
        </ul>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <ul class="social">
          <li><a href="{!!config('site.twitter_link')!!}" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
          <li><a href="{!!config('site.facebook_link')!!}" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
          <li><a href="{!!config('site.instagram_link')!!}" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
          <li><a href="{!!config('site.pinterest')!!}" target="_blank"><i class="zmdi zmdi-pinterest"></i></a></li>
          <li><a href="{!!config('site.youtube_link')!!}" target="_blank"><i class="zmdi zmdi-youtube-play"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--top header end-->
<div class="header">
  <div class="container">
      <div class="row">
            <nav class="navbar navbar-expand-sm">
              <!-- Brand -->
              <a class="navbar-brand" href="{{ url('/') }}"><img src="{!! ( config('site.logo') && File::exists(public_path('uploads/'.config('site.logo'))) ) ? asset('/uploads/'.config('site.logo')) : asset('/frontend/images/logo.png') !!}"></a>
            
              <!-- Links -->
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">

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
        <li class="nav-item {!!$active_menu!!}  @if($header_sub_menu->count() > 0) dropdown @endif"><a class="nav-link @if($header_sub_menu->count() > 0) dropdown-toggle @endif" href="{{url('/'.$slug)}}"  @if($header_sub_menu->count() > 0) data-toggle="dropdown" @endif>{!!$menu->page_name!!}  </a>
         
          @if($header_sub_menu->count() > 0)
         <div class="dropdown-menu">
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
          <a class="dropdown-item {!!$active_sub_menu!!}" href="{{url('/'.$sub_menu->slug)}}">{{$sub_menu->page_name}}</a>
          @endforeach
         
          </div>
          @endif
        </li>
        @endforeach
              
             
              </ul>
            </div>
            <form id="app" action="#">
              <label :data-state="state" for="search">
                <input type="text" placeholder="Search" @click="state = 'opan'" @blur="state='close'"/>
                <i class="zmdi zmdi-search"></i>
              </label>
              </form>
            </nav>
          
        </div>
  </div>
</div>
<!--Header End-->






