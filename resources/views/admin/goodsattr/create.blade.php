@extends('admin.layout.main')
@section('title','商品属性')
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
                        <form class="form-horizontal" role="form"  action="{{url('/goodsattr/store')}}" method="post">
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">属性名称</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="attr_name" id="firstname" 
                                placeholder="请输入属性名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">商品类型</label>
                            <div class="col-sm-10">
                            <select type="text" class="form-control" name="type_id" id="firstname">
                            @foreach($data as $k=>$v)
                            <option value="{{$v->type_id}}" @if($type_id == $v->type_id) selected @endif>{{$v->type_name}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">属性选择</label>
                            <div class="col-sm-10">
                            <input type="radio" name="attr_type" value="0" checked id="firstname">属性
                            <input type="radio" name="attr_type" value="1" id="firstname">规格
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">录入方式</label>
                            <div class="col-sm-10">
                            <input type="radio" name="attr_input_type" value="0" checked id="firstname">手工录入
                            <input type="radio" name="attr_input_type" value="1" id="firstname">从下面的列表中选择(一行代表一个值)
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">可选值列表</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="attr_values"></textarea>
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