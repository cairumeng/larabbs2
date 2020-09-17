<div id="create_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Create Panel</h5>
        </div>
        <form method="POST" action="{{route('admin.permissions.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Permission name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <button class="btn btn-secondary" type="submit">Save</button>
        </form>
    </div>
</div>