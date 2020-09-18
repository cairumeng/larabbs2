<div id="create_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Create Panel</h5>
        </div>
        <form method="POST" action="{{route('admin.categories.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Category name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="name">Category description</label>
                <input type="text" class="form-control" name="description">
            </div>
            <button class="btn btn-secondary" type="submit">Save</button>
        </form>
    </div>
</div>