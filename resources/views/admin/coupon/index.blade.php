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
                  <th>优惠名称</th>
                  <th>开始时间</th>
                  <th>结束时间</th>
                  <th>优惠范围</th>
                  <th>优惠金额</th>
                  <th>优惠方式</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $v)
                <tr>
                  <td>{{$v->coupon_id}}</td>
                  <td>{{$v->coupon_name}}</td>
                  <td>{{date('Y-m-d',$v->start_time)}}</td>
                  <td>{{date('Y-m-d',$v->end_time)}}</td>
                  <td>{{$v->coupon_range}}</td>
                  <td>{{$v->coupon_price}}</td>
                  <td>{{$v->coupon_way==0?'满减优惠':'价格折扣'}}</td>
                  <td>
                    <button type="button" class="btn btn-danger" id="{{$v->coupon_id}}">删除</button>
                    <button type="button" class="btn btn-info"><a href="{{'coupon/edit/'.$v->coupon_id}}">修改</a></button>
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
            $.get('coupon/del/'+id,function(res){
              if (res.code=='001') {
                alert(res.msg);
                location.href="{{url('coupon')}}";
              }
            },'json')
          }
       })
    </script>
    @endsection
