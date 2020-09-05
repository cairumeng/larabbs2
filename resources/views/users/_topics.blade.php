@if(count($topics))
<ul class="list-group">
    @foreach($topics as $topic)
    <li class="list-group-item">
        <a href="{{route('topics.show',$topic)}}" class="">{{$topic->title}}</a>
        <span class="float-right">{{$topic->reply_count}} replies
            <span class=""> . </span>
            {{$topic->created_at->diffForHumans()}}
        </span>
    </li>
    @endforeach
</ul>

@else
<div class="empty-block">no data ~_~ </div>
@endif

<div class="d-flex justify-content-center mt-5">
    {!! $topics->links() !!}

</div>