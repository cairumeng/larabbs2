<div class="card mt-5">
    <div class="card-body">
        @include('topics._reply_box',['topic'=>$topic])
        <hr>
        <ul>
            @foreach($replies as $reply)
            <li class="list-unstyled">
                <div class="media">
                    <img src="{{$reply->user->avatar}}" class="mr-3 topic-avatar" alt="{{$reply->user->name}}">

                    <div class="media-body">
                        <div>
                            <span>{{$reply->user->name}}</span>
                            <small><i class="far fa-clock ml-3 "></i>{{$reply->created_at->diffForHumans()}}</small>
                            <form method="POST" action="{{route('replies.destroy',$reply->id)}}"
                                onclick="return confirm('Are you sure?')" class="float-right">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-default btn-xs"><i
                                        class="fas fa-trash "></i></button>
                            </form>
                        </div>
                        <div>
                            {!!$reply->content!!}
                        </div>
                    </div>
                </div>
            </li>
            @if(!$loop->last)
            <hr>
            @endif
            @endforeach
        </ul>
    </div>
</div>
<div class="d-flex justify-content-center mt-5">
    {!! $replies->links()!!}
</div>