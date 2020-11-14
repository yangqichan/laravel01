@extends('admin.layout.main')
@section('title','商品品牌')
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>品牌ID</th>
                            <th>品牌名称</th>
                            <th>品牌介绍</th>
                            <th>品牌logo</th>
                            <th>品牌官方网址</th>
                            <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($brand as $k=>$v)
                            <tr>
                                <td>{{$v->brand_id}}</td>
                                <td>{{$v->brand_name}}</td>
                                <td>{{$v->brand_desc}}</td>
                                <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" style="width:100px;height:60px;"></td>
                                <td>{{$v->brand_url}}</td>
                                <td>
                                <a href="/brand/del/{{$v->brand_id}}"><button type="button" class="btn btn-danger">删除</button></a>
                                <a href="/brand/edit/{{$v->brand_id}}"><button type="button" class="btn btn-primary">修改</button></a>
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