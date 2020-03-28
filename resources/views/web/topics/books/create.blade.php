@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h2 class="text-center">
                        <i class="glyphicon glyphicon-book"></i>
                        新建小册
                    </h2>
                    <hr>

                    @include('common.error')

                    <form action="{{ route('books.store') }}" method="POST"
                          accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input class="form-control" name="title" placeholder="请填写小册名称"
                                   required/>
                        </div>

                        <div class="form-group">
                            <label for="">小册封面：</label>
                            <input type="file" name="cover">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="description" rows="3"
                                      placeholder="小册简介,请填入至少三个字符的内容" required></textarea>
                        </div>

                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary"><span
                                    class="glyphicon glyphicon-ok" aria-hidden="true"></span> 保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')

    <script>

    </script>

@stop