@extends('admin.layout.main') @section('title','后台首页') @section('content')
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">优惠活动</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>广告位名称</th>
                  <th>广告位宽度</th>
                  <th>广告位高度</th>
                  <th>广告位模板</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $v)
                <tr>
                  <td>{{$v->position_id}}</td>
                  <td>{{$v->position_name}}</td>
                  <td>{{$v->position_width}}</td>
                  <td>{{$v->position_height}}</td>
                  <td>{{$v->template}}</td>
                  <td>
                    <button type="button" class="btn btn-danger" id="{{$v->position_id}}">删除</button>
                    <button type="button" class="btn btn-info"><a href="{{'position/edit/'.$v->position_id}}">修改</a></button>
                    <button type="button" class="btn btn-info"><a href="{{'position/edit/'.$v->position_id}}">生成广告</a></button>
                    <button type="button" class="btn btn-info"><a href="{{'position/show/'.$v->position_id}}">查看广告</a></button>
                </tr>
                @endforeach
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <script type="text/javascript">
       $('.btn-danger').click(function(){
        var id=$(this).attr('id');
        if (confirm('你确定要删除吗？')) {
            $.get('position/del/'+id,function(res){
              if (res.code=='001') {
                alert(res.msg);
                location.href="{{url('position')}}";
              }
            },'json')
          }
       })
    </script>
    @endsection
