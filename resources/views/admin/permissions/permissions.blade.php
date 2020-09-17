@extends('admin.layouts.default')
@section('content')
<div class="row">
    <div class="col-8 main-box">
        <section id="admin-title" class="mt-3">
            <h1 class="d-inline">Permissions</h1>
            <div class="float-right">
                <button class="btn btn-success" id="create_btn">Permission Create</button>
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
                            onclick="return confirm('Are you sure you want to delete these permissions?')">
                            <i class="far fa-trash-alt"></i>
                            Mass delete
                        </button>
                        <input type="hidden" name="permission_ids" value="" id="permission_ids">
                    </form>
                </li>

            </ul>
        </section>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">#ID</th>
                    <th scope="col">permission</th>
                    <th scope="col">management</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                <tr>
                    <td><input type="checkbox" name="permission" value="{{$permission->id}}" class="selected-ids"></td>
                    <th scope="row">{{$permission->id}}</th>

                    <td><a href="">{{$permission->name}}</a></td>
                    <td>
                        <button class="btn edit_btn" data-permission="{{json_encode($permission->toArray())}}">
                            <i class="far fa-edit text-success"></i>
                        </button>

                        <form method="POST"
                            action="{{route('admin.permissions.destroy',['permission_ids'=>$permission->id])}}"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit"
                                onclick="return confirm('Are you sure you want to delete this permission?')">
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
        @include('admin.permissions._create_panel')
        @include('admin.permissions._filter_panel')
        @include('admin.permissions._edit_panel')
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

    var selectedIds = []
    $('.selected-ids').change(function (e) {
        if ($(this).is(":checked")) {
            selectedIds.push($(this).val())
        } else {
            var selectedId = $(this).val()
            selectedIds = selectedIds.filter(function (id) { return id !== selectedId })
        }

        $('#permission_ids').val(selectedIds.join('_'))
    })

    filterButton.click(function () {
        editPanel.hide()
        createPanel.hide()
        filterPanel.show()
    })

    $('.edit_btn').click(function () {
        var permission = $(this).data('permission')
        createPanel.hide()
        filterPanel.hide()
        editPanel.show()
        $('#permission_name').val(permission.name)
        $('#edit_form').attr('action', '/admin/permissions/' + permission.id)
    })

</script>
@endsection