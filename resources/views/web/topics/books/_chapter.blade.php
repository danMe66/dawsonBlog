@if (count($chapters))

    <ul class="list-group">
        @foreach ($chapters as $chapter)
            <li class="list-group-item">
                <span style="color: rgb(0, 168, 84)">第{{$chapter->topic->id}}篇: </span>
                <span>
                {{ $reply->topic->title }}
            </span>
{{--                <span class="meta pull-right">--}}
{{--                    <a href="{{ $chapter->id->link() }}" class="btn btn btn-success btn-xs" role="button" target="_blank">浏览</a>--}}
{{--                <a href="/topics/{{$reply->topic->id}}/edit" class="btn btn btn-primary btn-xs" role="button" target="_blank">编辑</a>--}}
{{--            </span>--}}
            </li>
        @endforeach
    </ul>

@else
    <div class="empty-block">暂无数据 ~_~</div>
@endif

{{-- 分页 --}}
{!! $chapters->render() !!}