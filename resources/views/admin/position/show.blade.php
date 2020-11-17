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
                  <th>广告名称</th>
                  <th>广告链接</th>
                  <th>广告类型</th>
                  <th>广告图片</th>
                  <th>广告内容</th>
                  <th>广告位名称</th>
                  <th>开始时间</th>
                  <th>结束时间</th>
                  <th>是否开启</th>
                  <th>联系人邮箱</th>
                  <th>联系人电话</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $v)
                <tr>
                  <td>{{$v->ad_id}}</td>
                  <td>{{$v->ad_name}}</td>
                  <td>{{$v->ad_link}}</td>
                  <td>{{$v->media_type==1?"图片":"文字"}}</td>
                  
                  <td>
                    @if($v->ad_img)
                    <img src="">
                    @endif
                  </td>
                  @if($v->ad_desc)
                  <td>{{$v->ad_desc}}</td>
                  @endif
                  <td>{{$v->position_id}}</td>
                  <td>{{date('Y-m-d',$v->start_time)}}</td>
                  <td>{{date('Y-m-d',$v->end_time)}}</td>
                  <td>{{$v->is_open==1?"是":"否"}}</td>
                  <td>{{$v->link_email}}</td>
                  <td>{{$v->link_tel}}</td>
                  <td>
                    <button type="button" class="btn btn-danger" id="{{$v->ad_id}}">删除</button>
                    <button type="button" class="btn btn-info"><a href="{{'ad/edit/'.$v->ad_id}}">修改</a></button>
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
            $.get('ad/del/'+id,function(res){
              if (res.code=='001') {
                alert(res.msg);
                location.href="{{url('ad')}}";
              }
            },'json')
          }
       })
    </script>
    @endsection
