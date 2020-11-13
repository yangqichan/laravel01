<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>后台登录页面</title>
    <link rel="stylesheet" href="/adminlte/dist/css/index.css">
</head>
<body>
<div class="loginmain">
    <div class="login-title">
        <span>管理员登录</span>
    </div>
    <form action="/logindo" method="post">
        @csrf
    <div class="login-con">
        <div class="login-user">
            <div class="icon">
                <img src="./user_icon_copy.png" alt="">
            </div>
            <input type="text" name="usernem" placeholder="用户名" autocomplete="off" value="">
        </div>
        <div class="login-pwd">
            <div class="icon">
                <img src="./lock_icon_copy.png" alt="">
            </div>
            <input type="password" name="pwd" placeholder="密码" autocomplete="off" value="">
        </div>
        <div class="login-btn">
            <input type="submit" value="登录">
        </div>
    </div>
    </form>
</div>
</body>
</html>