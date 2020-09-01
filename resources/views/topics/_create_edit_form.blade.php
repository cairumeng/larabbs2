<div class="form-group">
    <label for="title">Title</label>
    <input type="title" class="form-control" id="title" name="title" value="{{old('title',$topic->title)}}" required>
    @if ($errors->has('title'))
    <div class="text-danger">{{ $errors->first('title') }}</div>
    @endif
</div>
<div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" name="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{$category->id? 'selected' : ''}}>{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="body">Body</label>
    <div id="editor">{!!old('body', $topic->body )!!}</div>
    <input type="hidden" value="" name="body" id="body" required />

    @if ($errors->has('body'))
    <div class="text-danger">{{ $errors->first('body') }}</div>
    @endif
</div>