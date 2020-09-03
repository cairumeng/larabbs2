@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-9">
        @include('topics._topic_list')
    </div>
    <div class="col-md-3">
        @include('topics._sidebar')
    </div>
</div>

@endsection