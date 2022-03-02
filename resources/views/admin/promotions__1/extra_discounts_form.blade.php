@extends('admin.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><?= (empty($discountData)) ? 'Create New ' : 'Edit ' ?> discount</h3>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
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

                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="subheader"> </h2>
                            <a class="text-primary" href="{{ route('extra_discounts') }}">
                                <i class="fas fa-chevron-left"></i> Back to discount list
                            </a>
                        </div>

                        <div class="card card-body result-part">
                            <form action="{{route('extraDiscounts_store')}}" method="POST" id="promotionData_form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{@$discountData->id}}">
                                @if(empty($discountData))
                                <div class="card-title mb-3 w-100">Filter Criteria</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Supplier</span>
                                            <select class="form-control" name="supplier_id" id="supplier_id">
                                                <option value="0">All Suppliers</option>
                                                @foreach($supplierList as $supplierRow)
                                                <option value="{{$supplierRow->supplier_id}}">
                                                    {{$supplierRow->supplier_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Blind Type</span>
                                            <select class="form-control select2" id="product_type_id" name="product_type_id">
                                                <option value="0">All Blind Types</option>
                                                @foreach($pTypes as $typeRow)
                                                <option value="{{$typeRow->id}}">{{$typeRow->pname}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Band</span>
                                            <select class="form-control" id="band_id" name="band_ids[]" size="10" multiple>
                                                <option value="0">All Bands</option>
                                                @foreach($bandList as $bandRow)
                                                <option value="{{$bandRow->id}}">{{$bandRow->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Individual Blind</span>
                                            <select class="form-control" id="product_id" name="product_ids[]" size="10" multiple>
                                                <option value="0">All Products</option>
                                                @foreach($productList as $proRow)
                                                <option value="{{$proRow->id}}">{{$proRow->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="button-action justify-content-start">
                                    <p class="otherNb">This price will be assigned to <strong>All Blinds</strong></p>
                                    <button type="submit" class="btn btn-info ml-auto">Save</button>
                                </div> -->
                                <hr />
                                @endif

                                <div class="card-title mb-3  w-100"><?= (empty($discountData)) ? 'Create New ' : 'Edit ' ?> discount</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Percentage Off (%)</span>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="x" value="{{@$discountData->x}}">
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-check mt-2">
                                                        <input type="radio" class="form-check-input" id="exampleCheck1" name="choosediscount" value="PO" {{(@$discountData->choosediscount == 'PO' || (@$discountData->choosediscount == '')) ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="exampleCheck1">Choose Calculation</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Fixed Value (£)</span>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="fixeddiscount" value="{{@$discountData->fixeddiscount}}">
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-check mt-2">
                                                        <input type="radio" class="form-check-input" id="FixedValue" name="choosediscount" value="FV" {{(@$discountData->choosediscount == 'FV') ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="FixedValue">Choose Calculation</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="FreeExpress" name="choosediscount" value="FEDU" {{(@$discountData->choosediscount == 'FEDU') ? 'checked' : ''}}>
                                                <label class="form-check-label" for="FreeExpress">Free Express Delivery
                                                    Upgrades</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Range Start</span>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">£</span>
                                                </div>
                                                <input type="text" class="form-control" name="start" value="{{@$discountData->start}}"><br>
                                                @if($errors->has('start'))
                                                <div class="error">{{ $errors->first('start') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Range End</span>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">£</span>
                                                </div>
                                                <input type="text" class="form-control" name="end" value="{{@$discountData->end}}"><br>
                                                @if($errors->has('end'))
                                                <div class="error">{{ $errors->first('end') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Start Date</span>
                                            <input type="date" class="form-control" name="start_date" value="{{@$discountData->start_date}}">
                                            @if($errors->has('start_date'))
                                            <div class="error">{{ $errors->first('start_date') }}</div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">End Date</span>
                                            <input type="date" class="form-control" name="end_date" value="{{@$discountData->end_date}}">
                                            @if($errors->has('end_date'))
                                            <div class="error">{{ $errors->first('end_date') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 images-wrp">
                                        <div class="card-title mb-3 text-info">Option to Assign Promotion Image to
                                            Swatch</div>
                                        <div class="form-group">
                                            <label class="label-title">Text for Promotion Offer</label>
                                            <input type="text" class="form-control" name="promotiontext" value="{{@$discountData->promotiontext}}" required='' />
                                            @if($errors->has('promotiontext'))
                                            <div class="error">{{ $errors->first('promotiontext') }}</div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-title">Upload Image One <small class="text-danger d-block font-weight-bold">(Size 100px x
                                                            100px)</small></label>
                                                    <div class="custom-upload-file">

                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <label class="file-upload-sec ">
                                                                    <input type="file" name="promotionimgone" id="promotionimgone" hidden>
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <img src="
                                                                <?php

                                                                use App\Utility;

                                                                if (@$discountData['promotionimgone'] == '') {
                                                                    echo Utility::filePathShow($discountImages[0]->content_img, 'manage_content');
                                                                } else {
                                                                    echo Utility::filePathShow($discountData->promotionimgone, 'discounts');
                                                                }
                                                                ?>" id="promotionimgone_pre" alt="" class="img-fluid">
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="ChooseImageOne" name="promoOptionImg" value="1" {{(@$discountData->promoOptionImg == 1 || (@$discountData->promoOptionImg == '')) ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="ChooseImageOne">Choose
                                                                Image One</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-title">Upload Image Two <small class="text-danger d-block font-weight-bold">(Size 100px x
                                                            100px)</small></label>
                                                    <div class="custom-upload-file">

                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <label class="file-upload-sec ">
                                                                    <input type="file" name="promotionimgtwo" id="promotionimgtwo" hidden>
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <img src="<?php
                                                                            if (@$discountData['promotionimgtwo'] == '') {
                                                                                echo Utility::filePathShow($discountImages[1]->content_img, 'manage_content');
                                                                            } else {
                                                                                echo Utility::filePathShow($discountData->promotionimgtwo, 'discounts');
                                                                            }
                                                                            ?>" id="promotionimgtwo_pre" alt="#" class="img-fluid">
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="ChooseImageTwo" name="promoOptionImg" value="2" {{(@$discountData->promoOptionImg == 2) ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="ChooseImageTwo">Choose Image Two</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-title">Upload Image Three <small class="text-danger d-block font-weight-bold">(Size 100px x
                                                            100px)</small></label>
                                                    <div class="custom-upload-file">
                                                        <div class="custom-upload-file">

                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <label class="file-upload-sec ">
                                                                        <input type="file" name="promotionimgthree" id="promotionimgthree" hidden>
                                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <img src="<?php
                                                                                if (@$discountData['promotionimgthree'] == '') {
                                                                                    echo Utility::filePathShow($discountImages[2]->content_img, 'manage_content');
                                                                                } else {
                                                                                    echo Utility::filePathShow($discountData->promotionimgthree, 'discounts');
                                                                                }
                                                                                ?>" id="promotionimgthree_pre" alt="#" class="img-fluid">
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" class="form-check-input" id="ChooseImageThree" name="promoOptionImg" value="3" {{(@$discountData->promoOptionImg == 3) ? 'checked' : ''}}>
                                                                <label class="form-check-label" for="ChooseImageThree">Choose
                                                                    Image Three</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Choose Option</span>
                                                    <div class="mt-2 mb-2 form-control">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="promoOption" id="Options1" value="1" {{(@$discountData->promoOption == 1) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="Options1">Enable </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="promoOption" id="Options2" value="0" {{(@$discountData->promoOption == 0) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="Options2">Disable </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-action justify-content-start">
                                    <a href="#" class="btn btn-default cancel_form">Cancel </a>
                                    <button type="submit" class="btn btn-info ml-auto">Save</button>
                                </div>

                            </form>
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
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";

        $("#supplier_id, #product_type_id, #band_id").change(function() {
            get_matrix($(this).attr('id'));
        });

        function get_matrix(flag) {
            var supplier_id = $("#supplier_id").val();
            var product_type_id = $("#product_type_id").val();
            var band_id = $("#band_id").val();
            var product_id = $("#product_id").val();

            console.log(supplier_id);
            console.log(product_type_id);
            console.log(band_id);
            console.log(product_id);

            $("#product_id").html("<option value='0'>Please wait...</option>");
            $.ajax({
                type: 'GET',
                url: base_url + '/guide_matrix',
                data: {
                    flag: flag,
                    supplier_id: supplier_id,
                    product_type_id: product_type_id,
                    band_id: band_id,
                    product_id: product_id
                },
                dataType: "json",

                success: function(returnData) {
                    console.log(returnData.bandList_html);
                    if (flag != 'band_id') {
                        $("#band_id").html(returnData.bandList_html);
                    }
                    $("#product_id").html(returnData.productList_html);
                }
            });
        }

        imagePreview(promotionimgone, promotionimgone_pre);
        imagePreview(promotionimgtwo, promotionimgtwo_pre);
        imagePreview(promotionimgthree, promotionimgthree_pre);

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