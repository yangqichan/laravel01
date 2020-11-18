<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img
                    src="/adminlte/dist/img/user2-160x160.jpg"
                    class="img-circle"
                    alt="User Image"
                />
            </div>
            <div class="pull-left info">
                <p>
                @if(!empty(session('admin')))
                    {{session('admin')->admin_account}}
                @endif
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> 线上</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input
                    type="text"
                    name="q"
                    class="form-control"
                    placeholder="搜索..."
                />
                <span class="input-group-btn">
                    <button
                        type="submit"
                        name="search"
                        id="search-btn"
                        class="btn btn-flat"
                    >
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">主要导航</li>
            <li>
                <a href="/"
                    ><i class="fa fa-dashboard"></i> <span>首页</span></a
                >
            </li>
            @if(session("4"))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>商品品牌</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/brand/create"
                            ><i class="fa fa-circle-o"></i> 添加品牌</a
                        >
                    </li>
                    <li>
                        <a href="/brand/index"
                            ><i class="fa fa-circle-o"></i> 品牌列表</a
                        >
                    </li>
                </ul>
            </li>
            @endif
            @if(session("3"))
             <li class="treeview">
                <a>
                    <i class="fa fa-pie-chart"></i>
                    <span>优惠管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/coupon"><i class="fa fa-circle-o"></i>优惠列表</a>
                    </li>
                    <li>
                        <a href="/coupon/create"><i class="fa fa-circle-o"></i>优惠添加</a>
                    </li>
                </ul>
            </li>
            @endif
            @if(session("2"))
            <li class="treeview">
                <a>
                    <i class="fa fa-pie-chart"></i>
                    <span>后台统计</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/operate"
                            ><i class="fa fa-circle-o"></i> 年,月,周,日数据</a
                        >
                    </li>
                    <li>
                        <a href=""
                            ><i class="fa fa-circle-o"></i> 自定义查询</a
                        >
                    </li>
                </ul>
            </li>
            @endif
            @if(session("18"))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>管理员管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/admin/Adminuser"
                            ><i class="fa fa-circle-o"></i> 管理员添加</a
                        >
                    </li>
                    <li>
                        <a href="/admin/ListAdminuser"
                            ><i class="fa fa-circle-o"></i> 管理员列表</a
                        >
                    </li>
                    <li>
                        <a href="/admin/Adminrole"
                            ><i class="fa fa-circle-o"></i> 角色添加</a
                        >
                    </li>
                    <li>
                        <a href="/admin/ListAdminrole"
                            ><i class="fa fa-circle-o"></i> 角色列表</a
                        >
                    </li>
                    <li>
                        <a href="/admin/Adminmenu"
                            ><i class="fa fa-circle-o"></i> 菜单添加</a
                        >
                    </li>
                    <li>
                        <a href="/admin/ListAdminmenu"
                            ><i class="fa fa-circle-o"></i> 菜单列表</a
                        >
                    </li>
                </ul>
            </li>
            @endif
            @if(session("1"))   
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>商品管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/goods/create"
                            ><i class="fa fa-circle-o"></i> 商品添加</a
                        >
                    </li>
                    <li>
                        <a href="/goods/index"
                            ><i class="fa fa-circle-o"></i> 商品列表</a
                        >
                    </li>
                </ul>
            </li>
            @endif
            @if(session("25"))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>广告管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/ad/create"
                            ><i class="fa fa-circle-o"></i>广告添加</a
                        >
                    </li>
                    <li>
                        <a href="/ad"
                            ><i class="fa fa-circle-o"></i>广告列表</a
                        >
                    </li>
                    <li>
                        <a href="/position/create"
                            ><i class="fa fa-circle-o"></i>广告位添加</a
                        >
                    </li>
                    <li>
                        <a href="/position"
                            ><i class="fa fa-circle-o"></i>广告位列表</a
                        >
                    </li>
                </ul>
            </li>
            @endif
            @if(session("15"))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>商品类型</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/goodstype/create"
                            ><i class="fa fa-circle-o"></i> 添加类型</a
                        >
                    </li>
                    <li>
                        <a href="/goodstype/index"
                            ><i class="fa fa-circle-o"></i> 类型列表</a
                        >
                    </li>
                </ul>
            </li>
            @endif
            @if(session("12"))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>商品分类</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/category/create"
                            ><i class="fa fa-circle-o"></i> 添加分类</a
                        >
                    </li>
                    <li>
                        <a href="/category/index"
                            ><i class="fa fa-circle-o"></i> 分类列表</a
                        >
                    </li>
                </ul>
            </li>
            @endif
            <li class="header">标签</li>
            <li>
                <a href=""
                    ><i class="fa fa-circle-o text-red"></i>
                    <span>重要</span></a
                >
            </li>
            <li>
                <a href=""
                    ><i class="fa fa-circle-o text-yellow"></i>
                    <span>警告</span></a
                >
            </li>
            <li>
                <a href=""
                    ><i class="fa fa-circle-o text-aqua"></i>
                    <span>信息</span></a
                >
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
