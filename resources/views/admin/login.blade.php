<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>智慧运营管理中心</title>
    <link rel="stylesheet" href="/adminlte/dist/css/index.css">
    <link rel="stylesheet" media="screen" href="/adminlte/dist/css/login.css">
    <link rel="stylesheet" type="text/css" href="/adminlte/dist/error/dialog.css">
    <script src="/adminlte/dist/error/zepto.min.js"></script>
    <script type="text/javascript" src="/adminlte/dist/error/dialog.min.js"></script>
</head>

<body>
    <!-- particles.js container -->
    <div id="particles-js" style="display: flex;align-items: center;justify-content: center">

        <canvas class="particles-js-canvas-el" width="1920" height="369" style="width: 100%; height: 100%;"></canvas>
    </div>
    <div class="apTitle">大数据智慧运营管理中心</div>
    <div class="logcon">
        <form action="/logindo" method="post">
            @csrf
                    <div class="line"><span>账号:</span>
                    <input class="bt_input" type="text" name="usernem"  placeholder="账号"></div>
                    <div class="line"><span>密码:</span>
                    <input class="bt_input" type="password" name="pwd"  placeholder="密码"></div>
                    <div class="line"><span>&nbsp;&nbsp;</span>
                    <input type="submit" value="登录" class="logingBut"></div>
        </form>
    </div>


    <!-- scripts -->
    <script src="/adminlte/dist/js/login.js"></script>
    <script src="/adminlte/dist/js/loginApp.js"></script>
    <script>
        function changeImg() {
            let pic = document.getElementById('picture');
            console.log(pic.src)
            if (pic.getAttribute("src", 2) == "img/check.png") {
                pic.src = "img/checked.png"
            } else {
                pic.src = "img/check.png"
            }
        }
    </script>


@if(!empty(session('error')))
    <script>
        $(function () {
            popup({ type: 'error', msg: "{{session('error')}}", delay: 2000, bg: true, clickDomCancel: true });
        }); 
    </script>
@endif
</body>

</html>