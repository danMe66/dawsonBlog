@extends('layouts.app')


@section('content')

    <div class="row">


        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <span>
                    <h1 class="panel-title pull-left" style="font-size:30px;">下面是搜索"{{$query}}"出现的文章，共{{$topicList->total()}}条</h1>
                </span>
                </div>
            </div>
            <hr>

            {{-- 用户发布的内容 --}}
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (count($topicList))

                        <ul class="list-group">
                            @foreach ($topicList as $topic)
                                <li class="list-group-item">
                                    <a href="{{ $topic->link() }}">{{ $topic->title }}</a>
                                    <span class="meta pull-right">{{ $topic->created_at->diffForHumans() }}</span>
                                </li>
                            @endforeach
                            {{$topicList->links()}}
                        </ul>

                    @else
                        <div class="empty-block">暂无数据 ~_~</div>
                    @endif

                    {{-- 分页 --}}
{{--                    {!! $topics->render() !!}--}}
                </div>
            </div>

        </div>
    </div>
@stop