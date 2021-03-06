<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>后台- @yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <link rel="icon" href="/indexyh/images/favicon.ico">
        <meta
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
            name="viewport"
        />
        <!-- Bootstrap 3.3.7 -->
        <link
            rel="stylesheet"
            href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css"
        />
        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css"
        />
        <!-- Ionicons -->
        <link
            rel="stylesheet"
            href="/adminlte/bower_components/Ionicons/css/ionicons.min.css"
        />
        <!-- Theme style -->
        <link rel="stylesheet" href="/adminlte/dist/css/AdminLTE.min.css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
        <link
            rel="stylesheet"
            href="/adminlte/dist/css/skins/_all-skins.min.css"
        />
        <!-- Morris chart -->
        <link
            rel="stylesheet"
            href="/adminlte/bower_components/morris.js/morris.css"
        />
        <!-- jvectormap -->
        <link
            rel="stylesheet"
            href="/adminlte/bower_components/jvectormap/jquery-jvectormap.css"
        />
        <!-- Date Picker -->
        <link
            rel="stylesheet"
            href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
        />
            <!-- Daterange picker -->
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


        <link
            rel="stylesheet"
            href="/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css"
        />
        <!-- bootstrap wysihtml5 - text editor -->
        <link
            rel="stylesheet"
            href="/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"
        />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link
            rel="stylesheet"
            href="/adminlte/bower_components/bootstrap/dist/css/fonts.css"
        />
        <link rel="stylesheet" type="text/css" href="/adminlte/dist/error/dialog.css">
        <script src="/adminlte/dist/error/zepto.min.js"></script>
        <script type="text/javascript" src="/adminlte/dist/error/dialog.min.js"></script>
        <script src="/adminlte/dist/js/highcharts.js"></script>
        <script src="/adminlte/dist/js/exporting.js"></script>
        <script src="/adminlte/dist/js/highcharts-zh_CN.js"></script>
        <script src="/adminlte/dist/js/highcharts-3d.js"></script>
        <link rel="stylesheet" type="text/css" href="/adminlte/dist/error/dialog.css">
        <script src="/adminlte/dist/error/zepto.min.js"></script>
        <script type="text/javascript" src="/adminlte/dist/error/dialog.min.js"></script>
        <script type="text/javascript" src="/adminlte/dist/error/jquery.min.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- 头部 -->
            @includeIf('admin.layout.top')
            <!-- 猪蹄 -->
            <div class="content-wrapper" style="min-height: 976px;">
            @yield('content')
            </div>
            <!-- 底部 -->
            @includeIf('admin.layout.next')
            <!-- /.content-wrapper -->
            <!-- 设置 -->
            @includeIf('admin.layout.panespublic')
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- jQuery 3 -->
        <script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge("uibutton", $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="/adminlte/bower_components/raphael/raphael.min.js"></script>
        <script src="/adminlte/bower_components/morris.js/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        
        <!-- Bootstrap WYSIHTML5 -->
        <script src="/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="/adminlte/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/adminlte/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="/adminlte/dist/js/demo.js"></script>

        <script src="/adminlte/bower_components/moment/min/moment.min.js"></script>
        <script src="/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.bootcss.com/moment.js/2.24.0/moment-with-locales.js"></script>
       <script src="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    </body>
</html>
