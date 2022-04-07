@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Department Slider</h3>
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
                        <form action="{{route('pg_slider_store')}}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$dataRow->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">Page Slider Type</span>
                                        <div class="mt-2 mb-2 form-control">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input slider_type" type="radio" name="slider_type" id="slider_type_1" value="img_text" checked>
                                                <label class="form-check-label" for="slider_type_1">Image and Text </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input slider_type" type="radio" name="slider_type" id="slider_type_2" value="img" {{(@$dataRow->slider_type == 'img') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="slider_type_2">Only Image </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input slider_type" type="radio" name="slider_type" id="slider_type_3" value="text" {{(@$dataRow->slider_type == 'text') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="slider_type_3">Only Text </label>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <span class="label-title">Select Department</span>
                                        <select name="department_id" class="form-control select2" required>
                                            <option value="">Please Select...</option>
                                            @foreach($depList as $row)
                                            <option value="{{$row->id}}" {{($row->id == @$dataRow->department_id) ? 'selected' : ''}}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('department_id'))
                                        <div class="error">{{ $errors->first('department_id') }}</div>
                                        @endif
                                    </div>
                                </div>
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

                                <div class="col-md-12 pg-div type_1 type_2">
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

                                <div class="col-md-6 pg-div type_1  ">
                                    <div class="form-group">
                                        <label class="label-title">Slider Button</label>
                                        <input type="text" class="form-control" name="slider_btn" value="{{@$dataRow->slider_btn}}">

                                    </div>
                                </div>
                                <div class="col-md-6  pg-div type_1  ">
                                    <div class="form-group">
                                        <label class="label-title">Slider url</label>
                                        <input type="text" class="form-control" name="slider_url" value="{{@$dataRow->slider_url}}">
                                    </div>
                                </div>

                                <div class="col-md-6  pg-div   type_3">
                                    <div class="form-group">
                                        <label class="label-title">Text color</label>
                                        <input type="color" class="form-control" name="text_color" value="{{@$dataRow->text_color}}">

                                    </div>
                                </div>
                                <div class="col-md-6  pg-div   type_3">
                                    <div class="form-group">
                                        <label class="label-title">Text background color</label>
                                        <input type="color" class="form-control" name="text_bg_color" value="{{@$dataRow->text_bg_color}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-title">Start date</label>
                                        <input type="date" class="form-control" name="start_date" value="{{@$dataRow->start_date}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-title">End date</label>
                                        <input type="date" class="form-control" name="end_date" value="{{@$dataRow->end_date}}">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="button-action">
                                        <a href="{{route('pg_slider_list')}}">
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

        $(".pg-div").hide();
        <?php
        if (@$dataRow->slider_type == 'text') {
        ?>
            $(".type_3").show();
        <?php
        } elseif (@$dataRow->slider_type == 'img') {
        ?>
            $(".type_2").show();
        <?php
        } else {
        ?>
            $(".type_1").show();
        <?php
        }
        ?>
        $(".slider_type").click(function() {
            var slider_type = $(this).attr('id').split('_')[2];
            $(".pg-div").hide();
            $(".type_" + slider_type).show();
        });

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