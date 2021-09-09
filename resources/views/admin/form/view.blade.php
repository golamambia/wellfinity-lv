@include('admin.header')

@include('admin.sidebar')
@php
$form_array = unserialize(Form_Array);
@endphp

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      View {{$form_array[$list->type]}} Data
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Form Data</li>
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
                Form has been updated successfully.
              </div>
              @endif

              <div class="row">
                <div class="col-sm-12"> 

                  @if($list->type=='1' || $list->type=='3' || $list->type=='4')
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">{{$list->name}} </div>
                  </div>
                
                  @else
                    <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-6">{{$list->fname}} </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-6">{{$list->lname}} </div>
                  </div>
                  @endif

                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">{{$list->email}} </div>
                  </div>
                   <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Phone Number</label>
                    <div class="col-sm-6">{{$list->phone}} </div>
                  </div>
                   @if($list->type=='0')
                   <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-6">{{$list->address}} </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Zip code</label>
                    <div class="col-sm-6">{{$list->zip}} </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">State</label>
                    <div class="col-sm-6">{{$list->state}} </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">City</label>
                    <div class="col-sm-6">{{$list->city}} </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Reason for contact</label>
                    <div class="col-sm-6">{{$list->reason}} </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Message</label>
                    <div class="col-sm-6">{{$list->message}} </div>
                  </div>

                  @elseif($list->type=='2')

                   <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Zip code</label>
                    <div class="col-sm-6">{{$list->zip}} </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">State</label>
                    <div class="col-sm-6">{{$list->state}} </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">City</label>
                    <div class="col-sm-6">{{$list->city}} </div>
                  </div>
                   @elseif($list->type=='3')
                     @if($list->resume && File::exists(public_path('uploads/'.$list->resume)))
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Resume</label>
                    <div class="col-sm-6"><a href="{{ asset('/uploads/'.$list->resume) }}" download>Download</a> </div>
                  </div>
                  @endif
                   @endif
                 @if($list->type=='4')
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Location</label>
                    <div class="col-sm-6">{{$list->address}} </div>
                  </div>
                   <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Date</label>
                    <div class="col-sm-6">{{$list->book_date}} </div>
                  </div>
                   <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Time</label>
                    <div class="col-sm-6">{{$list->book_time}} </div>
                  </div>
                 <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Message</label>
                    <div class="col-sm-6">{{$list->message}} </div>
                  </div>
                 @endif
                  <div class="form-group clearfix">
                    <label class="col-sm-3 control-label">Created</label>
                    <div class="col-sm-6">{!! date_convert($list->created_at,3) !!} </div>
                  </div>
                  
                </div>                
              </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" class="btn btn-primary" onclick="window.location.href='{{ url('/admin/forms') }}'" >Back</button>
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


  @include('admin.footer')
