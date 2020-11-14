<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="/indexyh/images/favicon.ico">
	<link type="text/css" rel="stylesheet" href="/indexyh/css/style.css" />
    <!--[if IE 6]>
    <script src="/indexyh/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="/indexyh/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="/indexyh/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/indexyh/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/indexyh/js/menu.js"></script>    
        
	<script type="text/javascript" src="/indexyh/js/select.js"></script>
    
	<script type="text/javascript" src="/indexyh/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="/indexyh/js/iban.js"></script>
    <script type="text/javascript" src="/indexyh/js/fban.js"></script>
    <script type="text/javascript" src="/indexyh/js/f_ban.js"></script>
    <script type="text/javascript" src="/indexyh/js/mban.js"></script>
    <script type="text/javascript" src="/indexyh/js/bban.js"></script>
    <script type="text/javascript" src="/indexyh/js/hban.js"></script>
    <script type="text/javascript" src="/indexyh/js/tban.js"></script>
    
	<script type="text/javascript" src="/indexyh/js/lrscroll_1.js"></script>
    
    
<title>前台- @yield('title')</title>
</head>
<body>  
<!-- 头部 -->
@includeIf('index.layout.top')
<!-- 猪蹄 -->
@yield('content')
<!-- 底部 -->
@includeIf('index.layout.next')
</body>
<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>