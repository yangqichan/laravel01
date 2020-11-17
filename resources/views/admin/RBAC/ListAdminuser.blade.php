@extends('admin.layout.main')
@section('title','后台首页')
@section('content')
<!-- Main content -->
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
<th>管理员名称</th>
<th>管理员角色</th>
<th>编辑</th>
</tr>
</thead>
<tbody>
@foreach($data as $k=>$v)
<tr>
<td>{{$v->admin_account}}</td>
<td>@if($v->role_name)
		{{$v->role_name}}
	@else
	<b style="color:red">此管理员没有添加角色，请尽快添加角色！</b>
	@endif
</td>
<td><button type="button" class="btn btn-danger" ><a href="{{url('/admin/DeleteAdminuser'.$v->admin_id)}}" style="color:#FFFFFF">删除</a></button>
    <button type="button" class="btn btn-info" ><a href="{{url('/admin/UpdateAdminuser'.$v->admin_id)}}" style="color:#FFFFFF">修改</a></button>
    <button type="button" class="btn btn-warning"><a href="{{url('/admin/Adminuserrole'.$v->admin_id)}}" style="color:#FFFFFF">添加角色</a></button>
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
<!-- /.content -->
@endsection
<script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        	$(".btn-warning").on('click',function(){
        		var id=$(this).attr('user_id');
				$.ajax({
				    url: "/admin/InsertAdminuserrole"+id,
				    data: {id: 'id'},
				    type: "POST",
				    dataType: "json",
				    success: function(data) {
				        if(data)
				    }
				});
			});
        });
</script>