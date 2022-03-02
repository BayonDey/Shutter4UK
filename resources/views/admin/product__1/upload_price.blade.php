@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-9">
                    <h3>Upload Prices</h3>
                </div>
                <div class="col-3">
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


                    <div class="card card-outline card-warning p-3 spec-details">


                        <div class="card-body uploading-price-wrap  p-2">
                            <div id="content">
                                <div class="box noborder">
                                    <p class="up-head">Uploading prices is now a 3 step process.</p>

                                    <ul class="uploadGuide">
                                        <li>Firstly you must upload the <em>CSV Price File</em> to the <em>temporary
                                                holding area</em>.</li>

                                        <li>Once in the holding area, you must then <em>assign a Band</em> to the
                                            contained prices.

                                            Prices will remain in the holding area until they have either been assigned,
                                            or are deleted.</li>

                                        <li>Finally, you must assign any unknown price options to an existing Group
                                            Option.</li>

                                    </ul>

                                    <p class="small-guide">
                                        <em>If you don't have any Bands, you can either
                                            <a href="{{route('band_create', 0)}}">create a Band</a> now, or
                                            after you have uploaded the price file.</em>
                                    </p>
                                </div>


                                <div class="card box p-3">
                                    <form name="PriceForm" action="{{route('uploadPrice_store')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <h3 class="title">Step 1: Upload CSV Price File</h3>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="span">Temp Name</div>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="label-title">Browse for file</span>
                                                    <label class="file-upload-sec ">
                                                        <input type="file" name="csv" class="input" hidden>
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" class='btn btn-primary mt-4' value="Save"
                                                    class="modify_btns">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="box">
                                    <h3 class="title">Step 2: Assign Band to Price</h3>

                                    <p class="sub-text"><strong> Note:</strong> assigning a band to a price
                                        completely
                                        removes all old
                                        prices associated
                                        with that band</p>

                                    <div id="PriceHolding">
                                        <!-- // Load price list by ajax -->
                                    </div>
                                </div>



                                <div class="box">
                                    <h3 class="title">Step 3: Assign Price Option to Group Option</h3>

                                    <div id="PriceOptionList">
                                        <!-- // Load price group list by ajax -->

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
    var base_url = "<?php echo URL::to('/') . "/admin"; ?>";
    $(document).ready(function() {
        uploadPriceTempList_ajax();
        uploadPriceAssignOptionList_ajax();


        $('body').on('change', ".selectGrDropdown", function() {
            var thisId = $(this).attr('id');
            var bandId = thisId.split('_')[1];
            var grId = $(this).val();
            B4UK_load_optionselectbox(grId, bandId);
        });

        $('body').on('change', ".selectOptionDropdown", function() {
            var thisId = $(this).attr('id');
            var bandId = thisId.split('__')[1];
            var optionId = $(this).val();
            B4UK_select_optionbox(optionId, bandId);
        });
    });

    function uploadPriceTempList_ajax() {
        $("#PriceHolding").html('Loading data...');
        $.ajax({
            type: 'GET',
            url: base_url + '/uploadPriceTempList_ajax',
            success: function(data) {
                $("#PriceHolding").html(data);
                $('.select2').select2();
            }
        });
    }

    function uploadPriceAssignOptionList_ajax() {
        $("#PriceOptionList").html('Loading data...');
        $.ajax({
            type: 'GET',
            url: base_url + '/uploadPriceAssignOptionList_ajax',
            success: function(data) {
                $("#PriceOptionList").html(data);
                $('.select2').select2();
            }
        });
    }

    function B4UK_assign_temp(id) {
        $.confirm({
            title: 'Assign Band Price',
            content: 'Are you sure you want to assign this band?',
            type: 'blue',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'YES',
                    btnClass: 'btn-blue',
                    action: function() {
                        var band_id = $("#tempBand__" + id).val();
                        if (band_id == '') {
                            $.alert({
                                title: 'Alert!',
                                content: 'Band not selected!',
                            });
                        } else {
                            $.ajax({
                                type: 'GET',
                                url: base_url + '/assign_temp_price/' + id + "/" + band_id,
                                success: function(data) {
                                    uploadPriceTempList_ajax();
                                    uploadPriceAssignOptionList_ajax();
                                }
                            });
                        }
                    }
                },
                close: function() {}
            }
        });
    }

    function B4UK_delete_temp(id) {
        $.confirm({
            title: 'Delete Temp Price',
            content: 'Are you sure you want to delete?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Ok',
                    btnClass: 'btn-red',
                    action: function() {
                        $.ajax({
                            type: 'GET',
                            url: base_url + '/delete_temp_price/' + id,
                            success: function(data) {
                                uploadPriceTempList_ajax();
                            }
                        });
                    }
                },
                close: function() {}
            }
        });
    }

    function B4UK_load_optionselectbox(GrId, BandId) {
        console.log(GrId);
        console.log(BandId);
        $.ajax({
            type: 'GET',
            url: base_url + '/getOptionByGrId_ajax/' + GrId + '/' + BandId,
            success: function(data) {
                $('#selectOptionDiv_' + BandId).html(data);
            }
        });
    }


    function B4UK_select_optionbox(optionId, bandId) {
        $.ajax({
            type: 'GET',
            url: base_url + '/saveOptionbox_ajax/' + optionId + '/' + bandId,
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                console.log(data.success);
                console.log(data.msg);
                if (!data.success) {
                    $.alert({
                        title: 'Error!',
                        content: data.msg,
                    });
                } else {
                    $.alert({
                        title: 'Success',
                        content: data.msg,
                    });
                    uploadPriceAssignOptionList_ajax();
                }

            }
        });
    }


    function B4UK_delete_option(bandId) {
        $.confirm({
            title: 'Delete Price Option',
            content: 'Are you sure you want to delete?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Ok',
                    btnClass: 'btn-red',
                    action: function() {
                        $.ajax({
                            type: 'GET',
                            url: base_url + '/delete_price_option/' + bandId,
                            success: function(data) {
                                data = JSON.parse(data);
                                if (!data.success) {
                                    $.alert({
                                        title: 'Error!',
                                        content: data.msg,
                                    });
                                } else {
                                    $.alert({
                                        title: 'Success',
                                        content: data.msg,
                                    });
                                    uploadPriceAssignOptionList_ajax();
                                }
                            }
                        });
                    }
                },
                close: function() {}
            }
        });
    }
</script>

@stop