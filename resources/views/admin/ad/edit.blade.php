@extends('admin.layout.main') @section('title','后台首页') @section('content')
<!-- 后台首页 -->


 

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
                        <form class="form-horizontal" role="form" method="post" action="{{'/ad/update/'.$data->ad_id}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">广告名称</label>
                                <div class="input-group col-sm-9">
                                    <input type="text" value="{{$data->ad_name}}" class="form-control" id="firstname" 
                                           placeholder="请输入广告名称" name="ad_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">广告链接</label>
                                <div class="input-group col-sm-9">
                                    <input type="text" value="{{$data->ad_link}}" class="form-control" id="firstname" 
                                           placeholder="请输入广告名称" name="ad_link">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">广告类型</label>
                                <div class='input-group  col-sm-9'>
                                    <select class="form-control" name="media_type">
                                        <option value="0">请选择</option>
                                        <option value="1">图片</option>
                                        <option value="2">文字</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group contents" style="display: none">
                                 <div class="form-group">
                                    <label for="firstname" class="col-sm-2 control-label">广告内容</label>
                                    <div class="input-group col-sm-9">
                                    <textarea class="form-control" name="ad_desc"></textarea>
                                    </div>
                                </div>
                            </div>  

                            <div class="form-group img" style="display: none">
                                <label for="lastname" class="col-sm-2 control-label">广告图片</label>
                                <div class="col-sm-10">
                                    <input type="file" name="ad_img">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">广告位名称</label>
                                <div class='input-group  col-sm-9'>
                                    <select class="form-control" name="position_id">
                                        <option value="0">请选择</option>
                                        <option value="1">尤洪1</option>
                                        <option value="2">尤洪2</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">开始时间</label>
                                <!--指定 date标记-->
                               <div class='input-group date col-sm-9' id='datetimepicker1'>
                                    <input type="text" class="form-control" value="{{date('Y-m-d',$data->start_time)}}" name="start_time">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                            </div>

  
                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">结束时间</label>
                                <!--指定 date标记-->
                                <div class='input-group date col-sm-9' id='datetimepicker2'>
                                    <input type="text" class="form-control" value="{{date('Y-m-d',$data->end_time)}}" name="end_time">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                            </div>


                            <div class="form-group">
                                    <label for="firstname" class="col-sm-2 control-label">是否开启</label>
                                    <div class='input-radio '>
                                        <input type="radio" name="is_open" value="1" checked>是
                                        <input type="radio" name="is_open" value="2" >否
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">联系人邮箱</label>
                                <div class="input-group col-sm-9">
                                    <input type="text" class="form-control" value="{{$data->link_email}}" id="firstname" 
                                           placeholder="请输入联系人邮箱" name="link_email">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">联系人电话</label>
                                <div class="input-group col-sm-9">
                                    <input type="text" class="form-control" id="firstname" 
                                           placeholder="请输入联系人电话" value="{{$data->link_tel}}" name="link_tel">
                                </div>
                            </div>
                            
                            <button
                                type="submit"
                                class="pull-right btn btn-default"
                                id="sendEmail"
                            >
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


<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript">
$(function(){
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: moment.locale('zh-cn')
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: moment.locale('zh-cn')
    });
})

$('select[name="media_type"]').change(function(){
    var val=$(this).val();
    if (val==1){
        $('.img').show();
        $('.contents').hide();
    }else{
        $('.contents').show();
        $('.img').hide();
    }
})


</script>
@endsection



