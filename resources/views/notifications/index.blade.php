@extends('layouts.app')
@section('content')
<div class="card mt-5">
    <div class="card-header text-center">
        <i class="far fa-bell"></i> Mes notifications
    </div>
    <div class="card-body">
        <ul>
            @if(count($notifications) > 0)
            @foreach($notifications as $notification)
            <li class="list-unstyled">
                <div class="media">
                    <img src="{{$notification->data['user_avatar']}}" class="mr-3 topic-avatar img-thumbnail"
                        alt="{{$notification->data['user_name']}}">

                    <div class="media-body mt-2 ml-3">
                        <div>
                            <div>
                                <a href="{{route('users.show',$notification->data['user_id'])}}" class="">
                                    {{$notification->data['user_name']}} </a>comment
                                <a href="{{route('topics.show',$notification->data['topic_id'])}}" class="">
                                    {{$notification->data['topic_title']}}
                                </a>

                                <small class="float-right">
                                    <i class="far fa-clock ml-3 "></i>
                                    {{$notification->created_at->diffForHumans()}}</small>
                            </div>
                            <div>
                                {!!$notification->data['reply_content']
                                !!}
                            </div>

                        </div>
                    </div>
                </div>
            </li>
            @if(!$loop->last)
            <hr>
            @endif
            @endforeach
            @else
            No notification
            @endif
        </ul>
    </div>
</div>
@endsection