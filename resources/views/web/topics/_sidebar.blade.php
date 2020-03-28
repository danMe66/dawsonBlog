<div class="panel panel-default">
    <div class="panel-body">
        <div class="text-center">站点公告 📣</div>
        <hr>
        <div class="media-body">
            <span class="media-list">本站持续更新中，感谢您的访问，敬请期待！</span>
        </div>
    </div>
</div>

{{--<div class="panel panel-default">--}}
{{--    <div class="panel-body">--}}
{{--        <div class="text-center">🏄🏄🏄</div>--}}
{{--        <hr>--}}
{{--        <div class="media-body">--}}
{{--            <span--}}
{{--                class="media-list">  在日常生活中使用任何工具时，如果理解了该工具的工作原理，使用时能更加运用自如。--}}
{{--                这对于应用开发来说也一样，当你能真正懂得一个功能背后实现原理时，你就离成为大神不远了。🏄🤠🤠🤠🤠--}}
{{--            </span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@if (count($active_users))--}}
{{--    <div class="panel panel-default">--}}
{{--        <div class="panel-body active-users">--}}

{{--            <div class="text-center">活跃用户 🏅</div>--}}
{{--            <hr>--}}
{{--            @foreach ($active_users as $active_user)--}}
{{--                <a class="media" href="{{ route('users.show', $active_user->id) }}">--}}
{{--                    <div class="media-left media-middle">--}}
{{--                        <img src="{{ $active_user->avatar }}" width="24px" height="24px"--}}
{{--                             class="img-circle media-object">--}}
{{--                    </div>--}}

{{--                    <div class="media-body">--}}
{{--                        <span class="media-heading">{{ $active_user->name }}</span>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            @endforeach--}}

{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}

{{--<div class="panel panel-default">--}}
{{--    <div class="panel-body active-users">--}}
{{--        <div class="text-center">热门标签 📚</div>--}}
{{--        <hr>--}}
{{--        <div>--}}
{{--            <span class="label label-default">Default</span>--}}
{{--            <span class="label label-primary">Primary</span>--}}
{{--            <span class="label label-success">Success</span>--}}
{{--            <span class="label label-info">Info</span>--}}
{{--            <span class="label label-warning">Warning</span>--}}
{{--            <span class="label label-danger">Danger</span>--}}
{{--            <span class="label label-default">Default</span>--}}
{{--            <span class="label label-primary">Primary</span>--}}
{{--            <span class="label label-success">Success</span>--}}
{{--            <span class="label label-info">Info</span>--}}
{{--            <span class="label label-warning">Warning</span>--}}
{{--            <span class="label label-danger">Danger</span>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}

@if (count($links))
    <div class="panel panel-default">
        <div class="panel-body active-users">

            <div class="text-center">🏆优质资源推荐🥇🥈🥉</div>
            <hr>
            @foreach ($links as $link)
                <a class="media" href="{{ $link->link }}">
                    <div class="media-body">
                        <span class="media-heading">{{ $link->title }}</span>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
@endif