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
                        <form class="form-horizontal" role="form" method="post" action="{{'/position/store'}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">广告名称</label>
                                <div class="input-group col-sm-9">
                                    <input type="text" class="form-control" id="firstname" 
                                           placeholder="请输入广告名称" name="position_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">广告位宽度</label>
                                <div class="input-group col-sm-9">
                                    <input type="text" class="form-control" id="firstname" 
                                           placeholder="请输入广告名称" name="position_width">
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">广告位高度</label>
                                <div class="input-group col-sm-9">
                                    <input type="text" class="form-control" id="firstname" 
                                           placeholder="请输入广告名称" name="position_height">
                                </div>
                            </div>



                            <div class="form-group contents">
                                 <div class="form-group">
                                    <label for="firstname" class="col-sm-2 control-label">广告模板</label>
                                    <div class="input-group col-sm-9">
                                    <textarea class="form-control" name="template"></textarea>
                                    </div>
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


<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript">


</script>
@endsection



