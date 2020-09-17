<div id="filter_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Filter Panel</h5>
        </div>
        <form method="POST" action="{{route('admin.permissions.show')}}">
            @csrf
            <div class="form-group ">
                <label for="id">permission ID</label>
                <input type="text" class="form-control" name="id">
            </div>
            <button class="btn btn-secondary" type="submit">Search</button>
        </form>
    </div>
</div>