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
                            <h3> {{ (@$proGuide->id > 0) ? 'Edit' : 'Add' }} Appointment Time</h3>
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
                        <div class="individual-box card card-outline card-info">
                            <div class="card-body">
                                <form action="{{route('appointment_time_store')}}" method="POST" id="band_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <!-- <h3 class="heading mb-4">Product Guide Details</h3> -->
                                    <div class="card card-body">
                                        <div class="product-guide-wrap">
                                            <div class="form-group mb-0 product-guide-fame">
                                                <input type="hidden" name="id" value="{{@$appointTime->id}}">
                                                <span class="label-title"> Name*</span>
                                                <input type="text" class="form-control" name="name" value="{{@$appointTime->name}}" />

                                                @if($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                            <div class="button-action mt-4">
                                                <a href="{{route('appointment_time' , ['TR' => @$appointTime->id > 0])}}" class="btn btn-default mr-auto">Cancel
                                                </a>
                                                <button type="submit" class="btn btn-info  ">{{ (@$appointTime->id > 0) ? 'Update' : 'Save' }}</button>
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