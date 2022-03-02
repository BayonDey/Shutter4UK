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
                        <div class="col-sm-6">
                            <h3> {{ (@$proGuide->id > 0) ? 'Edit' : 'Add' }} Product Guide</h3>
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
                        <div class="individual-box card card-outline card-info">
                            <div class="card-body">
                                <form action="{{route('product_guide_store')}}" method="POST" id="band_form"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <h3 class="heading mb-4">Product Guide Details</h3>
                                    <div class="card card-body">
                                        <div class="product-guide-wrap">
                                            <div class="form-group mb-0 product-guide-fame">
                                                <input type="hidden" name="id" value="{{@$proGuide->id}}">
                                                <span class="label-title">Product Guide Name*</span>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{@$proGuide->name}}" />

                                                @if($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                            <div class="button-action mt-4">
                                                <a href="{{route('product_guide' , ['TR' => @$proGuide->id > 0])}}"
                                                    class="btn btn-default mr-auto">Cancel
                                                </a>
                                                <button type="submit" class="btn btn-info  ">{{ (@$proGuide->id > 0)
                                                    ?
                                                    'Update' : 'Save' }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>




                            @if(@$id > 0)
                            @if(count($proGuide->guideLandingValueMap) > 0)
                            <div class="card-bodys">
                                <form action="{{route('productGuideField_image_and_delete')}}" method="POST"
                                    id="image_and_delete_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}


                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="card card-body">
                                                <h3 class="heading mb-4">Guides: {{@$proGuide->name}}</h3>
                                                <input type="hidden" name="guide_id" value="{{@$proGuide->id}}">
                                                <table class='table  '>
                                                    <tr>
                                                        <th width="60%">Guides text</th>
                                                        <th>Image</th>
                                                        <th width="15%">
                                                            <div class="button-action justify-content-start">

                                                                <div class="form-check pl-0">
                                                                    <input type="checkbox" name="" id="select_all">
                                                                    <label class="form-check-label"
                                                                        for="select_all">Select
                                                                        all</label>
                                                                </div>


                                                                <button type="button"
                                                                    style="min-width: inherit;padding: 0 5px;"
                                                                    class="btn btn-danger submit_btn ml-1 "
                                                                    id="delete"><i
                                                                        class="far fa-trash-alt"></i></button>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    @foreach($proGuide->guideLandingValueMap as $value)
                                                    <tr>
                                                        <td>{{ @$value->guideLandingValue->text }}</td>
                                                        <td class='change_image_td'>
                                                            <div class="upload-image-wrap">
                                                                <label class="file-upload-sec new-image-change"
                                                                    style="display: none;">
                                                                    <input type="file" name="imgvalue[{{@$value->id}}]"
                                                                        class="change_image_file "
                                                                        id="fileId__{{@$value->id}}" accept="image/*"
                                                                        style="display: none;"><i
                                                                        class="fas fa-cloud-upload-alt"></i></label>
                                                                <span class='change_image'>Change Image</span>

                                                                <img class='show_image'
                                                                    src="{{ App\Utility::filePathShow(@$value->value, 'guide_landing_values') }}"
                                                                    id="fileIdPre__{{@$value->id}}" width="60px">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="button-action justify-content-start"><input
                                                                    type="checkbox" class='delete_check'
                                                                    name="delete[{{@$value->id}}]" id="delete_check">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="button-action justify-content-center">
                                                                <input type="hidden" name="click_type" id="click_type">
                                                                <a href="{{route('product_guide_edit', $proGuide->id)}}"
                                                                    class="btn btn-default cancel_img_change mr-3">Cancel
                                                                </a>

                                                                <button type="button" class="btn btn-info submit_btn "
                                                                    id="save_img">Save</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>


                            @endif






                            <div class="card-body">
                                <form action="{{route('product_guide_field_store')}}" method="POST" id="band_form"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <h3 class="heading mb-4">Guides Assigned to Group</h3>
                                    <div class="row ">

                                        <div class="col-md-10">
                                            <input type="hidden" name="guide_id" value="{{@$proGuide->id}}">

                                            <div class="form-group">
                                                <span class="label-title">Select Guide for Group</span>
                                                <select name="guide_text_id" class="form-control select2">
                                                    <option value="0">Select group text...</option>
                                                    @if(count($guideText) > 0)
                                                    @foreach($guideText as $guide)
                                                    <option value="{{ $guide->id }}">{{ $guide->text }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="button-action justify-content-end mt-4">

                                                <button type="submit" class="btn btn-info w-100 ">Add Field</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>

                            <hr>

                        </div>

                        @endif



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

        $(".change_image").click(function() {
            $(this).hide();
            $(this).closest('.change_image_td').find('.new-image-change').show();
        });

        $(".change_image_file").each(function(index) {
            var thisId = $(this).attr('id').split('__')[1];
            var fileId = $(this).attr('id');

            var fileIdPre = $(this).closest('.change_image_td').find('.show_image').attr('id');

            imagePreview(eval(fileId), eval(fileIdPre));
        });

        $('#select_all').click(function() {
            if ($(this).prop('checked') == true) {
                $(".delete_check").prop('checked', true);
            } else {
                $(".delete_check").prop('checked', false);
            }
        });

        $('.delete_check').click(function() {
            if ($(this).prop('checked') == false) {
                $("#select_all").prop('checked', false);
            }
        });

        $(".submit_btn").click(function() {
            $("#click_type").val($(this).attr('id'));

            if ($(this).attr('id') == 'delete') {
                if (confirm('Are you sure want to delete?')) {
                    $('#image_and_delete_form').submit();
                }
            } else {
                $('#image_and_delete_form').submit();
            }
        });

        $(".cancel_img_change").click(function() {
            $(".change_image").val('');
        });
    });

    function imagePreview(imgId, imgPreviewId) {
        // console.log("type",typeof imgId + '---' + typeof imgPreviewId);
        // console.log("iddd",imgId + '---' + imgPreviewId);
        imgId.onchange = evt => {
            const [file] = imgId.files
            if (file) {
                imgPreviewId.src = URL.createObjectURL(file)
            }
        }
    }
    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop