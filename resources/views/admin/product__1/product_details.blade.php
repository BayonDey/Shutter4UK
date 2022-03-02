@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <?php
    $noImg = asset('admin/dist/img/noImg.jpg');

    $lifestyleimg_name_ph = (file_exists(public_path() . "/uploads/v2_products/$product->lifestyleimg_name") && ($product->lifestyleimg_name != '')) ? asset('uploads/v2_products/' . $product->lifestyleimg_name) : $noImg;
    $lifestleimg_scnd_ph = (file_exists(public_path() . "/uploads/v2_products/$product->lifestleimg_scnd") && ($product->lifestleimg_scnd != '')) ? asset('uploads/v2_products/' . $product->lifestleimg_scnd) : $noImg;
    $colleclifestyle_name_ph = (file_exists(public_path() . "/uploads/v2_products/$product->colleclifestyle_name") && ($product->colleclifestyle_name != '')) ? asset('uploads/v2_products/' . $product->colleclifestyle_name) : $noImg;
    $favorite_img_name_ph = (file_exists(public_path() . "/uploads/v2_products/$product->favorite_img_name") && ($product->favorite_img_name != '')) ? asset('uploads/v2_products/' . $product->favorite_img_name) : $noImg;
    $image_name_ph = (file_exists(public_path() . "/uploads/v2_products/$product->image_name") && ($product->image_name != '')) ? asset('uploads/v2_products/' . $product->image_name) : $noImg;

    $first_swatch_image_ph = (file_exists(public_path() . "/uploads/v2_products/$product->first_swatch_image") && ($product->first_swatch_image != '')) ? asset('uploads/v2_products/' . $product->first_swatch_image) : $noImg;
    $first_swatch_UploadPDF_ph = (file_exists(public_path() . "/uploads/v2_products/$product->first_swatch_UploadPDF") && ($product->first_swatch_UploadPDF != '')) ? asset('uploads/v2_products/' . $product->first_swatch_UploadPDF) : $noImg;
    $second_swatch_image_ph = (file_exists(public_path() . "/uploads/v2_products/$product->second_swatch_image") && ($product->second_swatch_image != '')) ? asset('uploads/v2_products/' . $product->second_swatch_image) : $noImg;
    $second_swatch_UploadPDF_ph = (file_exists(public_path() . "/uploads/v2_products/$product->second_swatch_UploadPDF") && ($product->second_swatch_UploadPDF != '')) ? asset('uploads/v2_products/' . $product->second_swatch_UploadPDF) : $noImg;
    $third_swatch_image_ph = (file_exists(public_path() . "/uploads/v2_products/$product->third_swatch_image") && ($product->third_swatch_image != '')) ? asset('uploads/v2_products/' . $product->third_swatch_image) : $noImg;
    $third_swatch_UploadPDF_ph = (file_exists(public_path() . "/uploads/v2_products/$product->third_swatch_UploadPDF") && ($product->third_swatch_UploadPDF != '')) ? asset('uploads/v2_products/' . $product->third_swatch_UploadPDF) : $noImg;

    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3>Product details</h3>
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


    <div class="content product-details">
        <div class="container-fluid">
            <a href="{{ route('product', ['type'=> $product->product_type_id, 'category' => $product->parent_id]) }}" class="btn btn-primary mb-2">
                << Back to list </a>
                    <!-- <div class="container-fluid pt-3 pb-3"> -->
                    <div class="card card-outline card-warning p-3">

                        <div class="row">
                            <div class="col-md-5">
                                <table class="table">
                                    <tr>
                                        <th>Main Image</th>
                                        <td><img src="{{$image_name_ph}}" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <th>Swatch Page Image</th>
                                        <td><img src="{{$lifestyleimg_name_ph}}" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <th>Swatch Page2 Image</th>
                                        <td><img src="{{$lifestleimg_scnd_ph}}" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <th>Collection Page Image</th>
                                        <td><img src="{{$colleclifestyle_name_ph}}" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <th>Filter Page Image</th>
                                        <td><img src="{{$favorite_img_name_ph}}" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <th>Swatch Image 1</th>
                                        <td><img src="{{$first_swatch_image_ph}}" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <th>Upload Image PDF</th>
                                        <td><img src="{{$first_swatch_UploadPDF_ph}}" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <th>Swatch Image 2</th>
                                        <td><img src="{{$second_swatch_image_ph}}" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <th>Upload Image PDF</th>
                                        <td><img src="{{$second_swatch_UploadPDF_ph}}" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <th>Swatch Image 3</th>
                                        <td><img src="{{$third_swatch_image_ph}}" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <th>Upload Image PDF</th>
                                        <td><img src="{{$third_swatch_UploadPDF_ph}}" class="img-fluid"></td>
                                    </tr>
                                </table>
                                <!-- <div class="image-wrapper ">

                            </div> -->
                            </div>
                            <div class="col-md-7">
                                <div class="desc-wrap">
                                    <p class="price"> {{ $product->name }} </p>

                                    <!-- <h2 class="product-name">{{ $product->name }}</h2> -->
                                    <!-- <p class="short-desc">  </p>  -->

                                    <!-- <p class="price"> £8.28 </p> -->


                                    <div class="row">
                                        <div class="col-md-12">

                                            <p class="inside-data">
                                                <span>Product Type: </span>{{ @$product->getType->pname }}
                                            </p>
                                            <p class="inside-data">
                                                <span>Supplier Name: </span>{{ @$product->getSupplier->supplier_name }}
                                            </p>
                                            <p class="inside-data"><span>Band Name: </span>{{ @$product->band->name }}</p>
                                            <p class="inside-data">
                                                <span>Parent Category: </span>{{ @$product->getCategory->name }}
                                            </p>

                                            <p class="inside-data">
                                                <span>Supplied name : </span>{{ $product->supplied_name }}
                                            </p>
                                            <p class="inside-data">
                                                <span>Promote to front : </span>{{ ($product->promote_to_front == 't') ? "Yes" : "No" }}
                                            </p>
                                            <p class="inside-data">
                                                <span>Display in Search Results : </span>{{ ($product->searchrslt == 'Y') ? "Yes" : "No" }}
                                            </p>

                                            <!-- <p class="inside-data">
                                        <span>Sale start : </span>
                                        {{ date('d-m-Y', strtotime($product->sale_start)) }}&nbsp;&nbsp;
                                        <span>Sale end : </span>
                                        {{ date('d-m-Y', strtotime($product->sale_end)) }}
                                            </p> -->
                                        </div>

                                    </div>

                                    <p class="inside-data">
                                        <span>Schema Description (for social media): </span>{{ $product->schema_desc }}
                                    </p>
                                    <div class="spec-details">

                                        <div class="row">
                                            <div class="col-12">
                                                <p class="sub-head">Description</p>
                                                <p class="inside-data">
                                                    <span>{!! $product->description !!}</span>
                                                </p>
                                            </div>
                                        </div>


                                        <h3 class="heading">Out of Stock Section </h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="inside-data">
                                                    <span> Out of Stock: </span>
                                                    {{ ucfirst($product->out_stock) }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="inside-data">
                                                    <span>Due Date: </span>
                                                    {{ App\Utility::showDate($product->due_date) }}
                                                </p>
                                            </div>
                                        </div>


                                        <h3 class="heading">Size Restrictions </h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="inside-data">
                                                    <span> Max Width: </span>
                                                    {{ $product->max_width }}CM
                                                </p>
                                                <p class="inside-data">
                                                    <span>Max Width Turned: </span>
                                                    {{ $product->max_width_turned }}CM
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="inside-data">
                                                    <span>Max Drop: </span>
                                                    {{ $product->max_drop }}CM
                                                </p>
                                                <p class="inside-data">
                                                    <span>Max Drop Turned: </span>
                                                    {{ $product->max_drop_turned }}CM
                                                </p>
                                            </div>
                                        </div>


                                        <h3 class="heading">Extra Promotional Discount Code </h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="inside-data">
                                                    <span> Discount Code: </span>
                                                    {{ $product->code }}
                                                </p>
                                                <p class="inside-data">
                                                    <span>Percentage Off (%): </span>
                                                    {{ $product->x }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="inside-data">
                                                    <span>Start Date: </span>
                                                    {{ App\Utility::showDate($product->start_date) }}
                                                </p>
                                                <p class="inside-data">
                                                    <span>End Date: </span>
                                                    {{ App\Utility::showDate($product->end_date) }}
                                                </p>
                                            </div>
                                        </div>


                                        <h3 class="heading">Price and Delivery Details </h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="inside-data">
                                                    <span> Trade Discount (%): </span>
                                                    {{ $product->trade_percentage }}
                                                </p>
                                                <p class="inside-data">
                                                    <span>Sale Discount (%): </span>
                                                    {{ $product->sales_percentage }}
                                                </p>
                                                <p class="inside-data">
                                                    <span>Start Date: </span>
                                                    {{ App\Utility::showDate($product->sale_start) }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="inside-data">
                                                    <span>Retail Markup (%): </span>
                                                    {{ $product->profit_margin }}
                                                </p>
                                                <p class="inside-data">
                                                    <span>Lead Time (Days): </span>
                                                    {{ $product->lead_time_days }}
                                                </p>
                                                <p class="inside-data">
                                                    <span>End Date: </span>
                                                    {{ App\Utility::showDate($product->sale_end) }}
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="inside-data">
                                                    <span>Allow Samples: </span>
                                                    {{ ($product->allow_samples == 'y') ? 'Yes, Samples available' : 'No, samples not available' }}
                                                </p>
                                            </div>
                                        </div>


                                        <h3 class="heading">Template Fields </h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="inside-data">
                                                    <span> Template Name: </span>
                                                    {{ $product->getTemplate->name }}
                                                </p>
                                            </div>


                                            @if(isset($templateFields) && (count($templateFields) > 0))
                                            <div class="row col-md-12">
                                                @foreach($templateFields as $row)
                                                @if(isset($row->fieldName->field_name))

                                                <div class="col-md-6">
                                                    <p class="inside-data">
                                                        <span> {{ @$row->fieldName->field_name }}: </span>
                                                        {{(isset($pTempVal[$row->fieldName->id])) ? $pTempVal[$row->fieldName->id] : '--'}}
                                                    </p>
                                                </div>
                                                @endif

                                                @endforeach
                                            </div>
                                            @endif

                                        </div>


                                        <h3 class="heading">Assign Template Fields </h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="inside-data">
                                                    <span> Product Template: </span>
                                                    {{ @$product->getAssignedTemplate->name }}
                                                </p>
                                            </div>

                                            @if(isset($templateLandingFields) && (count($templateLandingFields) > 0))
                                            <div class="row col-md-12">
                                                @foreach($templateLandingFields as $row)
                                                @if(isset($row->fieldName->field_name))

                                                <div class="col-md-12">
                                                    <p class="inside-data">
                                                        <span> {{ @$row->fieldName->field_name }}
                                                            : </span> {{@$row->value}}
                                                    </p>
                                                </div>
                                                @endif

                                                @endforeach
                                            </div>
                                            @endif

                                        </div>


                                        <h3 class="heading">Product features </h3>
                                        <div class='row col-md-12'>

                                            @if(count($selected_filter_map) > 0)
                                            @foreach($selected_filter_map as $filter)
                                            <p class='col-md-6'>
                                                <img src="{{asset('uploads/v3_product_filters/' . @$filter->productFilter->image)}}" class="image-plate" width="30px" />
                                                {{@$filter->productFilter->name}}
                                            </p>
                                            @endforeach
                                            @else
                                            <p>No feature selected</p>
                                            @endif
                                        </div>

                                    </div>
                                    <!-- <div class="spec-details">
                                <h3 class="heading">Product Information </h3>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="inside-data"><span>Product Brand:</span>xx</p>
                                        <p class="inside-data"><span>Barrel (Roller Tube):</span> xxx</p>
                                        <p class="inside-data"><span>Brackets Supplied:</span> xxx</p>
                                        <p class="inside-data"><span>Cloth Size:</span> xxx</p>
                                        <p class="inside-data"><span>Control Lengths:</span> xxx</p>
                                        <p class="inside-data"><span>Control Option:</span> xxx</p>
                                        <p class="inside-data"><span>Operating Tolerance:</span> xxx</p>
                                        <p class="inside-data"><span>Product Guarantee:</span> xxx</p>
                                        <p class="inside-data"><span>Recess Deduction:</span> xxx</p>
                                        <p class="inside-data"><span>Standard Finish:</span> xxx</p>
                                        <p class="inside-data"><span>Technical Info:</span>
                                            {{ $product->technical_info}}
                                    </p>

                                </div>

                            </div>

                        </div> -->
                                    <div class="spec-details">
                                        <h3 class="heading">Product Guides: {{@$product->guideHead->name}}</h3>

                                        <div class="list-part">
                                            <ul class="list-menu flex-column nav">
                                                @if(count($product_guide) == 0)
                                                <li class="list-item">
                                                    <a href="#" class="nav-link">No guide selected </a>
                                                </li>
                                                @endif
                                                @foreach($product_guide as $guide)
                                                @php
                                                $guideText = $guide->guideText;
                                                @endphp
                                                <li class="list-item">
                                                    <a href="{{ URL::to('/').'/..'.(($guideText->link != '') ?  $guideText->link : '/static/images/products/guide_temp/'.$guideText->PDF_Upload) }}" class="nav-link" target="_blank">
                                                        <i class="far fa-check-circle text-success"></i>
                                                        {{ $guideText->text }}
                                                    </a>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>

                                    </div>
                                    <!-- <div class="spec-details">
                                    <h3 class="heading">How to Measure Videos</h3>

                                    <div class="list-part">
                                        <ul class="list-menu flex-column nav">

                                            <li class="list-item">
                                                <a href="#" class="nav-link">
                                                    <i class="far fa-check-circle"></i>
                                                    lorem text
                                                </a>
                                            </li>
                                            <li class="list-item">
                                                <a href="#" class="nav-link">
                                                    <i class="far fa-check-circle"></i>
                                                    lorem text
                                                </a>
                                            </li>
                                            <li class="list-item">
                                                <a href="#" class="nav-link">
                                                    <i class="far fa-check-circle"></i>
                                                    lorem text
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card card-outline card-default spec-details">

                        <div class="card-body">
                            <h3 class="heading mb-4">Band/Price Filters</h3>

                            @if(count($search_filter) > 0)
                            <div class="row">
                                @foreach($search_filter as $filter)
                                <div class="col-md-4 ">
                                    <div class="p-2 card">
                                        <p class="">
                                            @if($filter->width > 0)
                                            <strong>Width:</strong>
                                            <em>{{ ($filter->lt_gt == 'lt') ? 'Less than' : 'Greater than' }}</em>
                                            &nbsp; {{ $filter->width }}<br>
                                            @endif

                                            @if($filter->height > 0)
                                            <strong>Height:</strong>
                                            <em>{{ ($filter->lt_gt == 'lt') ? 'Less than' : 'Greater than' }}</em>
                                            &nbsp;{{ $filter->height }}<br>
                                            @endif

                                            @if(($filter->group_id > 0) || ($filter->option_id > 0))
                                            <strong>Group/Option:</strong> {{ @$filter->getGroup->group_title }}
                                            &gt; {{ @$filter->getOption->option_name }}
                                            @endif


                                        </p>

                                        
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            @endif

                        </div>
                    </div>
        </div>


        @endsection