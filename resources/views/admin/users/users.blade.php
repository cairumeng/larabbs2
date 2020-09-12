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
                    <button class="btn btn-secondary btn-sm">
                        <i class="far fa-trash-alt"></i>

                        Mass delete
                    </button>
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
                    <td><input type="checkbox" name="user" value="{{$user->id}}"></td>
                    <th scope="row">{{$user->id}}</th>

                    <td><a href="{{route('users.show',$user)}}"><img src="{{$user->avatar}}" alt="avatar"
                                class="topic-avatar img-thumbnail"></a></td>
                    <td><a href="{{route('users.show',$user)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>
                        <i class="far fa-edit text-success edit_btn " data-user="{{json_encode($user->toArray())}}"></i>
                        <form method="POST" action="{{route('users.destroy',$user->id)}}" class="d-inline">
                            @csrf
                            @method('delete')
                            <i class="far fa-trash-alt text-danger"></i>
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

    console.log($('.edit_btn'))
    $('.edit_btn').click(function () {
        var userId = $(this).data('user')
        // send axios request to fetch 
        console.log('edit', userId, editPanel)
        createPanel.hide()
        filterPanel.hide()
        editPanel.show()
    })

    createButton.click(function () {
        console.log('create', createPanel)
        editPanel.hide()
        filterPanel.hide()
        createPanel.show()
    })

    filterButton.click(function () {
        console.log('filter', filterPanel)
        editPanel.hide()
        createPanel.hide()
        filterPanel.show()
    })

</script>
@endsection