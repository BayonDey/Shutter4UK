@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-5">
                            <h3>User Permission</h3>
                        </div>
                        <div class="col-sm-7">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content manageUser">
        <!-- Info boxes -->

        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{ route('updateUserPermission') }}" method="post">
                        @csrf()
                        <div class="manage-box-wrap new-model mt-0">

                            <div class="card card-outline card-info">
                                <div class="card-header bg-white mb-2 p-4">
                                    <h3 class="card-title">Select Admin user</h3>
                                    <select class="form-control select2 user_id" name="user_id">
                                        <option value="0">Select ...</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" {{($userId == $user->id) ? 'selected' : ''}}>{{$user->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="accordion">

                                    @if(count($la_menu) > 0)
                                    @foreach($la_menu as $i => $menu)
                                    <div class="card">
                                        <div class="card-header">
                                            <button type="button" class="btn btn-link" id="heading_{{$menu->id}}" data-toggle="collapse" data-target="#collapse_{{$menu->id}}" aria-expanded="true" aria-controls="collapse_{{$menu->id}}">
                                                @if($menu->section_key != 'dashboard')
                                                <input type="checkbox" name="permission_parent[{{$menu->id}}]" {{(isset($la_userPermission[$menu->id]) && ($la_userPermission[$menu->id]->action_edit == 1)) ? 'checked' : ''}}>
                                                @endif

                                                {{ ucwords($menu->sections) }}
                                            </button>
                                            @if($menu->section_key != 'dashboard')
                                            <label class="custom-chk-wrap">Select all
                                                <input type="checkbox" class="parentCheckbox" id="parentCheckbox__{{$menu->id}}">
                                                <span class="checkmark"></span>
                                            </label>
                                            @endif
                                        </div>


                                        @if(isset($la_subMenu[$menu->id]) && (count($la_subMenu[$menu->id]) > 0))
                                        <div id="collapse_{{$menu->id}}" class="collapse show" aria-labelledby="heading_{{$menu->id}}" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table borderless">
                                                        <!-- <thead>
                                                            <tr>
                                                                <th scope="col">Section</th>
                                                                <th scope="col">Add</th>
                                                                <th scope="col">Edit</th>
                                                                <th scope="col">Delete</th>
                                                                <th scope="col">Select all</th>
                                                            </tr>
                                                        </thead> -->
                                                        <tbody>

                                                            @foreach ($la_subMenu[$menu->id] as $row)

                                                            <tr>
                                                                <th scope="row">{{$row->sections}}</th>

                                                                <td>
                                                                    <label class="custom-chk-wrap">Add
                                                                        <input type="checkbox" class="childCheckbox childCheckbox__{{$menu->id}}" id="add_childCheckbox__{{$menu->id}}__{{$row->id}}" name="permission[{{$row->id}}][action_add]" {{(isset($la_userPermission[$row->id]) && ($la_userPermission[$row->id]->action_add == 1)) ? 'checked' : ''}}>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="custom-chk-wrap">Edit
                                                                        <input type="checkbox" class="childCheckbox childCheckbox__{{$menu->id}}" id="edit_childCheckbox__{{$menu->id}}__{{$row->id}}" name="permission[{{$row->id}}][action_edit]" {{(isset($la_userPermission[$row->id]) && ($la_userPermission[$row->id]->action_edit == 1)) ? 'checked' : ''}}>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="custom-chk-wrap">Delete
                                                                        <input type="checkbox" class="childCheckbox childCheckbox__{{$menu->id}}" id="del_childCheckbox__{{$menu->id}}__{{$row->id}}" name="permission[{{$row->id}}][action_delete]" {{(isset($la_userPermission[$row->id]) && ($la_userPermission[$row->id]->action_delete == 1)) ? 'checked' : ''}}>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="custom-chk-wrap">Select all
                                                                        <input type="checkbox" class="childCheckAll childCheckbox__{{$menu->id}}" id="childCheckbox__{{$menu->id}}__{{$row->id}}" {{(isset($la_userPermission[$row->id]) && (($la_userPermission[$row->id]->action_add+$la_userPermission[$row->id]->action_edit+$la_userPermission[$row->id]->action_delete) == 3)) ? 'checked' : ''}}>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </td>
                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>


                                                </div>
                                            </div>
                                        </div>


                                        @endif

                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="button-action">
                            <a href="{{route('admin_users')}}"><button type="button" class="btn btn-default">Back</button></a>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>

                    </form>
                </div>


            </div>
        </div>


        <!-- Main row -->

        <!-- /.row -->
    </section>
</div>

@endsection


@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
        var base_url = "<?php echo URL::to('/') . "/admin/"; ?>";

        $('.user_id').change(function() {
            var user_id = $(this).val();
            window.location.href = base_url + "admin-users/permission/" + user_id;
        });



        $('.parentCheckbox').click(function() {
            var menuId = $(this).attr('id').split('__')[1];
            if ($(this).prop('checked') == true) {
                $(".childCheckbox__" + menuId).prop('checked', true);
            } else {
                $(".childCheckbox__" + menuId).prop('checked', false);
            }
        });

        $('.childCheckAll').click(function() {
            var childCheckAllId = $(this).attr('id');
            if ($(this).prop('checked') == true) {
                $("#add_" + childCheckAllId).prop('checked', true);
                $("#edit_" + childCheckAllId).prop('checked', true);
                $("#del_" + childCheckAllId).prop('checked', true);
            } else {
                $("#add_" + childCheckAllId).prop('checked', false);
                $("#edit_" + childCheckAllId).prop('checked', false);
                $("#del_" + childCheckAllId).prop('checked', false);
                $("#parentCheckbox__" + childCheckAllId.split('__')[1]).prop('checked', false);
            }
        });


        $('.childCheckbox').click(function() {
            var childCheckboxId = $(this).attr('id');
            if ($(this).prop('checked') == true) {} else {
                $("#parentCheckbox__" + childCheckboxId.split('__')[1]).prop('checked', false);
                $("#childCheckbox__" + childCheckboxId.split('__')[1] + "__" + childCheckboxId.split('__')[2]).prop('checked', false);
            }
        });


    });
</script>
@stop