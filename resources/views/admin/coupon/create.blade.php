@extends('admin.layout.main') @section('title','后台首页') @section('content')
<!-- 后台首页 -->
<div class="content-wrapper">

 

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
						<form class="form-horizontal" role="form" method="post" action="{{'store'}}">
							@csrf
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">优惠名称</label>
								<div class="input-group col-sm-9">
									<input type="text" class="form-control" id="firstname" 
										   placeholder="请输入优惠名称" name="coupon_name">
								</div>
							</div>
							

		

        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">开始时间</label>
            <!--指定 date标记-->
           <div class='input-group date col-sm-9' id='datetimepicker1'>
                <input type="text" class="form-control" name="start_time">
                	<span class="input-group-addon">
                   		<span class="glyphicon glyphicon-calendar"></span>
                	</span>
            </div>
        </div>

  

          <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">结束时间</label>
            <!--指定 date标记-->
           <div class='input-group date col-sm-9' id='datetimepicker2'>
                <input type="text" class="form-control" name="end_time">
                	<span class="input-group-addon">
                   		<span class="glyphicon glyphicon-calendar"></span>
                	</span>
            </div>
        </div>

                
    


					   


	                        <button
	                            type="submit"
	                            class="pull-right btn btn-default"
	                            id="sendEmail"
	                        >
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


</div>
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
});
</script>
@endsection



