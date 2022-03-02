@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Content</h3>
                        </div>
                        <div class="col-sm-4">
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
                <div class="col-md-12">

                    <div class="card card-outline card-warning p-3">
                        <form action="{{route('manage_content_settings_save')}}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$manageContent->id}}">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="label-title">Content type</label>
                                        <input type="text" class="form-control" value="{{@$manageContent->content_type}}" readonly=''>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="label-title">Content key</label>
                                        <input class="form-control" type="text" value="{{@$manageContent->content_key}}" readonly=''>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-title">Content title</label>
                                        <input class="form-control" type="text" name="content_title" value="{{@$manageContent->content_title}}">
                                        @if($errors->has('content_title'))
                                        <div class="error">{{ $errors->first('content_title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-title">URL</label>
                                        <div class="input-group mb-3">
                                            <!-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"><?= env('APP_URL')  ?></span>
                                            </div> -->
                                            <input type="text" class="form-control" name="content_url" value="{{@$manageContent->content_url}}" id="basic-url" aria-describedby="basic-addon3">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-title">Content sub title</label>
                                        <textarea class="form-control" name="content_sub_title">{{@$manageContent->content_sub_title}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-title">Content description</label>
                                        <textarea class="form-control ckeditor" name="content_desc">{{@$manageContent->content_desc}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-title">Content image
                                            <!-- <span class="text-danger"> (Max-Width:820px)</span> -->
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="file-upload-sec">
                                                <input type="file" name="content_img" id="pimage" accept="image/*" hidden="">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <img class="img-fluid" id="pimage_pre" src="{{App\Utility::filePathShow(@$manageContent->content_img, 'manage_content')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-title">Content image alt</label>
                                        <input class="form-control" name="content_img_alt" value="{{@$manageContent->content_img_alt}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="button-action">
                                        <a href="{{route('manage_content_settings')}}">
                                            <button type="button" class="btn btn-default mr-auto">Go back</button>
                                        </a>
                                        <button type="submit" class="btn btn-info">Update</button>
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
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";

        imagePreview(pimage, pimage_pre);

        function imagePreview(imgId, imgPreviewId) {
            imgId.onchange = evt => {
                const [file] = imgId.files
                if (file) {
                    imgPreviewId.src = URL.createObjectURL(file)
                }
            }
        }
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop