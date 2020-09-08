<div class="card">
    <div class="card-header">
        <ul class="nav">
            <li class="nav-item {{ active_class(!if_query('order','recent'))}}">
                <a class="nav-link" href="{{route('topics.index')}}?order=default">Last reply</a>
            </li>
            <li class="nav-item {{active_class(if_query('order','recent'))}}">
                <a class="nav-link" href="{{route('topics.index')}}?order=recent">Latest topic</a>
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
                                <a href="{{route('topics.show',$topic)}}" class="">{{$topic->title}}</a>
                            </div>
                            <div class="badge float-right"> {{ $topic->reply_count}} </div>

                        </div>
                        <a href="{{route('categories.topics',$topic->category)}}" class="">
                            <i class="fas fa-folder"></i> {{$topic->category->name}}
                        </a>
                        <a href="{{route('users.show',$topic->user)}}" class="">
                            <i class="fas fa-user ml-3"></i>{{$topic->user->name}}
                        </a>
                        <i class="far fa-clock ml-3 "></i>Created at:{{$topic->created_at->diffForHumans()}}
                        <i class="far fa-clock ml-3 "></i>Updated at:{{$topic->updated_at->diffForHumans()}}
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