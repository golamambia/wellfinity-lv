@php
$footer_menu_page = get_fields_value_where('pages',"(display_in='2' or display_in='3') and posttype='page'",'menu_order','asc');
$bloglist = get_fields_value_where('pages',"posttype='post'",'id','desc',5);
$inner_foot='';
if($page->id==7)
$inner_foot='inner-footer';
else if($page->id==4)
$inner_foot='inner-footer';
else if($page->page_template==8)
$inner_foot='inner-footer';
@endphp

  <div class="footer {{$inner_foot}}">
  <div class="footer-logo"><a href="{{ url('/') }}">
    
    <img src="{!! ( config('site.footer_logo') && File::exists(public_path('uploads/'.config('site.footer_logo'))) ) ? asset('/uploads/'.config('site.footer_logo')) : asset('/frontend/images/ftr-logo.png') !!}" alt="">
  </a></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".2s ">
        <h6>Recent Posts</h6>
        <ul class="link">
         
           @foreach($bloglist as $lt_val)
 <?php
$extra_datamn = get_fields_value_where('pages_extra',"page_id=".$lt_val->id,'id','desc');
$i=0;
?>
<li><a href="{{url('/'.$lt_val->slug)}}">{{strip_tags($lt_val->page_title)}}</a></li>
  @endforeach
        </ul>
      </div>
      <div class="col-lg-2 col-md-2 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".3s ">
        <h6>Shortcuts</h6>
        <ul class="link">
           @foreach($footer_menu_page as $menu)
                      <?php
                      $slug = $menu->slug;
                      if ($menu->menu_link>0) {
                        $slug = get_field_value('pages',"slug",'id',$menu->menu_link);
                      }
                      $slug = ($menu->id==1) ? '' : $slug ;
                      ?>
                      <li><a href="{{url('/'.$slug)}}">{!!$menu->page_name!!}</a></li>
                      @endforeach
        </ul>
      </div>
      <div class="col-lg-3 col-md-3 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".4s ">
        <h6>Fresh From The Blog</h6>
        <ul class="link">
          <li><a href="#">Ten Tips for Working from
            Home <span>January 13, 2021</span></a></li>
          <li><a href="#">2021: The Year You Finally
            Tell Your Story <span>January 7, 2021</span></a></li>
          <li><a href="#">Vitamin D & Boosting Your 
            Immunity, Sun Chlorella 
            <span>November 17, 2020</span></a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-3 wow fadeInUp " data-wow-deuration="2s " data-wow-delay=".5s ">
        <h6>Keep In Touch With Us</h6>
        <p>Information about current events related to our company</p>
         <form method="POST" action="{{ url('sub-form') }}" class="customvalidation">
              @csrf
        <div class="newsletter">
          <input type="text" placeholder="Email Address" data-validation-engine="validate[required,custom[email]]" name="email" value="{{ old('email') }}">
          <input type="submit" value="Subscribe">
        </div>
      </form>
        <ul class="social">
         <li><a href="{!!config('site.facebook_link')!!}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="{!!config('site.twitter_link')!!}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="mailto:{!!config('site.email')!!}" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
            <li><a href="{!!config('site.instagram_link')!!}" target="_blank"><i class="fab fa-instagram"></i></a></li>
          <li><a href="{!!config('site.pinterest')!!}" target="_blank"><i class="zmdi zmdi-pinterest"></i></a></li>
          <li><a href="{!!config('site.youtube_link')!!}" target="_blank"><i class="zmdi zmdi-youtube-play"></i></a></li>
        </ul>
      </div>
      <div class="col-lg-12">
        <p class="ftr-bottom">@<?=date('Y');?> <a href="{{ url('/') }}">{!!config('site.title')!!}</a>. {!!config('site.right_reserve')!!}</p>
      </div>
    </div>
  </div>
</div>
<button class="footer-arrow" onclick="topFunction()" id="myBtn" title="Go to top"><img src="{{ asset('frontend') }}/images/arrow.png" alt=""></button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset('/frontend/js/owl.carousel.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="{{asset('/frontend/js/wow.min.js')}}"></script>
<script src="{{asset('/frontend/js/custome.js')}}"></script>



<div id="loading"><div class="loader"></div></div>

<!-- Alert Message Modal -->
<div class="modal" id="alertMessage" tabindex="-1" role="dialog" aria-labelledby="alertMessage" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content" style="max-width: 610px;">
      <div class="modal-body">
        <h5 class="modal-title title">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        <div class="clearfix"></div>
        <div class="content"></div>
      </div>
    </div>
  </div>
</div>

<!-- Confirm Modal -->
<div id="deleteModal" class="modal" role="dialog">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">      
      <div class="modal-body">
        <h4 class="title"></h4>   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        <div class="clearfix"></div>
        <div class="content text-center">
          
        </div>
        <div class="modal-footer">
          <button class="btn btnTxt" data-dismiss="modal" aria-hidden="true">Cancel</button>
          <a class="btn" id="dataConfirmOK">Delete</a>
        </div>
      </div>      
    </div>
  </div>
</div>



<!-- Validation JS -->
<script src="{{ asset("/frontend/js/jquery.validationEngine.min.js") }}"></script>
<script src="{{ asset("/frontend/js/jquery.validationEngine-en.js") }}"></script>
<script>
  function customvalidation()
  {
    jQuery(".customvalidation").validationEngine('attach', {
      relative: true,
      overflownDIV:"#divOverflown",
      promptPosition:"topLeft"
    });
    jQuery(".customvalidation_bottom").validationEngine('attach', {
      relative: true,
      overflownDIV:"#divOverflown",
      promptPosition:"bottomLeft"
    });
  }
  customvalidation();

  var confirmModal = function(){
    $('#deleteModal .modal-body .content').html($(this).attr('data-confirm'));
    $('#deleteModal .title').html($(this).attr('data-title'));
    $('#dataConfirmOK').attr('href',$(this).attr('href'));
    $('#deleteModal').modal('show');
    return false;
  };

  $('body').on('click', 'a[data-confirm]', confirmModal);
//alert('eee');
// $("#alertMessage").modal('show');
$(document).ready(function() {
    $('.numeric_input').keydown(function(event) {
return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )


      
    });
});
</script>

<!-- @if(Session::has('message')) 
<script>
 $(window).on('load', function () {

    $("#alertMessage .title").hide();
    $("#alertMessage .content").empty().html('{!! Session::get('message')!!}');
    // $("#alertMessage").fadeIn();
    $("#alertMessage").modal('show');
    setTimeout(function() { $('#alertMessage').fadeOut(); }, {!! config('site.message_show_time')*1000 !!});
  });
</script>
@endif -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      @if(Session::has('message')) 

                            <script>
                                swal({
                                    title: "Done",
                                    text: "{!! Session::get('message')!!}",
                                    //timer: 5000,
                                    icon: "success",
                                    button: "ok",
                                    type: 'success'

                                });
                            </script>

   @endif

@if(Session::has('successswt')) 

                            <script>
                                swal({
                                    title: "Done",
                                    text: "{!! Session::get('successswt')!!}",
                                    //timer: 5000,
                                    icon: "success",
                                    button: "ok",
                                    type: 'success'

                                });
                            </script>

   @endif

       @if(Session::has('errorswt')) 
        
        <script>
        swal({
        title: "Error",
         text: "Sorry, something went wrong",
        //timer: 5000,
        icon: "error",
        button: "ok",
        type: 'error'
        
        });
        </script>
        
       @endif
@yield('more-scripts')

</body>
</html>