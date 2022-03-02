@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Thumb Sale Image</h3>
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

                    <h3 class="heading mb-3">Update Thumb Sale Image</h3>

                    <form action="{{route('thumb_sale_img_update')}}" method="POST" id="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label-title">Title</label>
                                    <textarea class="form-control" name="HP_ThumbSaleImgTitle">{{$thumb_sale_img['HP_ThumbSaleImgTitle']->value}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label-title">Popup Image </label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="file-upload-sec">
                                                <input type="file" name="HP_ThumbSaleImg" id="thumb_image" accept="image/*" hidden>
                                                <i class="fas fa-cloud-upload-alt"></i>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <img src="{{App\Utility::filePathShow($thumb_sale_img['HP_ThumbSaleImg']->value, 'variables')}}" id="thumb_image_pre" alt="#" class="img-fluid">
                                        </div>
                                        <div class="col-md-1">
                                            <!-- <i class="fas fa-trash-alt text-danger cursor-pointer"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label-title">Sale Alt Text</label>
                                    <input class="form-control" type="text" name="HP_ThumbSaleAlt" value="{{$thumb_sale_img['HP_ThumbSaleAlt']->value}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label-title">Choose Option</label>
                                    <div class="form-control">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="Enable" value="1" name="HP_ThumbSaleoption" {{ (@$thumb_sale_img['HP_ThumbSaleoption']->value == 1) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Enable">Enable</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="Disable" value="0" name="HP_ThumbSaleoption" {{ (@$thumb_sale_img['HP_ThumbSaleoption']->value == 0) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Disable">Disable</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="button-action">
                                    <a href="{{route('manage_home_page')}}"><button type="button" class="btn btn-default mr-auto">Go back</button></a>
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

@endsection

@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {

        imagePreview(thumb_image, thumb_image_pre);

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