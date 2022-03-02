@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> {{(@$user->id > 0) ? 'Edit user' : 'Add user'}}</h3>
                        </div>
                        <div class="col-sm-6">
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <?php
                $imgPh = ((@$user->image != '') && file_exists(public_path() . "/uploads/users/$user->image")) ? asset("uploads/users/$user->image") : asset('admin/dist/img/noUser.png');
                ?>
                <div class="col-md-12">
                    {{--main details--}}
                    <div class="spec-details">
                        <form action="{{route('storeAdminUser')}}" method="POST" id="user_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$user->id}}">
                            <div class="individual-box card card-outline card-info">
                                <div class="card-body">
                                    <h3 class="heading mb-4">User Details</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="user-images">
                                                {{--<img src="https://static.remove.bg/remove-bg-web/a76316286d09b12be1ebda3b400e3f44716c24d0/assets/start-1abfb4fe2980eabfbbaaa4365a0692539f7cd2725f324f904565a9a744f8e214.jpg"--}}
                                                {{--class="rounded img-fluid"/>--}}
                                                <img src="{{ $imgPh}}" id="userImg_pre" class="rounded img-fluid" width="100%" />

                                                <label class="myFile">
                                                    <i class="fas fa-upload"></i>
                                                    <input type="file" hidden id="userImg" name="image" />
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Name</span>
                                                        <input type="text" name="b_firstname" class="form-control" placeholder="Enter user name" value="{{@$user->b_firstname}}" />

                                                        @if($errors->has('b_firstname'))
                                                        <div class="error">{{ $errors->first('b_firstname') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Email</span>
                                                        <input type="text" class="form-control" placeholder="Enter user email" value="<?= @$user->email ?>" name="email" />

                                                        @if($errors->has('email'))
                                                        <div class="error">{{ $errors->first('email') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Change Password</span>
                                                        <input type="password" class="form-control password" placeholder="Enter password" name="password" />

                                                        @if($errors->has('password'))
                                                        <div class="error">{{ $errors->first('password') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Confirm Password</span>
                                                        <input type="password" class="form-control confirmed" placeholder="Confirm Password" name="password_confirmation" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Initial ID</span>
                                                        <input type="text" class="form-control" placeholder="Enter user Initial ID" value="<?= @$user->initials ?>" name="initials" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Group</span>
                                                        <select name="access_group" class="form-control select2">
                                                            <option value="Master" {{(@$user->access_group == 'Master') ? 'selected' : ''}}>
                                                                Master
                                                            </option>
                                                            <option value="Orders" {{(@$user->access_group == 'Orders') ? 'selected' : ''}}>
                                                                Orders
                                                            </option>
                                                            <option value="Product" {{(@$user->access_group == 'Product') ? 'selected' : ''}}>
                                                                Product
                                                            </option>
                                                            <option value="Content" {{(@$user->access_group == 'Content') ? 'selected' : ''}}>
                                                                Content
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-action justify-content-end">
                                        <a href="{{route('admin_users' )}}">
                                            <button type="button" class="btn btn-default mr-2">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-info  ">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection



@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {

        imagePreview(userImg, userImg_pre);

        function imagePreview(imgId, imgPreviewId) {
            imgId.onchange = evt => {
                const [file] = imgId.files
                if (file) {
                    imgPreviewId.src = URL.createObjectURL(file)
                }
            }
        }
    });
</script>
@stop