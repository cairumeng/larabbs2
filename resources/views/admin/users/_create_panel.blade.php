<div id="create_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Create Panel</h5>
        </div>
        <form method="POST" action="{{route('register')}}">
            @csrf
            <div class="form-group">
                <label for="name">User name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="email">User email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="email">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="email">Password confirmation</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button class="btn btn-secondary">Save</button>
        </form>
    </div>
</div>