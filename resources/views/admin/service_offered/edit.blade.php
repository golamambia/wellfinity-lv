@include('admin.header')

@include('admin.sidebar')
@php
$page_display_in_array = unserialize(Page_Display_In_Array);
$page_template_array = unserialize(Page_Template_Array);

$allpages = get_fields_value_where('pages',"id>0",'menu_order','asc');

$page_section_array = unserialize(Page_Section_Array);
@endphp

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Data
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Data</li>
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
          <form role="form" action="{{ url('/admin/service_offer/update/') }}"  method="post" enctype="multipart/form-data" class="formvalidation">

            @csrf

            <input type="hidden" name="id" value="{{$page[0]->id}}">
            <input type="hidden" name="posttype" value="service_offer">

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
                Page has been updated successfully.
              </div>
              @endif

              @if (session()->has('remove_image_success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Success</h4>
                Image has been removed successfully. 
              </div>
              @endif

              @if (session()->has('admin_msg'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Success</h4>
                {!! Session::get('admin_msg')!!}
              </div>
              @endif

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control module_name" name="page_name" id="page_name" data-validation-engine="validate[required]" placeholder="Enter ..." value="{{$page[0]->page_name}}">
                </div>
              </div>

              @if($page[0]->id!='1')
              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="page_title" id="page_title" placeholder="Enter ..." value="{{$page[0]->page_title}}">
                </div>
              </div>
              @endif

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Slug</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control module_slug" name="slug" id="slug" placeholder="Enter ..." value="{{ $page[0]->slug }}" data-validation-engine="validate[required]" @if('5'==$page[0]->id || '1'==$page[0]->id) readonly @endif>
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Parent</label>
                <div class="col-sm-4">
                  <select name="parent_id" class="form-control">
                    <option value="0">Select Parent</option>
                @foreach($all_pages as $key => $value)
                <option value="{!! $value->id !!}" @if($value->id==$page[0]->parent_id) selected @endif>{!! $value->page_name !!}</option>
                @endforeach
                  </select>
                </div>
                <label class="col-sm-2 control-label">Page Template</label>
                <div class="col-sm-4">
                  <select name="page_template" class="form-control">
                    <option value="0">Select Template</option>
                    @foreach($page_template_array as $key => $value)
                    <option value="{!!$key!!}" @if($key==$page[0]->page_template) selected @endif>{!!$value!!}</option>
                    @endforeach
                  </select>
                </div>
              </div><?php /**/ ?>


              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Display in</label>
                <div class="col-sm-4">
                @foreach($page_display_in_array as $key => $value)
                <label>
                  <input type="radio" name="display_in" class="flat-red" value="{{$key}}" @if($key==$page[0]->display_in) checked @endif>
                  {!! $value !!} &nbsp;&nbsp;
                </label>
                @endforeach
                </div>
                <label class="col-sm-2 control-label">Menu Link</label>
                <div class="col-sm-4">
                  <select name="menu_link" class="form-control select2">
                    <option value="">Own Link</option>
                    @foreach($allpages as $key => $value)
                    <option value="{!! $value->id !!}" @if($value->id==$page[0]->menu_link) selected @endif>{!! $value->page_name !!}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Menu Order</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="menu_order" id="menu_order" placeholder="Enter ..." value="{{ $page[0]->menu_order }}" data-validation-engine="validate[required,custom[integer]]">
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Meta Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="meta_title" placeholder="Enter ..." value="{{ $page[0]->meta_title }}">
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Meta Keyword</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="meta_keyword" placeholder="Enter ...">{{ $page[0]->meta_keyword }}</textarea>
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Meta Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="meta_description" placeholder="Enter ...">{{ $page[0]->meta_description }}</textarea>
                </div>
              </div>

              <div class="form-group clearfix">
                <label class="col-sm-2 control-label">Schema Code</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="schema_code" placeholder="Enter ...">{{ $page[0]->schema_code }}</textarea>
                </div>
              </div>

              <div class="form-group clearfix bannerimage">
                <label class="col-sm-2 control-label">Home Image</label>
                <div class="col-sm-10">
                  <input type="file" name="bannerimage" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]" >
                  Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>

                  @if($page[0]->bannerimage!='')
                  <div class="clearfix">
                    <?php
                    if($page[0]->bannerimage && File::exists(public_path('uploads/'.$page[0]->bannerimage)) )
                      {
                        ?>
                        <img src="{{ asset('/uploads/'.$page[0]->bannerimage) }}" style="margin: 10px 0 0 0;max-width: 300px;">
                        <?php
                      }
                      ?>
                    </div>
                    @endif

                </div>
              </div>
              

                @if($page[0]->id=='0')
                <div class="form-group clearfix">
                  <label class="col-sm-2 control-label">Page Content</label>
                  <div class="col-sm-10">
                    <textarea name="body" class="ckeditor" placeholder="Enter ...">{!! $page[0]->body !!}</textarea>
                  </div>
                </div>
                @endif

                <?php $type=''; $i=0;$content_count=0;
                $all_type = [];
                ?>
                  <div class="section_1">
                @foreach($page_extra as $val)
                  @if($val->type!='0')
                  <?php
                  if (!in_array($val->type, $all_type)) {
                    $all_type[] = $val->type;
                  }
                  if (($type=='' || $type!=$val->type)) {    $i++;
                    if ($type!='' && $type!=$val->type) {
                      $content_count=0;
                      echo '</div><div class="section_'.$val->type.'">';
                    }
                  ?>
                  <div class="box-header with-border" style="margin-bottom: 15px;">
                    <h3 class="box-title">Section
                      @if($val->type==211 && $page[0]->id=='1') Strength 
                      @elseif($val->type==311 && $page[0]->id=='5') Form
                      @else {{$val->type}} 
                      @endif 
                    </h3>
                  </div>
                  <?php
                  }
                    $content_count++;
                  $type = $val->type
                  ?>

                  @if($val->section_type==1 || $val->section_type==3)
                    <div class="form-group clearfix">
                      <label class="col-sm-2 control-label">{{$val->section_type==1?'Banner ':''}} Image</label>
                      <div class="{{$val->section_type==3?'col-sm-8':'col-sm-10'}}">
                        <input type="file" class="form-control" name="section_file_{{$val->id}}" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
                        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>

                        <div class="clearfix">
                          <?php
                          if($val->image && File::exists(public_path('uploads/'.$val->image)) )
                            {
                              ?>
                              <img src="{{ asset('/uploads/'.$val->image) }}" style="margin: 10px 0 0 0;max-width: 200px;"> <a href="{{ url('admin/page-extra/delete/'.$val->id) }}"><i class="fa fa-fw fa-close"></i></a>
                          <?php
                            }
                          ?>
                        </div>
                      </div>
                      @if($val->section_type==3)
                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="section_rank_{{$val->id}}" placeholder="Enter ..." value="{{$val->rank}}" data-validation-engine="validate[custom[integer]]">
                      </div>
                      <div class="col-sm-1">
                        <a href="{{ url('admin/page-extra/delete/'.$val->id) }}"><i class="fa fa-fw fa-close"></i></a>
                      </div>
                      @endif
                    </div>
                  @endif
                  @if($val->section_type!=3 && $val->section_type!=4 && $val->section_type!=5 && $val->section_type!=6)
                    <div class="form-group clearfix">
                      <label class="col-sm-2 control-label">Section Title</label>
                      <div class="{{$val->section_type!=100?'col-sm-8':'col-sm-9'}}">
                        <input type="text" class="form-control" name="section_title_{{$val->id}}" placeholder="Enter ..." value="{{$val->title}}">
                      </div>
                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="section_rank_{{$val->id}}" placeholder="Enter ..." value="{{$val->rank}}" data-validation-engine="validate[custom[integer]]">
                      </div>
                      @if($val->section_type!=100)
                      <div class="col-sm-1">
                        <a href="{{ url('admin/page-extra/delete/'.$val->id) }}"><i class="fa fa-fw fa-close"></i></a>
                      </div>
                      @endif
                    </div>
                  @endif
                  @if($val->section_type==8 || $val->section_type==9 || $val->section_type==10 || $val->section_type==11 || $val->section_type==12 || $val->section_type==14 || $val->section_type==15 || $val->section_type==16 || $val->section_type==17 || $val->section_type==18 || $val->section_type==19)
                    <div class="form-group clearfix">
                      <label class="col-sm-2 control-label">Sub Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="section_sub_title_{{$val->id}}" placeholder="Enter ..." value="{{$val->sub_title}}">
                      </div>
                    </div>
                  @endif
                  @if($val->section_type==9 || $val->section_type==10 || $val->section_type==11 || $val->section_type==12 || $val->section_type==16 || $val->section_type==17 || $val->section_type==18 || $val->section_type==19 || $val->section_type==20 || $val->section_type==21)
                    <div class="form-group clearfix">
                      <label class="col-sm-2 control-label">Image</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="section_file_{{$val->id}}" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
                        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>

                        <div class="clearfix">
                          <?php
                          if($val->image && File::exists(public_path('uploads/'.$val->image)) )
                            {
                              ?>
                              <img src="{{ asset('/uploads/'.$val->image) }}" style="margin: 10px 0 0 0;max-width: 200px;">
                          <?php
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if($val->section_type==11 || $val->section_type==12 || $val->section_type==18 || $val->section_type==19)
                    <div class="form-group clearfix">
                      <label class="col-sm-2 control-label">Image 2</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="section_file2_{{$val->id}}" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
                        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>

                        <div class="clearfix">
                          <?php
                          if($val->image2 && File::exists(public_path('uploads/'.$val->image2)) )
                            {
                              ?>
                              <img src="{{ asset('/timthumb.php') }}?src={{ asset('/uploads/'.$val->image2.'&w=95&h=95&zc=3') }}" style="margin: 10px 0 0 0;">
                          <?php
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if($val->section_type=="1" || $val->section_type==4 || $val->section_type==13 || $val->section_type==14 || $val->section_type==15 || $val->section_type==16 || $val->section_type==17 || $val->section_type==18 || $val->section_type==19 || $val->section_type==20  || $val->section_type==21)
                    <div class="form-group clearfix">
                      <label class="col-sm-2 control-label">Content</label>
                      <div class="{{$val->section_type==4?'col-sm-8':'col-sm-10'}}">
                        <textarea name="section_body_{{$val->id}}" class="ckeditor" placeholder="Enter ...">{!!$val->body!!}</textarea>
                      </div>
                      @if($val->section_type==4)
                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="section_rank_{{$val->id}}" placeholder="Enter ..." value="{{$val->rank}}" data-validation-engine="validate[custom[integer]]">
                      </div>
                      <div class="col-sm-1">
                        <a href="{{ url('admin/page-extra/delete/'.$val->id) }}"><i class="fa fa-fw fa-close"></i></a>
                      </div>
                      @endif
                    </div>
                  @endif 
                  @if($val->section_type==1 || $val->section_type==5 || $val->section_type==6 || $val->section_type==7 || $val->section_type==10 || $val->section_type==12 || $val->section_type==15 || $val->section_type==17 || $val->section_type==19 || $val->section_type==20)
                    <div class="form-group clearfix">
                      <label class="col-sm-2 control-label">Button Text</label>
                      <div class="{{$val->section_type==5 || $val->section_type==6?'col-sm-8':'col-sm-10'}}">
                        <input type="text" class="form-control" name="section_btn_text_{{$val->id}}" placeholder="Enter ..." value="{{ $val->btn_text }}">
                      </div>
                      @if($val->section_type==5 || $val->section_type==6)
                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="section_rank_{{$val->id}}" placeholder="Enter ..." value="{{$val->rank}}" data-validation-engine="validate[custom[integer]]">
                      </div>
                      <div class="col-sm-1">
                        <a href="{{ url('admin/page-extra/delete/'.$val->id) }}"><i class="fa fa-fw fa-close"></i></a>
                      </div>
                      @endif
                    </div>
                    @if($val->section_type!=6)
                    <div class="form-group clearfix">
                      <label class="col-sm-2 control-label">Button URL</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="section_btn_url_{{$val->id}}" placeholder="Enter ..." value="{{ $val->btn_url }}">
                      </div>
                    </div>
                    @endif
                  @endif                 

                  @endif
                @endforeach
                  </div>


              <div class="section_new">
                <div class="box-header with-border" style="margin-bottom: 15px;">
                  <h3 class="box-title">New Section
                  </h3>
                </div>
                <div class="form-group clearfix">
                  <label class="col-sm-2 control-label">Section</label>
                  <div class="col-sm-2">
                    <select name="sn_type" class="form-control select2 sn_type">
                      <option value="">Select Section</option>
                      @foreach($all_type as $key => $value)
                      <option value="{!! $value !!}">Section {!! $value !!}</option>
                      @endforeach
                      <option value="add">New Section Add</option>
                    </select>
                  </div>
                  <label class="col-sm-2 control-label">Section Type</label>
                  <div class="col-sm-4">
                    <select name="sn_section_type" class="form-control select2 sn_section_type">
                      <option value="">Select Section Type</option>
                      @foreach($page_section_array as $key => $value)
                      <option value="{!! $key !!}">{!! $value !!}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-default add_section_btn">Add Section</button>
                  </div> 
                </div> 
                <div class="add_section"></div>              
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


<div class="copy type1 hide">  
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="1">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_t[]" value="">
      <input type="hidden" name="section_new_st[]" value="">
      <input type="hidden" name="section_new_c[]" value="">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Banner Image</label>
      <div class="col-sm-9">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div>
  </div>
</div>

<div class="copy type2 hide"> 
  <div class="sn">    
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="2">
      <input type="hidden" name="section_new_img[]" value="">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_st[]" value="">
      <input type="hidden" name="section_new_c[]" value="">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div>
  </div>
</div>

<div class="copy type3 hide">  
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="3">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_t[]" value="">
      <input type="hidden" name="section_new_st[]" value="">
      <input type="hidden" name="section_new_c[]" value="">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-9">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div>
  </div>
</div>

<div class="copy type4 hide">  
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="4">
      <input type="hidden" name="section_new_img[]" value="">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_t[]" value="">
      <input type="hidden" name="section_new_st[]" value="">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-9">
        <textarea class="form-control ckeditor" name="section_new_c[]" placeholder="Enter ..."></textarea>
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div>
  </div>
</div>

<div class="copy type5 hide">  
  <div class="sn">    
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="5">
      <input type="hidden" name="section_new_img[]" value="">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_t[]" value="">
      <input type="hidden" name="section_new_st[]" value="">
      <input type="hidden" name="section_new_c[]" value="">
      <label class="col-sm-2 control-label">Button Text</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_btn_text[]" placeholder="Enter ..." value="">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button URL</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_url[]" placeholder="Enter ..." value="">
      </div>
    </div>
  </div>
</div>

<div class="copy type6 hide"> 
  <div class="sn">    
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="6">
      <input type="hidden" name="section_new_img[]" value="">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_t[]" value="">
      <input type="hidden" name="section_new_st[]" value="">
      <input type="hidden" name="section_new_c[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Button Text</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_btn_text[]" placeholder="Enter ..." value="">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div>
  </div>
</div>

<div class="copy type7 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="7">
      <input type="hidden" name="section_new_img[]" value="">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_st[]" value="">
      <input type="hidden" name="section_new_c[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button Text</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_text[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button URL</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_url[]" placeholder="Enter ..." value="">
      </div>
    </div>
  </div>
</div>

<div class="copy type8 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="8">
      <input type="hidden" name="section_new_img[]" value="">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_c[]" value="">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
  </div>
</div>

<div class="copy type9 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="9">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_c[]" value="">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
  </div>
</div>

<div class="copy type10 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="10">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_c[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button Text</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_text[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button URL</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_url[]" placeholder="Enter ..." value="">
      </div>
    </div>
  </div>
</div>

<div class="copy type11 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="11">
      <input type="hidden" name="section_new_c[]" value="">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image 2</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img2[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
  </div>
</div>

<div class="copy type12 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="12">
      <input type="hidden" name="section_new_c[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image 2</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img2[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button Text</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_text[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button URL</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_url[]" placeholder="Enter ..." value="">
      </div>
    </div>
  </div>
</div>

<div class="copy type13 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="13">
      <input type="hidden" name="section_new_img[]" value="">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_st[]" value="">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
        <textarea class="form-control ckeditor" name="section_new_c[]" placeholder="Enter ..."></textarea>
      </div>
    </div>
  </div>
</div>

<div class="copy type14 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="14">
      <input type="hidden" name="section_new_img[]" value="">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
        <textarea class="form-control ckeditor" name="section_new_c[]" placeholder="Enter ..."></textarea>
      </div>
    </div>
  </div>
</div>

<div class="copy type15 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="15">
      <input type="hidden" name="section_new_img[]" value="">
      <input type="hidden" name="section_new_img2[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
        <textarea class="form-control ckeditor" name="section_new_c[]" placeholder="Enter ..."></textarea>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button Text</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_text[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button URL</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_url[]" placeholder="Enter ..." value="">
      </div>
    </div>
  </div>
</div>

<div class="copy type16 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="16">
      <input type="hidden" name="section_new_img2[]" value="">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
        <textarea class="form-control ckeditor" name="section_new_c[]" placeholder="Enter ..."></textarea>
      </div>
    </div>
  </div>
</div>

<div class="copy type17 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="17">
      <input type="hidden" name="section_new_img2[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
        <textarea class="form-control ckeditor" name="section_new_c[]" placeholder="Enter ..."></textarea>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button Text</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_text[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button URL</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_url[]" placeholder="Enter ..." value="">
      </div>
    </div>
  </div>
</div>

<div class="copy type18 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="18">
      <input type="hidden" name="section_new_btn_text[]" value="">
      <input type="hidden" name="section_new_btn_url[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image 2</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img2[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
        <textarea class="form-control ckeditor" name="section_new_c[]" placeholder="Enter ..."></textarea>
      </div>
    </div>
  </div>
</div>

<div class="copy type19 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="19">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Sub Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_st[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image 2</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img2[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
        <textarea class="form-control ckeditor" name="section_new_c[]" placeholder="Enter ..."></textarea>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button Text</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_text[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button URL</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_url[]" placeholder="Enter ..." value="">
      </div>
    </div>
  </div>
</div>
<div class="copy type20 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="20">
      <input type="hidden" name="section_new_img2[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
    
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
        <textarea class="form-control ckeditor" name="section_new_c[]" placeholder="Enter ..."></textarea>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button Text</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_text[]" placeholder="Enter ..." value="">
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Button URL</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="section_new_btn_url[]" placeholder="Enter ..." value="">
      </div>
    </div>
  </div>
</div>
<div class="copy type21 hide"> 
  <div class="sn">   
    <div class="form-group clearfix">
      <input type="hidden" name="type[]" value="">
      <input type="hidden" name="section_type[]" value="21">
      <input type="hidden" name="section_new_img2[]" value="">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="section_new_t[]" placeholder="Enter ..." value="" data-validation-engine="validate[required]">
      </div>
      <div class="col-sm-1"><a href="javascript:;" class="remove_field">Remove</a></div>
    </div> 
   
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="section_new_img[]" data-validation-engine="validate[,custom[validateMIME[image/jpeg|image/jpg|image/png|image/gif|image/svg]]]">
        Mime Type: jpeg,png,jpg,gif,svg, Max image upload size 2 Mb<br>
      </div>
    </div>
    <div class="form-group clearfix">
      <label class="col-sm-2 control-label">Content</label>
      <div class="col-sm-10">
        <textarea class="form-control ckeditor" name="section_new_c[]" placeholder="Enter ..."></textarea>
      </div>
    </div>
    
  </div>
</div>
@section('more-scripts')
<script type="text/javascript">
$(document).ready(function() {
  var wrapper       = $(".add_section"); //Fields wrapper
  var add_button      = $(".add_section_btn"); //Add button ID

  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    sn_section_type = $(".sn_section_type").val();
    sn_type = $(".sn_type").val();
    var html = '';
    if (sn_section_type>0 && sn_type) {
      $(".type"+sn_section_type).find('input[name="type[]"]').val(sn_type);
      html = $(".type"+sn_section_type).html();
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

