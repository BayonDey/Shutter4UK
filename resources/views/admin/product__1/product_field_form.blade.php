@extends('admin.layouts.app')
@section('content')
<?php

$imgPh = ((@$pField->FieldImage != '') && file_exists(public_path() . "/uploads/v2_product_fields/@$pField->FieldImage")) ? asset("uploads/v2_product_fields/@$pField->FieldImage") : asset('admin/dist/img/noImg.jpg');


?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3>{{(@$pField->id > 0) ? 'Edit':'Create'}} Field</h3>
                        </div>
                        <div class="col-sm-5">
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

            <div class="card card-outline card-info spec-details">

                <div class="card-body">
                    <h3 class="heading">Edit Product Template </h3>
                    <form class="mt-4" action="{{route('storeProductField')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="id" value="{{ @$pField->id }}">

                        <div class="add-more-data">
                            <div class="form-group">
                                <span class="label-title">Field Name </span>

                                <input type="text" class="form-control" name="field_name" value="{{ @$pField->field_name }}" autocomplete="off">
                                @if($errors->has('field_name'))
                                <div class="error">{{ $errors->first('field_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-12 mb-2 row">
                                        <div class="col-md-4">
                                            <span class="label-title">Image</span>
                                            <label class="file-upload-sec">
                                                <input type="file" name="FieldImage" id="FieldImage"  accept="image/*" hidden="">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="uploaded-image">
                                                <img class="upload-img" src="{{$imgPh}}" id="FieldImage_pre">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="label-title">Description </span>

                                <textarea class="form-control" name="FieldDescription">{{ @$pField->FieldDescription }}</textarea>
                            </div>
                            <div class="button-action justify-content-start">
                                <a href="{{route('products_field_list')}}"><button type="button" class="btn btn-default">Cancel</button></a>

                                <button type="submit" class="btn btn-info mr-2">Save</button>
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

        imagePreview(FieldImage, FieldImage_pre);

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