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
      Forms <button type="button" class="btn btn-primary" onclick="window.location.href='{{ url('/admin/forms/export/'.$form) }}'" title="Export Active User">Export</button>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Forms</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    @if($errors->any())   
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-ban"></i> Alert!</h4>
      @foreach ($errors->all() as $error)
      {{ $error }}<br>
      @endforeach
    </div>
    @endif

   @if (session()->has('delete_success'))
   <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Success</h4>
    Form Data has been deleted successfully.
  </div>
  @endif
   @if (session()->has('status_success'))
   <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Success</h4>
    Form Status is updated successfully.
  </div>
  @endif
   @if (session()->has('message'))
   <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Success</h4>
    {{ Session::get('message') }}
  </div>
  @endif 
  
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
       <div class="box-header">
        <h3 class="box-title">&nbsp;</h3>
        <div class="box-tools">
          <form action="">
            <div class="col-sm-7">
              <div class="form-group clearfix">
                <select name="form" class="form-control" onchange="this.form.submit();">
                  @foreach($form_array as $key => $value)
                  <option value="{!!$key!!}" @if($key==$form) selected @endif>{!!$value!!}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-5">
            <div class="input-group input-group-sm" style="width: 150px;">

              <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="{{ $search }}">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>

            </div>
            </div>
          </form>
        </div>

      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">

        <table id="example1" class="table table-bordered table-hover dataTable">
          <thead>
            <tr>
              @foreach($column_array as $key => $value)
              <th>
                <a href="{{ $sorting_array[$key]['sorting_url'] }}" class="{{ $sorting_array[$key]['sorting_class'] }}">{{$value}}</a>
              </th>
              @endforeach
              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>

          @if ($lists->count() > 0)
           @foreach($lists as $list)

           <tr>
            @foreach($column_array as $key => $value)
              
              @if ($key=='first_name')
                <td>{!! $list->$key.' '.$list->last_name !!}</td>
              @elseif ($key=='created_at')              
                <td>{!! date_convert($list->$key,3) !!}</td>
              @elseif ($key=='status')              
                <td>{!! $user_status_array[$list->$key] !!}</td>
              @elseif($key=='last_login')
                <td>{!! date_convert($list->$key, 4) !!}</td>
              @else
                <td>{{ $list->$key }}</td>
              @endif

              
            @endforeach

            <td>
              <a href="{{ url('/admin/forms/view/'.$list->id) }}" title="View"><i class="fa fa-fw fa-eye"></i></a>
              <a href="{{ url('/admin/forms/delete/'.$list->id) }}" onclick="return confirm('Are you sure?');" title="Delete"><i class="fa fa-fw fa-close"></i></a>
            </td>

          </tr>
          @endforeach

          @else

          <tr>
            <td colspan="<?php echo count($column_array)+1;?>" align="middle">No Data Found</td>
          </tr>

          @endif
        </tbody>

      </table>

      {{$lists->appends(request()->input())->links()}}

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->


@section('more-scripts')

<script type="text/javascript">


</script>

@stop


@include('admin.footer')

