@extends('admin.layout.main')
@section('title','商品')
@section('content')
<script type="text/javascript" charset="utf-8" src="/futext/ueditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="/futext/ueditor.all.min.js"> </script>
  <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
  <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
  <script type="text/javascript" charset="utf-8" src="/futext/zh-cn.js"></script>

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
                    <form class="form-horizontal" role="form"  action="{{url('/goods/store')}}" method="post" enctype="multipart/form-data">
                    <nav class="navbar navbar-default" role="navigation">
                    <div>
                        <!-- 导航 -->
                        <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">基本信息</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">商品详情</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">商品属性</a></li>
                        </ul>
                    
                        <!-- 对应内容 -->
                        <!-- <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">...</div>
                        <div role="tabpanel" class="tab-pane" id="profile">...</div>
                        <div role="tabpanel" class="tab-pane" id="messages">...</div>
                        <div role="tabpanel" class="tab-pane" id="settings">...</div>
                        </div> -->

                        <!-- 带显示效果的内容 -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <div class="box-footer clearfix">
                                    <div class="form-group">
                                        <label for="firstname" class="col-sm-2 control-label">商品名称</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="goods_name" id="firstname" 
                                            placeholder="请输入商品名称">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="firstname" class="col-sm-2 control-label">商品价格</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="goods_price" id="firstname" 
                                            placeholder="请输入商品价格">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstname" class="col-sm-2 control-label">商品库存</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="num" id="firstname" 
                                            placeholder="请输入商品库存">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-sm-2 control-label">商品图片</label>
                                        <div class="col-sm-10">
                                        <input type="file" name="goods_img">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-sm-2 control-label">商品相册</label>
                                        <div class="col-sm-10">
                                        <input type="file" name="goods_imgs" multiple>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstname" class="col-sm-2 control-label">所属品牌</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="cate_id" id="firstname">
                                                <option value="">请选择</option>
                                                @foreach($brand as $k=>$v)
                                                <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-sm-2 control-label">所属分类</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="brand_id" id="firstname">
                                                <option value="">请选择</option>
                                                @foreach($category as $k=>$v)
                                                <option value="{{$v->cate_id}}">{{str_repeat('—',$v->level*3)}}{{$v->cate_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-sm-2 control-label">是否上架</label>
                                        <div class="col-sm-10">
                                        <input type="radio" name="is_up" checked>是
                                        <input type="radio" name="is_up">否
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-sm-2 control-label">是否热卖</label>
                                        <div class="col-sm-10">
                                        <input type="radio" name="is_hot" checked>是
                                        <input type="radio" name="is_hot">否
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <script id="editor" type="text/plain" style="width:1024px;height:500px;" name="goods_desc"></script>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="messages">3</div>
                            <div role="tabpanel" class="tab-pane fade" id="settings">4</div>
                        </div>
                        <button type="submit" class="pull-right btn btn-default" id="sendEmail">
                                        添加 <i class="fa fa-arrow-circle-right"></i>
                        </button>
                        </form>
                    </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
<script src="/static/jquery.min.js"></script>
  <script>
  function addSpec(obj){
    var newobj = $(obj).parent().parent().clone();
    newobj.find('a').html('[-]');
    newobj.find('a').attr('onclick','decrSpec(this)');
    $(obj).parent().parent().after(newobj);
      layui.use('form',function(){
        var form = layui.form;
        form.render('select');
      })
   }
  function decrSpec(obj){
    $(obj).parent().parent().remove();

  }

  </script>
  <script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
    function getText() {
      //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
      var range = UE.getEditor('editor').selection.getRange();
      range.select();
      var txt = UE.getEditor('editor').selection.getText();
      alert(txt)
    }

    function getContentTxt() {
      var arr = [];
      arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
      arr.push("编辑器的纯文本内容为：");
      arr.push(UE.getEditor('editor').getContentTxt());
      alert(arr.join("\n"));
    }
    function hasContent() {
      var arr = [];
      arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
      arr.push("判断结果为：");
      arr.push(UE.getEditor('editor').hasContents());
      alert(arr.join("\n"));
    }
    function setFocus() {
      UE.getEditor('editor').focus();
    }
    function deleteEditor() {
      disableBtn();
      UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
      var div = document.getElementById('btns');
      var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
      for (var i = 0, btn; btn = btns[i++];) {
        if (btn.id == str) {
          UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        } else {
          btn.setAttribute("disabled", "true");
        }
      }
    }
    function enableBtn() {
      var div = document.getElementById('btns');
      var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
      for (var i = 0, btn; btn = btns[i++];) {
        UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
      }
    }

    function getLocalData () {
      alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
      UE.getEditor('editor').execCommand( "clearlocaldata" );
      alert("已清空草稿箱")
    }
</script>
@endsection