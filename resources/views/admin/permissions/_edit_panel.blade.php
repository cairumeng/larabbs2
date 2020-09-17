<div id="edit_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Edit Panel</h5>
        </div>
        <form method="POST" action="{{route('admin.permissions.update',$permission)}}" id="edit_form">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Permission name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" id="permission_name">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>