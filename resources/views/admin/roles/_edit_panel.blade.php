<div id="edit_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Edit Panel</h5>
        </div>
        <form method="POST" action="{{route('admin.roles.update',$role)}}" id="edit_form">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Role name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" id="role_name">
            </div>
            <div class="form-group">
                <label for="permissions">Permissions</label>
                @foreach($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$permission->id}}"
                        id="permission-{{$permission->id}}">
                    <label class="form-check-label" for="permission-{{$permission->id}}">
                        {{$permission->name}}
                    </label>
                </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>