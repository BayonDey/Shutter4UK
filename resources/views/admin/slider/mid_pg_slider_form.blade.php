@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Page Slider</h3>
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
                        <form action="{{route('middle_pg_slider_store')}}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$dataRow->id }}">
                            <div class="row">
                                <div class="col-md-12 pg-div type_1 type_3">
                                    <div class="form-group">
                                        <label class="label-title">Slider Title</label>
                                        <input type="text" class="form-control" name="slider_title" value="{{@$dataRow->slider_title}}">
                                        @if($errors->has('slider_title'))
                                        <div class="error">{{ $errors->first('slider_title') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 pg-div type_1 type_3">
                                    <div class="form-group">
                                        <label class="label-title">Slider sub title</label>
                                        <textarea class="form-control  " name="slider_sub_title" rows="2">{{@$dataRow->slider_sub_title}}</textarea>
                                        @if($errors->has('slider_sub_title'))
                                        <div class="error">{{ $errors->first('slider_sub_title') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 pg-div type_1 type_2">
                                    <div class="form-group">
                                        <label class="label-title">Slider Image
                                            <!-- <span class="text-danger"> (Width:300px)</span> -->
                                        </label>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="file-upload-sec">
                                                    <input type="file" name="slider_img" id="img_name" accept="image/*" hidden="">
                                                    <i class="fas fa-cloud-upload-alt fa-3x"></i>
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <img class="img-fluid" id="img_name_pre" src="{{App\Utility::filePathShow(@$dataRow->slider_img, 'page_slider')}}">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">Image Position</span>
                                        <div class="mt-2 mb-2 form-control">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input img_position" type="radio" name="img_position" id="img_position_1" value="left" checked>
                                                <label class="form-check-label" for="img_position_1">Left </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input img_position" type="radio" name="img_position" id="img_position_2" value="right" {{(@$dataRow->img_position == 'right') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="img_position_2">Right </label>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6 pg-div type_1  ">
                                    <div class="form-group">
                                        <label class="label-title">Html Button Text</label>
                                        <input type="text" class="form-control" name="slider_btn" value="{{@$dataRow->slider_btn}}">

                                    </div>
                                </div>
                                <div class="col-md-6  pg-div type_1  ">
                                    <div class="form-group">
                                        <label class="label-title">  Button url</label>
                                        <input type="text" class="form-control" name="slider_url" value="{{@$dataRow->slider_url}}">
                                    </div>
                                </div>

                                <div class="col-md-6  pg-div   type_3">
                                    <div class="form-group">
                                        <label class="label-title">Html Button Colour</label>
                                        <input type="color" class="form-control" name="text_color" value="{{@$dataRow->text_color}}">

                                    </div>
                                </div>
                                <div class="col-md-6  pg-div   type_3">
                                    <div class="form-group">
                                        <label class="label-title">Background Colour</label>
                                        <input type="color" class="form-control" name="text_bg_color" value="{{@$dataRow->text_bg_color}}">
                                    </div>
                                </div>  
                                <div class="col-md-12">
                                    <div class="button-action">
                                        <a href="{{route('pg_slider_list', ['position'=>'middle'])}}">
                                            <button type="button" class="btn btn-default mr-auto">Go back</button>
                                        </a>
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

</div>



@endsection



@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
 

        imagePreview(img_name, img_name_pre);

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