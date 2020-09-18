<div id="filter_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Filter Panel</h5>
        </div>
        <form method="POST" action="{{route('admin.categories.show')}}">
            @csrf
            <div class="form-group ">
                <label for="id">Category ID</label>
                <input type="text" class="form-control" name="id">
            </div>
            <div class="form-group ">
                <label for="id">Category name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <button class="btn btn-secondary" type="submit">Search</button>
        </form>
    </div>
</div>