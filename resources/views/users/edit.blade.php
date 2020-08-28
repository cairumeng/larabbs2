@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5 mr-auto ">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Profile Edit
            </div>
            <div class="card-body">
                <form method="POST" action="route('users.update')" enctype="multipart/form-data">
                    @csrf
                    @method('pacth')
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                            value="{{old('email')}}">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmatiion">Password Confirmation</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmatiion">
                    </div>
                    <div class="form-group">
                        <label for="introduction">Introduction</label>
                        <textarea class="form-control" id="introduction" name="introduction" rows="3"
                            placeholder="please enter your introduction here!">{{$user->introduction}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Upload your avatar</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
@stop