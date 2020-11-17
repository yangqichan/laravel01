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
                    <a href="/goodsattr/create/{{$type_id}}"><button type="button" class="btn btn-success">添加属性</button></a>
                    <div class="box-footer clearfix">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>属性ID</th>
                            <th>属性名称</th>
                            <th>商品类型</th>
                            <th>属性选择</th>
                            <th>录入方式</th>
                            <th>可选值列表</th>
                            <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $k=>$v)
                            <tr>
                                <td>{{$v->attr_id}}</td>
                                <td>
                                    {{$v->attr_name}}
                                </td>
                                <td>
                                    {{$v->type_name}}
                                </td>
                                <td>
                                    @if($v->attr_type == 0)
                                        属性
                                    @else
                                        规格
                                    @endif
                                </td>
                                <td>
                                    @if($v->attr_input_type == 0)
                                        手动录入
                                    @else
                                        从下面的列表中选择(一行代表一个值)
                                    @endif
                                </td>
                                <td>
                                    {{$v->attr_values}}
                                </td>
                                <td>
                                <button type="button" class="btn btn-danger" id="del" cate_id="{{$v->cate_id}}">删除</button>
                                <a href="/goodsattr/edit/{{$v->attr_id}}"><button type="button" class="btn btn-primary">修改</button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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