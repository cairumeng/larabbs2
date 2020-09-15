@extends('admin.layouts.default')
@section('content')
<div class="row">
    <div class="col-8 main-box">
        <section id="admin-title" class="mt-3">
            <h1 class="d-inline">Users</h1>
            <div class="float-right">
                <button class="btn btn-success" id="create_btn">User Create</button>
                <button class="btn btn-primary" id="filter_btn">Filter</button>
            </div>
        </section>
        <section id="admin-tool-bar" class="mt-5 mb-2">
            <ul class="nav">
                <li class="nav-item active">
                    <form action="{{route('admin.users.destroy')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-secondary btn-sm" id="mass_delete_btn"
                            onclick="return confirm('Are you sure you want to delete these users?')">
                            <i class="far fa-trash-alt"></i>
                            Mass delete
                        </button>
                        <input type="hidden" name="user_ids" value="" id="user_ids">
                    </form>
                </li>
                <li class="nav-item ml-4">
                    <div class="mt-1">Current pages: {{$users->currentPage()}}/{{$users->lastPage()}}</div>
                </li>
                <li class="nav-item ml-4">
                    {{$users->links()}}
                </li>
            </ul>
        </section>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">#ID</th>
                    <th scope="col">avatar</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">management</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td><input type="checkbox" name="user" value="{{$user->id}}" class="selected-ids"></td>
                    <th scope="row">{{$user->id}}</th>
                    <td><a href="{{route('users.show',$user)}}"><img src="{{$user->avatar}}" alt="avatar"
                                class="topic-avatar img-thumbnail"></a></td>
                    <td><a href="{{route('users.show',$user)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>
                        <button class="btn edit_btn" data-user="{{json_encode($user->toArray())}}">
                            <i class="far fa-edit text-success"></i>
                        </button>

                        <form method="POST" action="{{route('admin.users.destroy', ['user_ids'=>$user->id])}}"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit"
                                onclick="return confirm('Are you sure you want to delete this user?')">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-4 management-box">
        @include('admin.users._create_panel')
        @include('admin.users._filter_panel')
        @include('admin.users._edit_panel')
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

    $('.edit_btn').click(function () {
        var user = $(this).data('user')
        createPanel.hide()
        filterPanel.hide()
        editPanel.show()
        console.log(user)
        $('#avatar').attr('src', user.avatar)
        $('#email').val(user.email)
        $('#name').val(user.name)
        $('#introduction').val(user.introduction)
        $('#edit_form').attr('action', '/admin/users/' + user.id)
    })

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

        $('#user_ids').val(selectedIds.join('_'))
    })
</script>
@endsection