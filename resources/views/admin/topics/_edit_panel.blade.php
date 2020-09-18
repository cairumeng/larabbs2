<div id="edit_panel" class="display-none">
    <div class="card">
        <div class="card-header text-center">
            <h5>Edit Panel</h5>
        </div>
        <form method="POST" action="{{route('admin.topics.update',$topic)}}" id="edit_form">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Topic title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}" id="title">
            </div>
            <div class="form-group ">
                <label for="author">Topic author</label>
                <div class="">
                    <select aria-label="author" name="author" id="author">
                        <optgroup label="author">
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="form-group ">
                <label for="category">Topic category</label>
                <div class="">
                    <select aria-label="category" name="category" id="category">
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
                <textarea class="form-control" name="body" row="3" id="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>