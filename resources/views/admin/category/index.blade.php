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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>分类ID</th>
                            <th>分类名称</th>
                            <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $k=>$v)
                            <tr style="display: none" cate_id="{{$v->cate_id}}" parent_id="{{$v->parent_id}}">
                                <td>{{$v->cate_id}}</td>
                                <td>
                                    <a href="javascript:;" class="showHide">+</a>
                                    {{@str_repeat('—',$v->level*2)}}
                                    {{$v->cate_name}}
                                </td>
                                <td>
                                <button type="button" class="btn btn-danger" id="del" cate_id="{{$v->cate_id}}">删除</button>
                                <a href="/category/edit/{{$v->cate_id}}"><button type="button" class="btn btn-primary">修改</button></a>
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
                var cate_id=$(this).attr('cate_id');
    //            alert(cate_id);
                $.get('/category/del/'+cate_id,function(res){
                    if(res.code == 200){
                        location.reload();
                        // $(this).parents('tr').addClass('display: none');
                    }else{
                        alert(res.msage);
                    }
                    
                })
        })
        //顶级
        $(document).ready(function(){
            $("tr[parent_id='0']").show();
        })

        //子级
        $(document).on("click",'.showHide',function(){
    //        alert(21212);
            var _this=$(this);
            var _sign=_this.text();
    //        alert(_sign);
            var cate_id=_this.parents("tr").attr("cate_id");
            if(_sign=="+"){
                var child=$("tr[parent_id='"+cate_id+"']");
                if(child.length>0){
                    child.show();
                    _this.text("-");
                }
            }else{
                $("tr[parent_id='"+cate_id+"']").hide();
                _this.text("+");
            }
        })
    </script>
    @endsection