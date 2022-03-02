@extends('admin.layouts.app')
@section('content')
<?php

use App\Model\MapSubGroupOption;
use App\Model\Option;

$li_groupDataFl = 0;
?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3> Edit Product Thumbnail </h3>
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
                    {{--main details--}}
                    <div class="spec-details">
                        <div class="individual-box card card-outline card-warning">
                            <div class="card-body">
                                <form action="{{route('productThumbnail_save')}}" method="POST" id="band_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <!-- <h3 class="heading mb-4">Thumbnail Details</h3> -->

                                    <input type="hidden" name="id" value="{{@$pThumbnail->id}}">

                                    <div class="col-md-12 row">

                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Product Type</span>
                                                <input type="text" class="form-control" name="" value="{{@$pType->pname}}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">URL</span>
                                                <input type="text" class="form-control" name="" value="<?php echo URL::to('/') . "/"; ?>{{@$pType->url}}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">ALT Tag</span>
                                                <input type="text" class="form-control" name="ALT_tag" value="{{@$pThumbnail->ALT_tag}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Percentage</span>
                                                <input type="text" class="form-control" name="" value="xxxx" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Thumbnail Description(Desktop)</span>
                                                <textarea name="ALT_tag_desc" class="form-control ckeditor" id="ALT_tag_desc" cols="30" rows="5">{{$pThumbnail->ALT_tag_desc}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Thumbnail Description(Mobile Device)</span>
                                                <textarea name="alt_tag_desc_mobile" class="form-control ckeditor" id="alt_tag_desc_mobile" cols="30" rows="5">{{$pThumbnail->alt_tag_desc_mobile}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Total Character</span>
                                                <input type="text" class="form-control" name="TotalChar" value="{{@$pThumbnail->TotalChar}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <div class="form-group col-md-6">
                                                <span class="label-title">Upload Thumbnail</span>
                                                <small class="mt-0 mb-1 form-text d-flex justify-content-between align-items-center">
                                                    <!-- <label class="form-check-label">Lifestyle Image</label> -->
                                                    <div class="radio-part"> Size (370x370) </div>
                                                </small>
                                                <label class="file-upload-sec">
                                                    <input type="file" name="thumb_image" id="thumb_image" accept="image/*" hidden>
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                </label>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <img src="{{App\Utility::filePathShow($pThumbnail->thumb_image, 'v2_product_homepage')}}" id="thumb_image_pre" alt="" width="100%">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-md-6">
                                        <div class="button-action justify-content-end">
                                            <a href="{{route('product_thumbnail' , ['TR' => @$pThumbnail->id > 0])}}">
                                                <button type="button" class="btn btn-default  ">Cancel</button>
                                            </a>
                                            <button type="submit" class="btn btn-info  ">Update</button>
                                        </div>

                                    </div>


                                </form>

                                <hr>

                            </div>



                        </div>
                    </div>
                </div>
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