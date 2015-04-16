<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>BJUT Online Judge</title>
    <style type="text/css">
        ul
        {
            list-style: none;;
        }
        li
        {
            float: left;
            font-size: large;
        }
        ul li a{ display:block; }
        ul li a:hover{ background:#999; }
    </style>
    @include('_partials.assets')

</head>
<body>
<div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                @include('_partials.navigation')
            </div>
        </div>
    </div>

    <hr>

    @yield('main')
    <div id="footer" style="text-align: center; border-top: dashed 3px #eeeeee; margin: 50px 0; padding: 20px;">
        @2015<a href="http://sse.bjut.edu.cn"> BJUT SSE </a>
    </div>
</div>
</body>
</html> 