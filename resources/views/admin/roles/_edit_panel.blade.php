<div id="create_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Create Panel</h5>
        </div>
        <form method="POST" action="{{route('register')}}">
            @csrf
            <div class="form-group">
                <label for="name">Role name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="email">permissions</label>
                <select name="cars" id="cars">

                </select>
            </div>
            <button class="btn btn-secondary">Save</button>
        </form>
    </div>
</div>