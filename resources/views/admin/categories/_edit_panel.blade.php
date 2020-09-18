<div id="edit_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Edit Panel</h5>
        </div>
        <form method="POST" action="{{route('admin.categories.update',$category)}}" id="edit_form">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Category name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" id="category_name">
            </div>
            <div class="form-group">
                <label for="name">Category description</label>
                <input type="text" class="form-control" name="description" value="{{old('description')}}"
                    id="category_description">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>