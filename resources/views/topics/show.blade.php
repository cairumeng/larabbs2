@extends('layouts.app')
@section('content')
<div class="row mt-5">
    <div class="col-md-3">
        <div class="card mb-3">
            <img src="{{$user->avatar}}" class="card-img-top" alt="default_avatar">
            <div class="card-body">
                <h5 class="card-title">Self Introduction</h5>
                <p class="card-text">
                    {{$user->introduction?:'You have not writen your introduction yet!'}}</p>
                <hr>
                <h5 class="card-title">Created at</h5>
                <p class="card-text">{{$user->created_at->diffForHumans()}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-9 ">
        <div class="card">
            <div class="card-body mr-auto">
                <h1 class="d-inline">{{$user->name}}
                    <small>{{$user->email}}</small>
                </h1>

            </div>
        </div>
        <div class="card mt-5">
            <div class="card-body text-center">
                <h1 class="">{{$topic->title}}</h1>
                <div>{{$topic->created_at->diffForHumans()}}
                    <span class="ml-3">
                        <i class="fas fa-comment-dots"></i>
                        {{$topic->reply_count}}
                    </span> </div>
                <div class="mt-5">{!!$topic->body!!}</div>
                <hr>
                <a href="{{route('topics.edit',$topic->id)}}" class="btn btn-light btn-xs">
                    <i class="glyphicon glyphicon-edit"></i> Edit
                </a>
                <a href="{{route('topics.destroy',$topic->id)}}" class="btn btn-light btn-xs">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </div>
        </div>
    </div>

</div>
@stop