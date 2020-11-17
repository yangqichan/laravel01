@extends('admin.layout.main')
@section('title','后台首页')
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
<th>角色名称</th>
<th>角色权限</th>
<th>编辑</th>
</tr>
</thead>
<tbody>
@foreach($data as $k=>$v)
<tr>
<td>{{$v->role_name}}</td>
<td>@foreach($v->gg as $b=>$e)
		@foreach($e as $s=>$g)
		{{$g->menu_name}}
		@endforeach
	@endforeach
	
</td>
<td><button type="button" class="btn btn-danger" ><a href="{{url('/admin/DeleteAdminrole'.$v->role_id)}}" style="color:#FFFFFF">删除</a></button>
    <button type="button" class="btn btn-info" ><a href="{{url('/admin/UpdateAdminrole'.$v->role_id)}}" style="color:#FFFFFF">修改</a></button>
    <button type="button" class="btn btn-warning"><a href="{{url('/admin/Adminrolemenu'.$v->role_id)}}" style="color:#FFFFFF">添加权限</a></button>
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
@endsection