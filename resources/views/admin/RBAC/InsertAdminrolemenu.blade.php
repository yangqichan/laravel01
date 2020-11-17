@extends('admin.layout.main')
@section('title','后台首页')
@section('content')
  <section class="content">
        <!-- Small boxes (Stat box) -->
 
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- quick email widget -->
                <div class="box box-info">
                    <div class="box-body">
                        <h2 style="color:red">给角色添加权限</h2>
                    </div>
                    <div class="box-footer clearfix">
      <form class="form-horizontal" role="form" action="{{url('admin/InsertAdminrolemenu')}}" method="post">@csrf
       <input type="hidden"  name="role_id" value="{{$id}}">

       <div class="form-group">
        <h4 for="firstname" class="col-sm-2 ">{{$name}}</h4>
        @foreach($data as $k=>$v)
            <input type="radio" name="menu_id" value="{{$v->menu_id}}" >{{$v->menu_name}}&nbsp;&nbsp;&nbsp;&nbsp;
        @endforeach
       </div>
       <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
         <div class="checkbox">
          <label>
          </label>
         </div>
        </div>
       </div>
                         <button
                             type="submit"
                             class="pull-right btn btn-default"
                             id="sendEmail"
                         >
                             添加 <i class="fa fa-arrow-circle-right"></i>
                         </button>
                        </form>
                    </div>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
 @endsection 