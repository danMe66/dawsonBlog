@extends('layouts.app')

@section('content')
    <div class="ui centered grid container stackable" style="margin-bottom: 80px;min-height:380px">

        <div class="sixteen wide column docs-main-content">

            <div class="ui header text-center"
                 style="font-size: 26px;font-weight: bold;margin-top: 26px;margin-bottom: 26px;">
                面团小册
            </div>
            <br>

            <div class="ui six doubling cards" style="justify-content: center;">
                @foreach ($books as $book)
                <div class="ui card">
                    <a class="image" href="https://learnku.com/docs/laravel/6.x" style="padding:10px;">
                        <img src="{{$book->cover}}">
                    </a>
                    <div class="content">
                        <a class="header">{{$book->title}}</a>
                        <div class="description">{{$book->description}}</div>
                    </div>
                    <div class="extra">
                        <a class="tiny ui button" href="https://learnku.com/docs/laravel/6.x" style="float: left">阅读</a>
                        @guest
                            <a class="tiny ui button" href="/books/1/edit" style="float: right">收藏</a>
                        @else
                            <a class="tiny ui button" href="/books/{{$book->id}}/edit" style="float: right">编辑</a>
                        @endguest
                    </div>
                </div>
                    @endforeach

            </div>


        </div>
    </div>

@stop
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">
@stop
@section('scripts')
    <script src="{{ asset('js/semantic.min.js')}}"></script>

@stop