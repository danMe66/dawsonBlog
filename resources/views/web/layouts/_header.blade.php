<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                PHP面试网
            </a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ active_class(if_route('topics.index')) }}"><a href="{{ route('topics.index') }}">最新 📣</a>
                </li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}"><a
                        href="{{ route('categories.show', 1) }}">分享 😋</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}"><a
                        href="{{ route('categories.show', 5) }}">面试 💯</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}"><a
                        href="{{ route('categories.show', 6) }}">笔记 📒</a></li>
{{--                <li class=""><a--}}
{{--                        href="{{ route('books.index') }}">面团小册 📚</a></li>--}}
                {{--<li class="{{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}"><a href="{{ route('categories.show', 3) }}">问答</a></li>--}}
                {{--<li class="{{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}"><a href="{{ route('categories.show', 4) }}">公告</a></li>--}}
            </ul>

            <form class="navbar-form navbar-left" action="/search">
                <input class="form-control" name="query" type="text" placeholder="关键词" autocomplete="off"
                       value="{{request()->input('query')}}"/>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{ route('login') }}">立即登录</a></li>
                    <li><a href="{{ route('register') }}">注册</a></li>
                @else
                    <li role="fat-menu" class="dropdown">
                        <a id="drop3" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                        <ul id="menu2" class="dropdown-menu" aria-labelledby="drop5">
                            <li>
                                <a href="{{ route('topics.create') }}">✍️ 创建文章
                                    {{--                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>--}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('books.create') }}">📚 创建小册
                                    {{--                                    <span class="glyphicon glyphicon-books" aria-hidden="true"></span>--}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('topics.create') }}">🚩 发起面团
                                    {{--                                    <span class="glyphicon glyphicon-flag" aria-hidden="true"></span>--}}
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- 消息通知标记 --}}
                    <li>
                        <a href="{{ route('notifications.index') }}" class="notifications-badge"
                           style="margin-top: -2px;">
                            <span class="badge badge-{{ Auth::user()->notification_count > 0 ? 'hint' : 'fade' }} "
                                  title="消息提醒">
                                {{ Auth::user()->notification_count }}
                            </span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px"
                                     height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            @can('manage_contents')
                                <li>
                                    <a href="{{ url(config('administrator.uri')) }}">
                                        <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                                        管理后台
                                    </a>
                                </li>
                            @endcan

                            <li>
                                <a href="{{ route('users.show', Auth::id()) }}">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    个人中心
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.edit', Auth::id()) }}">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    编辑资料
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                    退出登录
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>