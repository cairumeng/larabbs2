<div id="create_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Create Panel</h5>
        </div>
        <form method="POST" action="{{route('admin.roles.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Role name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="permissions">Permissions</label>
                <select name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $permission)
                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-secondary" type="submit">Save</button>
        </form>
    </div>
</div>