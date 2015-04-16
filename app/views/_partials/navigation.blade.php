<ul class="nav">
    <li class="{{ Request::is('ranklist*') ? 'active' : null }}">
        <a href="{{URL('ranklist')}}"><i class="icon-book"></i><h3>RankList</h3></a>
    </li>
    <li class="{{ Request::is('problems*') ? 'active' : null }}">
        <a href="{{URL('problems/index')}}"><i class="icon-book"></i><h3>Problems</h3></a>
    </li>
    <li class="{{ Request::is('codes*') ? 'active' : null }}">
        <a href="{{URL('codes/index')}}"><i class="icon-book"></i><h3>Codes</h3></a>
    </li>
    <li class="{{ Request::is('users*') ? 'active' : null }}">
        <a href="{{URL('users/index')}}"><i class="icon-book"></i><h3>Users</h3></a>
    </li>

        @if(Sentry::check())
        <li style="float:left"><a href="{{URL('admin/logout')}}"><i class="icon-book"></i><h3>Logout</h3></a></li>
        @else
        <li style="float:left"><a href="{{URL('admin/login')}}"><i class="icon-book"></i><h3>Login</h3></a></li>
        <li style="float:left"><a href="{{URL('admin/register')}}"><i class="icon-book"></i><h3>Register</h3></a></li>
        @endif
    <li style="float: right">
        <a href="http://www.bjut.edu.cn"><h3>BJUT OJ</h3></a>
    </li>
    </ul>
