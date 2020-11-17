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
                    </div>
                    <div class="box-footer clearfix">
      <form class="form-horizontal" role="form" action="{{url('admin/InsertAdminmenu')}}" method="post">@csrf
       <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">菜单名称</label>
        <div class="col-sm-10">
         <input type="text" class="form-control" id="menu_name" name="menu_name" 
             placeholder="请输入菜单名称">
        </div>
        <label for="firstname" class="col-sm-2 control-label">菜单路径</label>
        <div class="col-sm-10">
         <input type="text" class="form-control" id="menu_name" name="menu_url" 
             placeholder="请输入菜单路径">
        </div>
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