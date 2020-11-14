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
                        <form class="form-horizontal" role="form"  action="{{url('/brand/update/'.$brand->brand_id)}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="brand_name" id="firstname" 
                                placeholder="请输入品牌名称" value="{{$brand->brand_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">品牌logo</label>
                            <div class="col-sm-10">
                            <input type="file" name="brand_logo" value="{{$brand->brand_logo}}">
                            </div>
                            <div style="width:300px;height:200px; background:#CCCCCC; float:left;">
                                <img src="{{env('UPLOAD_URL')}}{{$brand->brand_logo}}" style="width:300px;height:200px;" />    
                            </div>      
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">品牌官方网址</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="brand_url" id="firstname" 
                                placeholder="请输入品牌官方网址" value="{{$brand->brand_url}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">品牌介绍</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="brand_desc">{{$brand->brand_desc}}</textarea>
                            </div>
                        </div>
                         <button type="submit" class="pull-right btn btn-default" id="sendEmail">
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
    <!-- /.content -->

@endsection