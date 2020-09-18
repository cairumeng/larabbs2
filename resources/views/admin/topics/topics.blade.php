@extends('admin.layouts.default')
@section('content')
<div class="row">
    <div class="col-8 main-box">
        <section id="admin-title" class="mt-3">
            <h1 class="d-inline">Topics</h1>
            <div class="float-right">
                <button class="btn btn-success" id="create_btn">Topic Create</button>
                <button class="btn btn-primary" id="filter_btn">Filter</button>
            </div>
        </section>
        <section id="admin-tool-bar" class="mt-5 mb-2">
            <ul class="nav">
                <li class="nav-item active">
                    <form action="{{route('admin.topics.destroy')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-secondary btn-sm" id="mass_delete_btn"
                            onclick="return confirm('Are you sure you want to delete these topics?')">
                            <i class="far fa-trash-alt"></i>
                            Mass delete
                        </button>
                        <input type="hidden" name="topic_ids" value="" id="topic_ids">
                    </form>
                </li>
                </li>
                <li class="nav-item ml-4">
                    <div class="mt-1">Current pages: {{$topics->currentPage()}}/{{$topics->lastPage()}}</div>
                </li>

            </ul>
        </section>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">#ID</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Comments</th>
                    <th scope="col">management</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topics as $topic)
                <tr>
                    <td><input type="checkbox" name="topic" value="{{$topic->id}}" class="selected-ids"></td>
                    <th scope="row">{{$topic->id}}</th>

                    <td><a href="">{{$topic->title}}</a></td>
                    <td><a href="">{{$topic->user->name}}</a></td>
                    <td>{{$topic->category->name}}</td>
                    <td>{{$topic->reply_count}}</td>

                    <td>
                        <button class="btn edit_btn" data-topic="{{json_encode($topic->toArray())}}">
                            <i class="far fa-edit text-success"></i>
                        </button>

                        <form method="POST" action="{{route('admin.topics.destroy',['topic_ids'=>$topic->id])}}"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit"
                                onclick="return confirm('Are you sure you want to delete this topic?')">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3 mb-5">
            {{$topics->links()}}
        </div>
    </div>


    <div class="col-4 management-box">
        @include('admin.topics._create_panel')
        @include('admin.topics._filter_panel')
        @include('admin.topics._edit_panel')
    </div>
</div>
</div>
@endsection


@section('scripts')
<script>
    var createButton = $('#create_btn')
    var filterButton = $('#filter_btn')

    var createPanel = $('#create_panel')
    var editPanel = $('#edit_panel')
    var filterPanel = $('#filter_panel')

    createButton.click(function () {
        editPanel.hide()
        filterPanel.hide()
        createPanel.show()
    })

    filterButton.click(function () {
        editPanel.hide()
        createPanel.hide()
        filterPanel.show()
    })

    var selectedIds = []
    $('.selected-ids').change(function (e) {
        if ($(this).is(":checked")) {
            selectedIds.push($(this).val())
        } else {
            var selectedId = $(this).val()
            selectedIds = selectedIds.filter(function (id) { return id !== selectedId })
        }

        $('#topic_ids').val(selectedIds.join('_'))
    })

</script>
@endsection