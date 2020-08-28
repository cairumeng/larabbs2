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
            <div class="card-body mr-auto">
                <h5>no data...</h5>
            </div>
        </div>
    </div>

</div>
@stop