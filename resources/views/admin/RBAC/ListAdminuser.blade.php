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
<th>管理员名称</th>
<th>编辑</th>
</tr>
</thead>
<tbody>
@foreach($data as $k=>$v)
<tr>
<td>{{$v->admin_account}}</td>
<td><a>删除</a><a>修改</a></td>
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