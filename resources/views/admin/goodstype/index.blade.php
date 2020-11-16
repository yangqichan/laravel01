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
                            <th>类型ID</th>
                            <th>类型名称</th>
                            <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $k=>$v)
                            <tr>
                                <td>{{$v->type_id}}</td>
                                <td>
                                    {{$v->type_name}}
                                </td>
                                <td>
                                <button type="button" class="btn btn-danger" id="del" type_id="{{$v->type_id}}">删除</button></a>
                                <a href="/goodstype/edit/{{$v->type_id}}"><button type="button" class="btn btn-primary">修改</button></a>
                                <a href="/goodsattr/index/{{$v->type_id}}"><button type="button" class="btn btn-success">属性列表</button></a>
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
    <script src='/static/error/jquery.min.js'></script>
    <script>
        //删除
        $(document).on('click','#del',function(){
            var type_id=$(this).attr('type_id');
//            alert(cate_id);
            $.get('/goodstype/del/'+type_id,function(res){
                if(res.code == 200){
                    location.reload();
                    // $(this).parents('tr').addClass('display: none');
                }else{
                    alert(res.msage);
                    location.reload();
                }
            })
        })
    </script>
    @endsection