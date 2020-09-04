<div class="card">
    <div class="card-header">
        <ul class="nav">
            <li class="nav-item {{ active_class(!if_query('order','recent'))}}">
                <a class="nav-link" href="{{Request::url()}}?order=default">Last reply</a>
            </li>
            <li class="nav-item {{active_class(if_query('order','recent'))}}">
                <a class="nav-link" href="{{Request::url()}}?order=recent">Latest topic</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <ul>
            @foreach($topics as $topic)
            <li class="list-unstyled">
                <div class="media topic">
                    <img src="{{$topic->user->avatar}}" class="mr-3 topic-avatar img-thumbnail" alt="{{$topic->title}}">
                    <div class="media-body">
                        <div class="">
                            <div class="mt-0 d-inline">
                                {{$topic->title}}
                            </div>
                            <div class="badge float-right"> {{ $topic->reply_count}} </div>

                        </div>
                        <a href="{{route('categories.topics',$topic->category)}}" class="">
                            <i class="fas fa-folder"></i> {{$topic->category->name}}
                        </a>
                        <i class="fas fa-user ml-3"></i>{{$topic->user->name}}
                        <i class="far fa-clock ml-3 "></i>{{$topic->updated_at->diffForHumans()}}
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
    {!! $topics->links()!!}
</div>