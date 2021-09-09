@include('admin.header')

@include('admin.sidebar')
@php
$page_display_in_array = unserialize(Page_Display_In_Array);
$page_template_array = unserialize(Page_Template_Array);
$display_in=0;
if(old('menu_order')>0)
{
  $menu_order = old('menu_order');
}else{
  $header_menu = get_fields_value_where('pages',"parent_id='0'",'menu_order','desc');
  $menu_order = count($header_menu)?$header_menu[0]->menu_order+1:1;
}

$allpages = get_fields_value_where('pages',"id>0",'menu_order','asc');


$page_section_array = unserialize(Page_Section_Array);
@endphp

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Page
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Page</li>
    </ol>
  </section>

  
  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-xm-12 col-sm-12 col-md-12">

        <div class="box box-primary">
          <div class="box-header with-border">
            <!--<h3 class="box-title">Quick Example</h3>-->
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ url('/admin/jobpage/add/') }}"  method="post" enctype="multipart/form-data" class="formvalidation">

            @csrf

            <input type="hidden" name="id" value="0">
            <input type="hidden" name="posttype" value="jobsearch">
            <input type="hidden" name="page_template" value="10">
            <div class="box-body">

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
                Country Page has been added successfully.
              </div>
              @endif

              @if (session()->has('remove_image_success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Success</h4>
                Image has been removed successfully. 
              </div>
              @endif

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control module_name" name="page_name" id="page_name" data-validation-engine="validate[required]" placeholder="Enter ..." value="{{ old('page_name') }}">
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="page_title" id="page_title" placeholder="Enter ..." value="{{ old('page_title') }}">
                </div>
              </div>
              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Slug</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control module_slug" name="slug" id="slug" placeholder="Enter ..." value="{{ old('slug') }}" data-validation-engine="validate[required]">
                </div>
              </div>

              <div class="form-group clearfix bannerimage">
                <label class="col-sm-2 control-label">Banner Image</label>
                <div class="col-sm-10">
                  <input type="file" name="bannerimage" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]" >
                    Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
                </div>
              </div>
              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Banner Button URL</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="btn_url" id="btn_url" placeholder="Enter ..." value="{{ old('btn_url') }}">
                </div>
              </div>
              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Banner Button Text</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="btn_text" id="btn_text" placeholder="Enter ..." value="{{ old('btn_text') }}">
                </div>
              </div>

              <?php /*<div class="form-group clearfix">
                <label class="col-sm-2 control-label">Parent</label>
                <div class="col-sm-4">
                  <select name="parent_id" class="form-control">
                    <option value="0">Select Parent</option>
                @foreach($all_pages as $key => $value)
                <option value="{!! $value->id !!}" @if($value->id==old('parent_id')) selected @endif>{!! $value->page_name !!}</option>
                @endforeach
                  </select>
                </div>
                <label class="col-sm-2 control-label">Page Template</label>
                <div class="col-sm-4">
                  <select name="page_template" class="form-control">
                    <option value="0">Select Template</option>
                @foreach($page_template_array as $key => $value)
                <option value="{!!$key!!}" @if($key==old('page_template')) selected @endif>{!!$value!!}</option>
                @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Display in</label>
                <div class="col-sm-4">
                @foreach($page_display_in_array as $key => $value)
                <label>
                  <input type="radio" name="display_in" class="flat-red" value="{{$key}}" @if($key==$display_in) checked @endif>
                  {!! $value !!} &nbsp;&nbsp;
                </label>
                @endforeach
                </div>
                <label class="col-sm-2 control-label">Menu Link</label>
                <div class="col-sm-4">
                  <select name="menu_link" class="form-control select2">
                    <option value="">Own Link</option>
                @foreach($allpages as $key => $value)
                <option value="{!! $value->id !!}" @if($value->id==old('menu_link')) selected @endif>{!! $value->page_name !!}</option>
                @endforeach
                  </select>
                </div>
              </div>*/ ?>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Menu Order</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="menu_order" id="menu_order" placeholder="Enter ..." value="{{ $menu_order }}" data-validation-engine="validate[required,custom[integer]]">
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Meta Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter ..." value="{{ old('meta_title') }}">
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Meta Keyword</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="meta_keyword" placeholder="Enter ...">{{ old('meta_keyword') }}</textarea>
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Meta Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="meta_description" placeholder="Enter ...">{{ old('meta_description') }}</textarea>
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Schema Code</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="schema_code" placeholder="Enter ...">{{ old('schema_code') }}</textarea>
                </div>
              </div>
              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Post name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="job_type" id="job_type" placeholder="Enter ..." value="{{ old('job_type') }}">
                </div>
              </div>
              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Location</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="location" placeholder="Enter ...">{{ old('location') }}</textarea>
                </div>
              </div>
              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Content</label>
                <div class="col-sm-10">
                  <textarea class="form-control ckeditor" name="body" placeholder="Enter ...">{{ old('body') }}</textarea>
                </div>
              </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
            </div>

            </form>
          </div>
          <!-- /.box -->

        </div>


      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->


@section('more-scripts')
<script type="text/javascript">
$(document).ready(function() {
  var wrapper       = $(".add_section"); //Fields wrapper
  var add_button      = $(".add_section_btn"); //Add button ID

  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    section_new_type = $(".section_new_type").val();
    var html = '';
    if (section_new_type>0) {
      html = $(".type"+section_new_type).html();
    }
    if (html) {
      $(wrapper).append(html); //add input box
    }
    
  });
  
  $(wrapper).on("click",".remove_field", function(e){ //Company click on remove text
    e.preventDefault(); 
    //$(this).parent('div').parent('div').parent('div').remove();
    $(this).parents('.sn').remove();
  })
});
</script>

<script type="text/javascript">
$("#module_name").blur(function(){
  if($("#module_slug").val().trim()==""){
    var slug_array = $("#module_name").val().trim().replace(/[^a-z0-9\s]/gi, ' ').replace(/[_\s]/g, ' ').toLowerCase().split(" ");
    slug_array = filter_array(slug_array);
    $("#module_slug").val(slug_array.join("-"));
  }
});

$("#module_slug").blur(function(){
  if($("#module_slug").val().trim()==""){
    var slug_array = $("#module_name").val().trim().replace(/[^a-z0-9\s]/gi, ' ').replace(/[_\s]/g, ' ').toLowerCase().split(" ");
    slug_array = filter_array(slug_array);

    $("#module_slug").val(slug_array.join("-"));
  }else{
    var slug_array = $("#module_slug").val().trim().replace(/[^a-z0-9\s]/gi, ' ').replace(/[_\s]/g, ' ').toLowerCase().split(" ");
    slug_array = filter_array(slug_array);
    $("#module_slug").val(slug_array.join("-"));
  }
});
</script>
@stop

@include('admin.footer')



