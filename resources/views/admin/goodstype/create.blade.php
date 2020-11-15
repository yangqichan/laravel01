@extends('admin.layout.main')
@section('title','商品类型')
@section('content')
    <!-- Main content -->
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
                        <form class="form-horizontal" role="form"  action="{{url('/goodstype/store')}}" method="post">
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">类型名称</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="type_name" id="firstname" 
                                placeholder="请输入类型名称">
                            </div>
                        </div>
                         <button type="submit" class="pull-right btn btn-default">
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
    <!-- /.content -->

@endsection