@extends('layouts.app')
@section('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<style>
    .ql-container {
        height: 250px;
    }
</style>

@stop
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5 mr-auto ">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Create topic
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('topics.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="title" class="form-control" id="title" name="title" value="{{old('title')}}">
                        @if ($errors->has('title'))
                        <div class="text-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <div id="editor"></div>
                        <input type="hidden" value="" name="body" id="body" />
                        @if ($errors->has('body'))
                        <div class="text-danger">{{ $errors->first('body') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script src="https://cdn.quilljs.com/1.3.0/quill.min.js"></script>
<script>
    function imageHandler() {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.onchange = function () {
            var data = new FormData();
            data.append('file', input.files[0]);
            data.append('folder', 'topics');
            axios.post("{{route('images.store')}}", data)
                .then(function (response) {
                    console.log(response.data)
                    insertToEditor(response.data.path);
                })
                .catch(function (error) {
                    console.log('upload failed', error)
                })
        }
    }

    var quill = new Quill('#editor', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['image', 'video', 'link', 'code-block']
            ],
        },
        placeholder: 'please enter your body here!',
        theme: 'snow',
    });
    quill.getModule("toolbar").addHandler("image", imageHandler);

    function insertToEditor(url) {
        // push image url to rich editor.
        const range = quill.getSelection();
        quill.insertEmbed(range.index, 'image', url);
    }

    var bodyInput = $('#body')

    quill.on('text-change', function (delta, oldDelta, source) {
        bodyInput.val($('.ql-editor').html())
        console.log(bodyInput.val())
    });

</script>
@stop