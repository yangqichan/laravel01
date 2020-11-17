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
                        <h2 style="color:red">修改管理员信息</h2>
                    </div>
                    <div class="box-footer clearfix">
      <form class="form-horizontal" role="form" action="{{url('admin/UpdateAdminsuser')}}" method="post">@csrf
       <input type="hidden"  name="admin_id" value="{{$id}}">

       <div class="form-group">
        <h4 for="firstname" class="col-sm-2 ">{{$admin_account}}</h4>
        <input type="text" class="form-control" id="admin_account" name="admin_account" 
             placeholder="请修改管理员名称">
             <h4>修改管理员角色</h4>
        @foreach($role as $k=>$v)
            <input type="radio" name="role_id" value="{{$v->role_id}}" checked="{{$v->role_id}}==$role_id?'"checked":''">
            {{$v->role_name}}&nbsp;&nbsp;&nbsp;&nbsp;
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
                             修改 <i class="fa fa-arrow-circle-right"></i>
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