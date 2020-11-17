@extends('admin.layout.main')
@section('title','商品分类')
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
                        <form class="form-horizontal" role="form"  action="{{url('/category/store')}}" method="post">
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">分类名称</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="cate_name" id="firstname" 
                                placeholder="请输入分类名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">所属分类</label>
                            <div class="col-sm-10">
                            <select type="text" class="form-control" name="parent_id" id="firstname">
                                <option value="0">顶级分类</option>
                                @foreach($cateinfo as $k=>$v)
                                <option value="{{$v->cate_id}}">{{str_repeat('—',$v->level*3)}}{{$v->cate_name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                         <button type="submit" class="pull-right btn btn-default" id="sendEmail">
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