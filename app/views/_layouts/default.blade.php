<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>BJUT Online Judge</title>

    @include('_partials.assets')

</head>
<body>
<div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a href="#">RankList</a>
                <a class="brand" href="{{URL('problems/index')}}">Problems</a>
                <a href="#">Codes</a>

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