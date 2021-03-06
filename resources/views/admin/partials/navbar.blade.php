<ul class="nav navbar-nav">
    <li><a href="/">首页</a></li>
    @if (Auth::check())
        <li @if (Request::is('admin/post*')) class="active" @endif>
            <a href="{{url('/admin/post')}}">博文</a>
        </li>
        <li @if (Request::is('admin/tag*')) class="active" @endif>
            <a href="{{url('/admin/tag')}}">标签</a>
        </li>
        <li @if (Request::is('admin/upload*')) class="active" @endif>
            <a href="{{url('/admin/upload')}}">上传文件</a>
        </li>
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li><a href="/auth/login">登录</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/auth/logout">退出</a></li>
            </ul>
        </li>
    @endif
</ul>