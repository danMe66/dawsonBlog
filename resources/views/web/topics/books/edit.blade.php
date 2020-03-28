@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <h4><strong>小册封面</strong></h4>
                        <hr>
                        <div align="center">
                            <img class="thumbnail img-responsive" src="{{ $book->cover }}" width="200"/>
                        </div>
                        <div class="media-body">
                            <hr>
                            <h4><strong>小册简介</strong></h4>
                            <p>{{$book->description}}</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <span>
                    <h1 class="panel-title pull-left" style="font-size:25px;">{{$book->title}} </h1>
                    <span style="float: right"><button type="button" class="btn btn-primary" data-toggle="modal"
                                                       data-target="#editInfo"
                                                       data-whatever="@mdo">新建小册</button></span>
                </span>
                </div>
            </div>

            {{-- 用户发布的内容 --}}
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (if_query('tab', 'replies'))
                        <ul class="nav nav-tabs">
                            <li class="{{ active_class(if_query('tab', 'replies')) }}">
                                <a href="">章节文章</a>
                            </li>
                            <li>
                                <a class="btn btn-primary" data-toggle="modal" data-target="#addTopic"
                                   data-whatever="@mdo">关联文章</a>
                            </li>
                        </ul>
                        @include('topics.books._chapter', ['chapters' => $topic_has_book->topics_has_chapter()->paginate(5)])
                    @else
                        <ul class="nav nav-tabs">
                            <li class="{{ active_class(if_query('tab', null)) }}">
                                <a href="">书籍目录</a>
                            </li>
                            <li>
                                <a class="btn btn-primary" data-toggle="modal" data-target="#addChapter"
                                   data-whatever="@mdo">新建目录</a>
                            </li>
                        </ul>
                        @include('topics.books._article', ['topics' => $book->chapter_has_books()->paginate(5)])
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{--    修改小册模态框--}}
    <div class="modal fade" id="editInfo" tabindex="-1" role="dialog" aria-labelledby="editInfo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">修改书籍信息</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">小册名称:</label>
                            <input type="text" class="form-control" id="recipient-name" value="{{$book->title}}">
                        </div>
                        <div class="form-group">
                            <label for="">小册封面：</label>
                            <br>
                            <img class="thumbnail img-responsive" src="{{ $book->cover }}" width="200"/>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">小册简介:</label>
                            <textarea class="form-control" id="message-text">{{$book->description}}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{-- 新建章节 --}}
    <div class="modal fade" id="addChapter" tabindex="-1" role="dialog" aria-labelledby="addChapter">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">新建章节</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('books.chapterAdd') }}" method="POST"
                          accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">章节名称:</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">排序:</label>
                            <select class="form-control" name="order">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{-- 关联章节文章 --}}
    <div class="modal fade" id="addTopic" tabindex="-1" role="dialog" aria-labelledby="addTopic">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">关联章节文章</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('books.chapterHasTopic') }}" method="POST"
                          accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">选择文章:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">排序:</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

@stop