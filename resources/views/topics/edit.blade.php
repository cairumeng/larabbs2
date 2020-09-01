@extends('layouts.app')
@section('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<style>
    .ql-container {
        height: 250px;
    }
</style>
@stop
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5 mr-auto ">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Edit topic
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('topics.update',$topic->id)}}">
                    @csrf
                    @method('patch')
                    @include('topics._create_edit_form')
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
@include('topics._create_edit_script')
@stop