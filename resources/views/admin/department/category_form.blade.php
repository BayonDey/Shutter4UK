@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> {{(@$dataRow->id > 0) ? 'Edit Category' : 'Add Category'}}</h3>
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

                <div class="col-md-12">
                    {{--main details--}}
                    <div class="spec-details">
                        <form action="{{route('category_store')}}" method="POST" id="category_store" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$dataRow->id}}">
                            <div class="individual-box card card-outline card-info">
                                <div class="card-body">
                                    <h3 class="heading mb-4">Category Details</h3>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title">Category Name*</span>
                                                    <input type="text" name="category_name" class="form-control" placeholder="Enter name" value="{{@$dataRow->category_name}}" />

                                                    @if($errors->has('category_name'))
                                                    <div class="error">{{ $errors->first('category_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title">URL*</span>
                                                    <input type="text" class="form-control" placeholder="Enter url" value="<?= @$dataRow->category_url ?>" name="category_url" />

                                                    @if($errors->has('category_url'))
                                                    <div class="error">{{ $errors->first('category_url') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title">Promote front</span>
                                                    <select name="promote_front" class="form-control  " id="">
                                                        <option value="Y" {{(@$dataRow->promote_front == 'Y') ? 'selected' : ''}}>Yes</option>
                                                        <option value="N" {{(@$dataRow->promote_front == 'N') ? 'selected' : ''}}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <span class="label-title">Category description</span>

                                                    <textarea name="category_description" class="form-control ckeditor " id="" cols="30" rows="3">{{@$dataRow->category_description}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6 pg-div type_1 type_2">
                                                <div class="form-group">
                                                    <label class="label-title">Category Logo
                                                        <!-- <span class="text-danger"> (Width:300px)</span> -->
                                                    </label>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="file-upload-sec">
                                                                <input type="file" name="category_logo" id="category_logo" accept="image/*" hidden="">
                                                                <i class="fas fa-cloud-upload-alt fa-3x"></i>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <img class="img-fluid" id="category_logo_pre" src="{{App\Utility::filePathShow(@$dataRow->category_logo, 'department_category')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pg-div type_1 type_2">
                                                <div class="form-group">
                                                    <label class="label-title">Category Image
                                                        <!-- <span class="text-danger"> (Width:300px)</span> -->
                                                    </label>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="file-upload-sec">
                                                                <input type="file" name="category_image" id="category_image" accept="image/*" hidden="">
                                                                <i class="fas fa-cloud-upload-alt fa-3x"></i>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <img class="img-fluid" id="category_image_pre" src="{{App\Utility::filePathShow(@$dataRow->category_image, 'department_category')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Meta title</span>

                                                    <textarea name="meta_title" class="form-control  " id="" cols="30" rows="3">{{@$dataRow->meta_title}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Meta description</span>

                                                    <textarea name="meta_description" class="form-control  " id="" cols="30" rows="3">{{@$dataRow->meta_description}}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <hr>
                                    <div class="button-action justify-content-end">
                                        <a href="{{route('category_list' )}}">
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
 

        imagePreview(category_logo, category_logo_pre);
        imagePreview(category_image, category_image_pre);

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