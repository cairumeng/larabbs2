<div id="create_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Create Panel</h5>
        </div>
        <form method="POST" action="{{route('admin.topics.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Topic title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="author">Topic author</label>
                <div class="">
                    <select aria-label="author" name="author">
                        <optgroup label="author">
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="category">Topic category</label>
                <div class="">
                    <select aria-label="category" name="category">
                        <optgroup label="category">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Topic body</label>
                <textarea class="form-control" name="body" row="3"></textarea>
            </div>
            <button class="btn btn-secondary" type="submit">Create</button>
        </form>
    </div>
</div>