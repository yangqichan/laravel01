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
                        <form class="form-horizontal" role="form"  action="{{url('/goodsattr/update/'.$attr->attr_id)}}" method="post">
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">属性名称</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="attr_name" value="{{$attr->attr_name}}"
                                placeholder="请输入属性名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">商品类型</label>
                            <div class="col-sm-10">
                            <select type="text" class="form-control" name="type_id">
                            @foreach($data as $k=>$v)
                            <option value="{{$v->type_id}}" @if($attr->type_id == $v->type_id) selected @endif>{{$v->type_name}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">属性选择</label>
                            <div class="col-sm-10">
                            @if($attr->attr_type==0)
                                <input type="radio" name="attr_type" value="0" checked>属性
                                <input type="radio" name="attr_type" value="1">规格
                            @else
                                <input type="radio" name="attr_type" value="0">属性
                                <input type="radio" name="attr_type" value="1" checked>规格
                            @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">录入方式</label>
                            <div class="col-sm-10">
                            @if($attr->attr_type==0)
                            <input type="radio" name="attr_input_type" value="0" checked>手工录入
                            <input type="radio" name="attr_input_type" value="1">从下面的列表中选择(一行代表一个值)
                            @else
                            <input type="radio" name="attr_input_type" value="0">手工录入
                            <input type="radio" name="attr_input_type" value="1" checked>从下面的列表中选择(一行代表一个值)
                            @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">可选值列表</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="attr_values" @if($attr->attr_type == 0) disabled="disabled" @endif >{{$attr->attr_values}}</textarea>
                            </div>
                        </div>
                         <button type="submit" class="pull-right btn btn-default">
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
    <!-- /.content -->
    <script src="/static/error/jquery.min.js"></script>
    <script>
        $(document).on('click','input[name="attr_input_type"]',function(){
            var radio=$('input[name="attr_input_type"]:checked').val();
            if(radio == 1){
                $('textarea').removeClass('disabled="disabled"');
                $('textarea').removeAttr('disabled');
            }else{
                $('textarea').addClass(' disabled="disabled"');
                $('textarea').attr('disabled','disabled');
            }
        })
    </script>
@endsection