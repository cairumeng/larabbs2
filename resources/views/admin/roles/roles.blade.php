@extends('admin.layouts.default')
@section('content')
<div class="row">
    <div class="col-8 main-box">
        <section id="admin-title" class="mt-3">
            <h1 class="d-inline">Roles</h1>
            <div class="float-right">
                <button class="btn btn-success" id="create_btn">Role Create</button>
                <button class="btn btn-primary" id="filter_btn">Filter</button>
            </div>
        </section>
        <section id="admin-tool-bar" class="mt-5 mb-2">
            <ul class="nav">
                <li class="nav-item active">
                    <form action="" method="POST">
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

            </ul>
        </section>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">#ID</th>
                    <th scope="col">role</th>
                    <th scope="col">rights</th>
                    <th scope="col">management</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td><input type="checkbox" name="user" value="" class="selected-ids"></td>
                    <th scope="row">{{$role->id}}</th>

                    <td><a href="">{{$role->name}}</a></td>
                    <td>
                        @foreach($role->permissions as $rolePermission)
                        {{$rolePermission->name}}
                        @if(!$loop->last)
                        |
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <button class="btn edit_btn">
                            <i class="far fa-edit text-success"></i>
                        </button>

                        <form method="POST" action="'" class="d-inline">
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
        @include('admin.roles._create_panel')
        @include('admin.roles._filter_panel')
        @include('admin.roles._edit_panel')
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





</script>
@endsection