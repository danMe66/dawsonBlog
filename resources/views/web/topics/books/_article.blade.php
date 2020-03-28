@if (count($topics))

    <ul class="list-group">
        @foreach ($topics as $topic)
            <li class="list-group-item">
                <span style="color: rgb(0, 168, 84)">第{{$topic->id}}章: </span>
                <span>{{ $topic->title }} <span class="badge">14</span></span>
                <span class="meta pull-right">
                <a href="/books/1/edit?tab=replies" class="btn btn btn-success btn-xs" role="button">文章目录</a>
                <a href="#" class="btn btn btn-primary btn-xs" data-toggle="modal" data-target="#editTitle"
                   data-whatever="@mdo" role="button">修改</a>
            </span>
            </li>
        @endforeach
    </ul>

{{--    修改小册详情模态框--}}
    <div class="modal fade" id="editTitle" tabindex="-1" role="dialog" aria-labelledby="editTitle">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">修改章节信息</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">章节名称:</label>
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
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="empty-block">暂无数据 ~_~</div>
@endif

{{-- 分页 --}}
{!! $topics->render() !!}