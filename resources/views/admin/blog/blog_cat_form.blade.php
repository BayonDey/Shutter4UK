@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Blog Categories</h3>
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
            <div class="spec-details">
                <div class="card card-outline card-info p-3">

                    <h3 class="heading mb-3">Category Details</h3>
                    <form action="{{route('blogCat_store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{@$blogCat->template_id}}">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label-title">Category Name</label>
                                    <input type="text" name="cat_name" class="form-control" value="{{@$blogCat->cat_name}}">
                                    @if($errors->has('cat_name'))
                                    <div class="error">{{ $errors->first('cat_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label-title">Title</label>
                                    <input class="form-control" name="title" type="text" value="{{@$blogCat->title}}">
                                    @if($errors->has('title'))
                                    <div class="error">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label-title">URL</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"><?= env('APP_URL') . "blog/category" ?></span>
                                        </div>
                                        <input type="text" class="form-control" name="url" value="{{@$blogCat->url}}" id="basic-url" aria-describedby="basic-addon3">
                                        <br>
                                        @if($errors->has('url'))
                                        <div class="error">{{ $errors->first('url') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-title">Description</label>
                                    <textarea class="form-control ckeditor" name="description">{{@$blogCat->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-title">Upload Image <span class="text-danger">
                                            (Max-Width:820px)</span></label>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="file-upload-sec">
                                            <input type="file" name="img_name" id="pimage" accept="image/*" hidden="">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <img class="img-fluid" id="pimage_pre" src="{{App\Utility::filePathShow(@$blogCat->img_name, 'blog_category_tbl')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="button-action">
                                    <a href="{{route('blog_cat_list')}}"><button type="button" class="btn btn-default mr-auto">Go back</button></a>
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {

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
</script>
@stop