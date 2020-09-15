<div id="edit_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Edit Panel</h5>
        </div>
        <form method="POST" action="" enctype="multipart/form-data" id="edit_form">
            @csrf
            @method('patch')
            <div class="form-group mb-5 mt-5">
                <img src="" alt="avatar" class="text-center" style="width:128px;" id='avatar'>
                <input type="file" class="form-control-file" name="avatar">

                @if ($errors->has('avatar'))
                <div class="text-danger">{{ $errors->first('avatar') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="name" class="form-control" id="name" name="name" value="{{old('name')}}">
                @if ($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                    value="{{old('email')}}" disabled>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @if ($errors->has('password'))
                <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="password_confirmation ">Password Confirmation</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="form-group">
                <label for="introduction">Introduction</label>
                <textarea class="form-control" id="introduction" name="introduction" rows="3"
                    placeholder="please enter your introduction here!">
                {{old('introduction')}}</textarea>
                @if ($errors->has('introduction'))
                <div class="text-danger">{{ $errors->first('introduction') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>