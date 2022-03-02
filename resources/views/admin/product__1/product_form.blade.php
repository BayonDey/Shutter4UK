@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <?php
    $noImg = asset('admin/dist/img/noImg.jpg');
    if (empty($product)) {
        $id = 0;
        $heading = 'Product Create';
        $product_type_id = $typeId;
        $supplier_id = $band_id = 0;
        $parent_id = $catId;
        $name = $supplied_name = '';
        $promote_to_front = 't';
        $searchrslt = 'Y';
        $louvres_only_available = 0;
        $description = '';
        $schema_desc = '';
        $TagCloudKeyworkOrPhase = $TagCloudMeasurement = $tag_cloud = $TagCloudAreaOrPostCodes = '';

        $lifestyleimg_name = $lifestleimg_scnd = $colleclifestyle_name = '';
        $promotetohome = 'N';
        $scroll_filter_link = '';
        $favorite_img_name = '';
        $scroll_manual_link = '';
        $scroll_image_alt = '';
        $swatchhomedesc = '';
        $image_name = '';
        $show_main_img = 'N';
        $m_image_sm = 0;
        $textforpdf = '';
        $first_swatch_image = $first_swatch_UploadPDF = $second_swatch_image = $second_swatch_UploadPDF = '';
        $thumbnail1_description = $thumbnail2_description = '';
        $third_swatch_image = $third_swatch_UploadPDF = $thumbnail3_description = '';
        $out_stock = 0;
        $due_date = date('Y-m-d');
        $max_width = $max_drop = $max_width_turned = $max_drop_turned = 0;
        $code = '';
        $x = 0;
        $start_date = $end_date = $sale_start = $sale_end = date('Y-m-d');
        $trade_percentage = $profit_margin = $sales_percentage = $lead_time_days = 0;

        $allow_samples = 'y';
        $assign_template_id = $template_id = 1;
        $guide_id = 0;

        $meta_title = $meta_desc = $product_keyword = '';
    } else {
        $heading = 'Product Edit';

        $id = $product->id;
        $product_type_id = $product->product_type_id;
        $supplier_id = $product->supplier_id;
        $band_id = $product->band_id;
        $parent_id = $product->parent_id;
        $name = $product->name;
        $supplied_name = $product->supplied_name;
        $promote_to_front = $product->promote_to_front;
        $searchrslt = $product->searchrslt;
        $louvres_only_available = $product->louvres_only_available;
        $description = $product->description;
        $schema_desc = $product->schema_desc;
        $TagCloudKeyworkOrPhase = $product->TagCloudKeyworkOrPhase;
        $TagCloudMeasurement = $product->TagCloudMeasurement;
        $tag_cloud = $product->tag_cloud;
        $TagCloudAreaOrPostCodes = $product->TagCloudAreaOrPostCodes;

        $lifestyleimg_name = $product->lifestyleimg_name;
        $lifestleimg_scnd = $product->lifestleimg_scnd;
        $colleclifestyle_name = $product->colleclifestyle_name;
        $promotetohome = $product->promotetohome;
        $scroll_filter_link = $product->scroll_filter_link;
        $favorite_img_name = $product->favorite_img_name;
        $scroll_manual_link = $product->scroll_manual_link;
        $scroll_image_alt = $product->scroll_image_alt;
        $swatchhomedesc = $product->swatchhomedesc;
        $image_name = $product->image_name;
        $show_main_img = $product->show_main_img;
        $m_image_sm = $product->m_image_sm;
        $textforpdf = $product->textforpdf;
        $first_swatch_image = $product->first_swatch_image;
        $first_swatch_UploadPDF = $product->first_swatch_UploadPDF;
        $second_swatch_image = $product->second_swatch_image;
        $second_swatch_UploadPDF = $product->second_swatch_UploadPDF;
        $thumbnail1_description = $product->thumbnail1_description;
        $thumbnail2_description = $product->thumbnail2_description;
        $third_swatch_image = $product->third_swatch_image;
        $third_swatch_UploadPDF = $product->third_swatch_UploadPDF;
        $thumbnail3_description = $product->thumbnail3_description;
        $out_stock = $product->out_stock;
        $due_date = $product->due_date;
        $max_width = $product->max_width;
        $max_drop = $product->max_drop;
        $max_width_turned = $product->max_width_turned;
        $max_drop_turned = $product->max_drop_turned;
        $code = $product->code;
        $x = $product->x;
        $start_date = $product->start_date;
        $end_date = $product->end_date;
        $trade_percentage = $product->trade_percentage;
        $profit_margin = $product->profit_margin;
        $sales_percentage = $product->sales_percentage;
        $lead_time_days = $product->lead_time_days;
        $sale_start = $product->sale_start;
        $sale_end = $product->sale_end;
        $allow_samples = $product->allow_samples;
        $assign_template_id = $product->assign_template_id;
        $template_id = $product->template_id;
        $guide_id = $product->guide_id;
        if (!empty($meta_data)) {
            // dd($meta_data);
            $meta_title = $meta_data->title;
            $meta_desc = $meta_data->description;
        } else {
            $meta_title = $meta_desc = '';
        }
        $product_keyword = $product->product_keyword;
    } 
    
    $lifestyleimg_name_ph = (file_exists(public_path() . "/uploads/v2_products/$lifestyleimg_name") && ($lifestyleimg_name != '')) ? asset('uploads/v2_products/' . $lifestyleimg_name) : $noImg;
    $lifestleimg_scnd_ph = (file_exists(public_path() . "/uploads/v2_products/$lifestleimg_scnd") && ($lifestleimg_scnd != '')) ? asset('uploads/v2_products/' . $lifestleimg_scnd) : $noImg;
    $colleclifestyle_name_ph = (file_exists(public_path() . "/uploads/v2_products/$colleclifestyle_name") && ($colleclifestyle_name != '')) ? asset('uploads/v2_products/' . $colleclifestyle_name) : $noImg;
    $favorite_img_name_ph = (file_exists(public_path() . "/uploads/v2_products/$favorite_img_name") && ($favorite_img_name != '')) ? asset('uploads/v2_products/' . $favorite_img_name) : $noImg;
    $image_name_ph = (file_exists(public_path() . "/uploads/v2_products/$image_name") && ($image_name != '')) ? asset('uploads/v2_products/' . $image_name) : $noImg;

    $first_swatch_image_ph = (file_exists(public_path() . "/uploads/v2_products/$first_swatch_image") && ($first_swatch_image != '')) ? asset('uploads/v2_products/' . $first_swatch_image) : $noImg;
    $first_swatch_UploadPDF_ph = (file_exists(public_path() . "/uploads/v2_products/$first_swatch_UploadPDF") && ($first_swatch_UploadPDF != '')) ? asset('uploads/v2_products/' . $first_swatch_UploadPDF) : $noImg;
    $second_swatch_image_ph = (file_exists(public_path() . "/uploads/v2_products/$second_swatch_image") && ($second_swatch_image != '')) ? asset('uploads/v2_products/' . $second_swatch_image) : $noImg;
    $second_swatch_UploadPDF_ph = (file_exists(public_path() . "/uploads/v2_products/$second_swatch_UploadPDF") && ($second_swatch_UploadPDF != '')) ? asset('uploads/v2_products/' . $second_swatch_UploadPDF) : $noImg;
    $third_swatch_image_ph = (file_exists(public_path() . "/uploads/v2_products/$third_swatch_image") && ($third_swatch_image != '')) ? asset('uploads/v2_products/' . $third_swatch_image) : $noImg;
    $third_swatch_UploadPDF_ph = (file_exists(public_path() . "/uploads/v2_products/$third_swatch_UploadPDF") && ($third_swatch_UploadPDF != '')) ? asset('uploads/v2_products/' . $third_swatch_UploadPDF) : $noImg;
 
    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>{{$heading}}</h3>
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
                    
                <a href="{{ route('product', ['type'=> $product_type_id, 'category' => $parent_id]) }}" class="btn btn-primary"><< Back to list</a>
                    @if($id > 0)
                    <a href="{{ route('product_details', $id) }}" class="btn btn-warning"><i class="fa fa-eye"></i> View
                        Details</a>
                    @endif
                    <form action="{{ route('store_product') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}">

                        {{--main details--}}
                        <div class="card card-outline card-info spec-details">

                            <div class="card-body">
                                <h3 class="heading">Main Details</h3>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Product Type</span>
                                            <select class="select2 form-control product_type_id" name="product_type_id">
                                                <!-- <option value="0">Select...</option> -->
                                                @foreach($pTypes as $type)
                                                <option value="{{$type->id}}" {{($product_type_id == $type->id) ? 'selected' : ''}}>
                                                    {{$type->pname}}
                                                </option>
                                                @if(($id == 0) && ($product_type_id == $type->id))
                                                <?php $schema_desc = $type->pname; ?>
                                                @endif

                                                @endforeach
                                            </select>
                                            @if($errors->has('product_type_id'))
                                            <div class="error">{{ $errors->first('product_type_id') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Parent Category</span>
                                            <select class="select2 form-control parent_id" name="parent_id">
                                                <!-- <option value="0">Select...</option> -->
                                                @foreach($pCats as $cat)
                                                <option value="{{$cat->id }}" {{($parent_id == $cat->id) ? 'selected' : ''}}>
                                                    {{($cat->parent_id == 0) ? $cat->name : "- $cat->name"}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('parent_id'))
                                            <div class="error">{{ $errors->first('parent_id') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Supplier</span>
                                            <select class="select2 form-control" name="supplier_id">
                                                <option value="0">Select...</option>
                                                @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->supplier_id }}" {{ ($supplier_id == $supplier->supplier_id) ? "selected" : "" }}>
                                                    {{$supplier->supplier_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('supplier_id'))
                                            <div class="error">{{ $errors->first('supplier_id') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Display in Search Results</span>
                                            <div class="mt-2 mb-2 form-control">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="searchrslt" id="Options1" value="Y" {{($searchrslt == 'Y') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Options1">Yes </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="searchrslt" id="Options2" value="N" {{($searchrslt == 'N') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Options2">No </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Product Name</span>
                                            <input type="text" class="form-control" name="name" value="{{$name}}">
                                            @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Supplied Name</span>
                                            <input type="text" class=" form-control" name="supplied_name" value="{{$supplied_name}}" />
                                            @if($errors->has('supplied_name'))
                                            <div class="error">{{ $errors->first('supplied_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Band</span>
                                            <select class="select2 form-control" name="band_id">
                                                <option value="0">Select...</option>
                                                @foreach($bands as $band)
                                                <option value="{{$band->id }}" {{ ($band_id == $band->id) ? "selected" : "" }}>{{$band->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Promote to front</span>
                                            <select class="select2 form-control" name="promote_to_front">
                                                <option value="t" {{ ($promote_to_front == 't') ? "selected" : "" }}>
                                                    Yes
                                                </option>
                                                <option value="f" {{ ($promote_to_front == 'f') ? "selected" : "" }}>
                                                    No
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <span class="label-title">Schema Description
                                                <small>(for social media)</small></span>
                                            <input type="text" class=" form-control" name="schema_desc" value="{{$schema_desc}}" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Louvres Only Available</span>
                                            <div class="mb-2 form-control">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="louvres_only_available" {{($louvres_only_available == 1) ? 'checked' : '' }}>
                                                    <label class="form-check-label">Louvres Only Available </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title"> Description </span>
                                            <textarea class="form-control ckeditor" rows="5" name="description"> {{$description}}</textarea>
                                        </div>
                                        <div class="button-action justify-content-start">
                                            <button type="submit" class="btn btn-info mr-2">Save</button>
                                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Add more
                                                data
                                            </button>
                                        </div>

                                    </div>

                                </div>

                                {{--add more data--}}

                                <div class="add-more-data collapse" id="collapseExample">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title"> Tag Cloud - Keywords & Phrases </span>
                                                <textarea type="text" rows="3" class=" form-control" name="TagCloudKeyworkOrPhase">
                                                {{$TagCloudKeyworkOrPhase}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <span class="label-title"> Tag Cloud - Measurements </span>
                                                <textarea type="text" rows="3" class=" form-control" name="TagCloudMeasurement">
                                                {{$TagCloudMeasurement}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <span class="label-title">Tag Cloud - Towns & Cities</span>
                                                <textarea type="text" rows="3" name="tag_cloud" class=" form-control">
                                                {{$tag_cloud}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <span class="label-title">Tag Cloud - Post Codes</span>
                                                <textarea type="text" rows="3" name="TagCloudAreaOrPostCodes" class=" form-control">
                                                {{$TagCloudAreaOrPostCodes}}</textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <?php
                        if ($id > 0) {
                        ?>
                            <div class="card card-outline card-info spec-details">
                                <div class="card-body row">
                                    <h3 class="heading">Meta Title & Description</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title"> Meta Title </span>
                                            <input type="text" class=" form-control" name="meta_title" value="{{$meta_title}}">
                                        </div>
                                        <div class="form-group">
                                            <span class="label-title"> Meta Description </span>
                                            <textarea type="text" rows="3" class=" form-control" name="meta_desc">{{$meta_desc}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <span class="label-title">Keywords</span>
                                            <textarea type="text" rows="3" name="product_keyword" class="form-control">{{$product_keyword}}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        {{--images details--}}
                        <div class="card card-outline card-info spec-details">

                            <div class="card-body">
                                <h3 class="heading">Upload Images</h3>
                                <div class="row">
                                    <div class="col-md-4 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Swatch Page</span>
                                                <small class="mt-0 mb-1 form-text d-flex justify-content-between align-items-center">
                                                    <!-- <label class="form-check-label">Lifestyle Image</label> -->
                                                    <div class="radio-part">
                                                        Size (500x500)
                                                    </div>
                                                </small>
                                                <label class="file-upload-sec">
                                                    <input type="file" name="lifestyleimg_name" id="lifestyleimg_name"  accept="image/*" hidden>
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                </label>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="uploaded-image">
                                                <!-- <button class="btn btn-close" type="button"><i class="fas fa-times"></i></button> -->
                                                <img class="upload-img" src="{{$lifestyleimg_name_ph}}" id="lifestyleimg_name_pre" />
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-4 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Swatch Page</span>
                                                <small class="mt-0 mb-1 form-text d-flex justify-content-between align-items-center">
                                                    <!-- <label class="form-check-label">Lifestyle Image 2</label> -->
                                                    <div class="radio-part">
                                                        Size (500x500)
                                                    </div>
                                                </small>
                                                <label class="file-upload-sec">
                                                    <input type="file" name="lifestleimg_scnd" id="lifestleimg_scnd"  accept="image/*" hidden>
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                </label>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="uploaded-image">
                                                <img class="upload-img" src="{{$lifestleimg_scnd_ph}}" id="lifestleimg_scnd_pre" />
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-4 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Collection Page</span>
                                                <small class="mt-0 mb-1 form-text d-flex justify-content-between align-items-center">
                                                    <!-- <label class="form-check-label">Lifestyle Image</label> -->
                                                    <div class="radio-part">
                                                        Size (240x350)
                                                    </div>
                                                </small>
                                                <label class="file-upload-sec">
                                                    <input type="file" name="colleclifestyle_name" id="colleclifestyle_name"  accept="image/*" hidden>
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                </label>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="uploaded-image">
                                                <img class="upload-img" src="{{$colleclifestyle_name_ph}}" id="colleclifestyle_name_pre" />
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="add-more-data">
                                    <h3 class="heading">Promote Swatch as Scroll Image</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mt-2 mb-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input promScrollImg" type="radio" name="promotetohome" id="No" value="N" {{($promotetohome == 'N') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="No">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input promScrollImg" type="radio" name="promotetohome" id="YesHomepage" value="HP" {{($promotetohome == 'HP') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="YesHomepage">Yes
                                                        Homepage</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input promScrollImg" type="radio" name="promotetohome" id="YesLandingPage" value="LP" {{($promotetohome == 'LP') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="YesLandingPage">Yes Landing
                                                        Page</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input promScrollImg" type="radio" name="promotetohome" id="YesFilterPage" value="FP" {{($promotetohome == 'FP') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="YesFilterPage">Yes Filter
                                                        Page</label>
                                                </div>
                                            </div>
                                            <div class="form-group filter_page_url">
                                                <span class="label-title">Filter Page URL</span>
                                                <div class="input-group ManualLink-gr mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3">https://www.blinds4uk.co.uk/</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="basic-url" name="scroll_filter_link" value="{{$scroll_filter_link}}" aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="label-title">Filter Page Image </span>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <small class="mt-0 mb-1 form-text d-flex justify-content-between align-items-center">
                                                                <label class="form-check-label">Lifestyle
                                                                    Image</label>
                                                                <div class="radio-part">Size (370x370)</div>
                                                            </small>
                                                            <label class="file-upload-sec">
                                                                <input type="file" name="favorite_img_name" id="favorite_img_name"  accept="image/*" hidden="">
                                                                <i class="fas fa-cloud-upload-alt"></i>
                                                            </label>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="uploaded-image">
                                                                <img class="upload-img" src="{{$favorite_img_name_ph}}" id="favorite_img_name_pre">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Alt tag & title</span>
                                                        <input type="text" class=" form-control" name="scroll_image_alt" value="{{$scroll_image_alt}}" placeholder="Alt tag & title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="label-title">Manual Link</span>
                                                <div class="input-group ManualLink-gr mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3">https://www.blinds4uk.co.uk/</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="scroll_manual_link" value="{{$scroll_manual_link}}" id="basic-url" aria-describedby="basic-addon3">
                                                    <div class="invalid-feedback d-block">
                                                        (Field will work for scrolling images)
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <span class="label-title"> Description </span>
                                                <textarea type="text" rows="3" name="swatchhomedesc" class=" form-control ckeditor">{{$swatchhomedesc}} </textarea>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span class="label-title">Main Image</span>
                                                    <small class="mt-0 mb-1 form-text d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label">Lifestyle Image</label>
                                                        <!-- <div class="radio-part"> Size (500x500) </div> -->
                                                    </small>
                                                    <label class="file-upload-sec">
                                                        <input type="file" name="image_name" id="image_name"  accept="image/*" hidden="">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="uploaded-image">
                                                        <img class="upload-img" src="{{$image_name_ph}}" id="image_name_pre">
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <br>
                                                    <div class="warning-sction mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input show_main_img" type="checkbox" name="show_main_img" id="Donotshow" {{($show_main_img == 'Y') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="Donotshow" style="color: red">
                                                                Do not show main image on website
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input m_image_sm" type="checkbox" name="m_image_sm" id="Showmain" {{($m_image_sm == 1) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="Showmain">
                                                                Show main image in small
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <button type="submit" class="btn btn-info">Save</button>
                                        </div>

                                    </div>
                                </div>
                                <h3 class="heading mt-4">Additional data</h3>
                                <div class="individual-box card card-outline card-info">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <span class="label-title">Text For PDF</span>
                                                    <input type="text" class=" form-control" name="textforpdf" value="{{$textforpdf}}" placeholder="Text For PDF">
                                                </div>
                                            </div>
                                            <div class="col-md-4 row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Swatch Image 1</span>

                                                        <label class="file-upload-sec">
                                                            <input type="file" name="first_swatch_image" id="first_swatch_image"  accept="image/*" hidden="">
                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                        </label>

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="uploaded-image">
                                                        <img class="upload-img" src="{{$first_swatch_image_ph}}" id="first_swatch_image_pre" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Upload Image PDF </span>

                                                        <label class="file-upload-sec">
                                                            <input type="file" name="first_swatch_UploadPDF" id="first_swatch_UploadPDF"  accept="image/*" hidden="">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="uploaded-image">
                                                        <img class="upload-img" src="{{$first_swatch_UploadPDF_ph}}" id="first_swatch_UploadPDF_pre"/>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title">Swatch Image 1 Description</span>
                                                    <textarea type="text" class="form-control" rows="3" name="thumbnail1_description" placeholder="Swatch Image 1 Description">{{$thumbnail1_description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="individual-box card card-outline card-info">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-4 row">
                                                <div class="form-group col-md-6">
                                                    <span class="label-title">Swatch Image 2</span>

                                                    <label class="file-upload-sec">
                                                        <input type="file" name="second_swatch_image" id="second_swatch_image"  accept="image/*" hidden="">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="uploaded-image">
                                                        <img class="upload-img" src="{{$second_swatch_image_ph}}" id="second_swatch_image_pre" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 row">
                                                <div class="form-group col-md-6">
                                                    <span class="label-title">Upload Image PDF </span>

                                                    <label class="file-upload-sec">
                                                        <input type="file" name="second_swatch_UploadPDF" id="second_swatch_UploadPDF"  accept="image/*" hidden="">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </label>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="uploaded-image">
                                                        <img class="upload-img" src="{{$second_swatch_UploadPDF_ph}}" id="second_swatch_UploadPDF_pre" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title">Swatch Image 2 Description</span>
                                                    <textarea type="text" class="form-control" rows="3" name="thumbnail2_description" placeholder="Swatch Image 2 Description">{{$thumbnail2_description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="individual-box card card-outline card-info">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 row">
                                                <div class="form-group col-md-6">
                                                    <span class="label-title">Swatch Image 3</span>
                                                    <label class="file-upload-sec">
                                                        <input type="file" name="third_swatch_image" id="third_swatch_image"  accept="image/*" hidden="">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="uploaded-image">
                                                        <img class="upload-img" src="{{$third_swatch_image_ph}}" id="third_swatch_image_pre" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 row">
                                                <div class="form-group col-md-6">
                                                    <span class="label-title">Upload Image PDF </span>

                                                    <label class="file-upload-sec">
                                                        <input type="file" name="third_swatch_UploadPDF" id="third_swatch_UploadPDF"  accept="image/*" hidden="">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </label>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="uploaded-image">
                                                        <img class="upload-img" src="{{$third_swatch_UploadPDF_ph}}" id="third_swatch_UploadPDF_pre" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title">Swatch Image 3 Description</span>
                                                    <textarea type="text" class="form-control" rows="3" name="thumbnail3_description" placeholder="Swatch Image 3 Description">{{$thumbnail3_description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--Out of Stock Section start--}}

                                <div class="offer-parts">
                                    <div class="individual-box card card-outline card-info">
                                        <div class="card-body">
                                            <h3 class="heading">Out of Stock Section</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="label-title">Stock pattern</span>
                                                    <div class="form-check">

                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="out_stock" {{($out_stock == 'yes') ? "checked" : "" }}>
                                                        <label class="form-check-label" for="exampleCheck1">Out of
                                                            Stock</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Due Date</span>
                                                        <input type="date" class="form-control" name="due_date" value="{{$due_date}}" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="individual-box card card-outline card-info">
                                        <div class="card-body">
                                            <h3 class="heading">Size Restrictions</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="label-title">Max Width</span>
                                                    <input type="number" class="form-control" name="max_width" value="{{$max_width}}" placeholder="Max Width">
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Max Drop</span>
                                                        <input type="number" class="form-control" name="max_drop" value="{{$max_drop}}" placeholder="Max Drop" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Max Width Turned</span>
                                                        <input type="number" class="form-control" name="max_width_turned" value="{{$max_width_turned}}" placeholder="Max Width Turned" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Max Drop Turned</span>
                                                        <input type="number" class="form-control" name="max_drop_turned" value="{{$max_drop_turned}}" placeholder="Max Drop Turned" />
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="individual-box card card-outline card-info">
                                        <div class="card-body">
                                            <h3 class="heading">Extra Promotional Discount Code</h3>
                                            <small class="text-red d-block">Note: Discount code must be blank at
                                                product & parent level
                                            </small>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <span class="label-title">Discount Code</span>
                                                    <input type="text" class="form-control" name="code" value="{{$code}}" placeholder="Discount Code">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Percentage Off (%)</span>
                                                        <input type="number" class="form-control" name="x" value="{{$x}}" placeholder="Percentage Off (%)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Start Date</span>
                                                        <input type="date" name="start_date" value="{{$start_date}}" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">End Date</span>
                                                        <input type="date" name="end_date" value="{{$end_date}}" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="individual-box card card-outline card-info">
                                        <div class="card-body">
                                            <h3 class="heading">Price and Delivery Details</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="label-title">Trade Discount (%)</span>
                                                    <input type="text" class="form-control" name="trade_percentage" value="{{$trade_percentage}}" placeholder="Discount Code">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Retail Markup (%)</span>
                                                        <input type="number" class="form-control" name="profit_margin" value="{{$profit_margin}}" placeholder="Percentage Off (%)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Sale Discount (%)</span>
                                                        <input type="number" class="form-control" name="sales_percentage" value="{{$sales_percentage}}" placeholder="Percentage Off (%)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Lead Time (Days)</span>
                                                        <input type="text" class="form-control" name="lead_time_days" value="{{$lead_time_days}}" placeholder="Lead Time" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Start Date</span>
                                                        <input type="date" name="sale_start" value="{{$sale_start}}" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">End Date</span>
                                                        <input type="date" name="sale_end" value="{{$sale_end}}" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <span class="label-title">Allow Samples</span>
                                                        <select class="select2 form-control" name="allow_samples">
                                                            <option value="y" {{($allow_samples == 'y') ? 'selected' : '' }}>
                                                                Yes, Samples available
                                                            </option>
                                                            <option value="n" {{($allow_samples == 'n') ? 'selected' : '' }}>
                                                                No, samples not available
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-action justify-content-start">
                                        <!-- <button type="button" class="btn btn-info mr-2">Cancel</button> -->
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{--Template Fields--}}
                        <div class="card card-outline card-info spec-details">

                            <div class="card-body">
                                <h3 class="heading">Template Fields</h3>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span class="label-title">Product Template</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select class="select2 form-control pro_template_select" name="template_id">
                                                        <option value="0">Select...</option>
                                                        @foreach($pTemplates as $row)
                                                        <option value="{{$row->id}}" {{($template_id == $row->id) ? 'selected' : '' }}>
                                                            {{$row->name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="select-drop-data pro_template_field_content">
                                    {{--add more data--}}
                                </div>

                                <h3 class="heading mt-3">Assign Template Fields</h3>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group row">
                                            <span class="label-title col-4">Product Template</span>
                                            <select class="select2 col-4 form-control assign_pro_template_select" name="assign_template_id">
                                                <!-- <option value="0">Select...</option> -->
                                                @foreach($pTemplates as $row)
                                                <option value="{{$row->id}}" {{($assign_template_id == $row->id) ? 'selected' : '' }}>
                                                    {{$row->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class=" assign_pro_template_field_content">
                                        {{--add more data--}}
                                    </div>
                                    <p class="text-primary w-100">Please select checkbox for updating templates
                                        <input type="checkbox" name="tmpsec">
                                    </p>
                                    <div class="button-action justify-content-start">
                                        <!-- <button type="button" class="btn btn-info mr-2">Cancel</button> -->
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($id > 0)
                        <div class="card card-outline card-warning spec-details">

                            <div class="card-body">
                                <h3 class="heading mb-2">Band/Price Filters</h3>

                                @if(count($search_filter) > 0)
                                <div class="filtered-value">
                                    <h4 class="sub-filter-head">Current Filter</h4>
                                    <div class="row">
                                        @foreach($search_filter as $filter)
                                        <div class="col-md-4">
                                            <div class="card flt-card">

                                                <p class="val-obj">
                                                    @if($filter->width > 0)
                                                    <strong>Width:</strong>
                                                    <em>{{ ($filter->lt_gt == 'lt') ? 'Less than' : 'Greater than' }}</em>
                                                    &nbsp; {{ $filter->width }}
                                                </p>
                                                @endif
                                                <p class="val-obj">
                                                    @if($filter->height > 0)
                                                    <strong>Height:</strong>
                                                    <em>{{ ($filter->lt_gt == 'lt') ? 'Less than' : 'Greater than' }}</em>
                                                    &nbsp;{{ $filter->height }}
                                                </p>
                                                @endif
                                                <p class="val-obj">
                                                    @if(($filter->group_id > 0) || ($filter->option_id > 0))
                                                    <strong>Group/Option:</strong> {{ @$filter->getGroup->group_title }}
                                                    &gt; {{ @$filter->getOption->option_name }}
                                                    @endif


                                                </p>

                                                <a class="act-btn" href="{{ route('delete_product_filter', ['pId' => $filter->product_id, 'wd'=>$filter->width,'hg'=>$filter->height,'lt_gt'=>$filter->lt_gt,'gpId'=>$filter->group_id , 'opId'=>$filter->option_id]) }}" onclick="return confirm('Are you sure you want to delete this filter?');"><i class="fa fa-trash-alt"></i></a>

                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                @endif
                                <hr size="0">
                                <fieldset class="assign-actions">
                                    <legend>Assign New/Override Current Filter</legend>
                                    <p class="notably">You can filter which Band Groups and/or Options get
                                        filtered out
                                        depending on
                                        size</p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-title">Width</label>
                                                <div class="input-group mb-3">
                                                    <input class="form-control" min="0" autocomplete="off" type="number" id="filter_width" value="">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">CM</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-title">Height</label>

                                                <div class="input-group mb-3">
                                                    <input class="form-control" min="0" autocomplete="off" type="number" id="filter_height" value="">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">CM</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-title">Greater or Less than</label>
                                                <select class="form-control" autocomplete="off" id="filter_lt_gt" size="1">
                                                    <option value="gt">Greater Than</option>
                                                    <option value="lt">Less Than</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <p class="note mb-0">
                                        <small>Note 1: you can specify width or height or both width and height
                                        </small>
                                    </p>
                                    <p class="note mb-1">
                                        <small>Note 2: currently filter will only apply to fabrics greater then
                                            the
                                            measurements
                                        </small>
                                    </p>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="label-title">Group</label>
                                                <select class="form-control" id="filter_GroupSelect" size="1">
                                                    <option value="0">You must specify a Group</option>
                                                    @if(count($band_groups) > 0)
                                                    @foreach($band_groups as $grMap)
                                                    <option value="{{$grMap->groupName->group_id}}">
                                                        {{$grMap->groupName->group_admin_name}}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div id="OptionList0">
                                                <!-- Append option list by change group by ajax -->
                                            </div>
                                        </div>
                                    </div>

                                    <p>
                                        <small>Note 1: Whichever Option you select here will not be displayed in
                                            the
                                            frontend if the size criteria is met
                                        </small>
                                    </p>

                                    <!-- <input type="button" value="cancel" onclick="document.location.href='/v4_admin/products/product.php?product_id=29372';"> -->
                                    <input type="button" class='btn btn-info save_filter_btn' value="Save Filterd">
                                </fieldset>
                                <!-- <input type="hidden" name="product_id" value="29372">
                                        <input type="hidden" name="c" value="process_filter"> -->
                            </div>
                        </div>
                        @endif

                        {{--Product Filters--}}
                        <div class="card card-outline card-info spec-details">

                            <div class="card-body">
                                <h3 class="heading mb-4">Product Filters</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <div class="color-group"><span class="label-title">Colours</span>
                                                @if(count($pFilterColor) > 0)
                                                @foreach($pFilterColor as $color)
                                                <div class="form-check">
                                                    <img src="{{asset('uploads/v3_product_filters/' . $color->image)}}" class="image-plate" />
                                                    <input type="checkbox" class="form-check-input" name="filters[]" value="{{$color->id}}" id="exampleCheck_{{$color->id}}" {{(in_array($color->id, $filter_map_ids)) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="exampleCheck_{{$color->id}}">{{$color->name}}</label>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No product filters have been created yet</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <div class="color-group"><span class="label-title">Features</span>
                                                @if(count($pFilterFeatures) > 0)

                                                @foreach($pFilterFeatures as $row)
                                                <div class="form-check">
                                                    <img src="{{asset('uploads/v3_product_filters/' . $row->image)}}" class="image-plate" />
                                                    <input type="checkbox" class="form-check-input" name="filters[]" value="{{$row->id}}" id="exampleCheck_{{$row->id}}" {{(in_array($row->id, $filter_map_ids)) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="exampleCheck_{{$row->id}}">{{$row->name}}</label>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No product filters have been created yet</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="color-group"><span class="label-title">Buy</span>
                                                @if(count($pFilterBuy) > 0)

                                                @foreach($pFilterBuy as $row)
                                                <div class="form-check">
                                                    <img src="{{asset('uploads/v3_product_filters/' . $row->image)}}" class="image-plate" />
                                                    <input type="checkbox" class="form-check-input" name="filters[]" value="{{$row->id}}" id="exampleCheck_{{$row->id}}" {{(in_array($row->id, $filter_map_ids)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="exampleCheck_{{$row->id}}">{{$row->name}}</label>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No product filters have been created yet</p>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="button-action justify-content-start">
                                    <!-- <button type="button" class="btn btn-info mr-2">Cancel</button> -->
                                    <button type="submit" class="btn btn-info">Save product filters</button>
                                </div>


                                <div class="other-filter-part guid-part">
                                    <h3>GUIDE</h3>
                                    @if($guide_id > 0)

                                    <table class="table ">
                                        <tr>
                                            <th colspan="3">{{$product->guideHead->name}}</th>
                                        </tr>
                                        <?php
                                        $guideLandingValueMap = $product->guideHead->guideLandingValueMap;
                                        if (count($guideLandingValueMap) > 0) {
                                            foreach ($guideLandingValueMap as $mapData) {
                                                $guideLandingValue = $mapData->guideLandingValue;
                                        ?>
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('uploads/guide_landing_values/'.$mapData->value)}}" alt="">
                                                    </td>
                                                    <td>{{@$guideLandingValue->text}}</td>
                                                    <td><input type="checkbox" name="guidesText[]" value="{{$guideLandingValue->id}}" <?php echo (in_array($guideLandingValue->id, $selected_guides)) ? 'checked' : '' ?>>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>
                                    </table>
                                    @else
                                    <select name="guide_id" class="form-check-input select2">
                                        <option value="0">Select...</option>

                                        @foreach($product_guides as $guide)
                                        <option value="{{$guide->id}}">{{$guide->name}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                    <!-- <p> Could not find product filters.</p> -->
                                    <div class="button-action justify-content-start">
                                        <!-- <button type="button" class="btn btn-info mr-2">Cancel</button> -->
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
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
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";


        $(".product_type_id").change(function() {
            var product_type_id = $(this).val();
            $.ajax({
                type: 'GET',
                url: base_url + '/get_catlist_by_type_id_ajax/' + product_type_id,
                success: function(data) {
                    $(".parent_id").html(data);
                    console.log(data);
                }
            });
        });


        $(".filter_page_url").hide();
        $('.promScrollImg').click(function() {
            var promScrollImg = $(this).val();
            $(".filter_page_url").hide();

            if (promScrollImg == 'FP') {
                $(".filter_page_url").show();
            }
        });

        var promotetohome = '<?= $promotetohome ?>';
        if (promotetohome == 'FP') {
            $(".filter_page_url").show();
        }

        var load_template_id = '<?php echo $template_id ?>';
        get_template_fields(load_template_id);

        $(".pro_template_select").change(function() {
            var template_id = $(this).val();
            $.confirm({
                title: 'Change Template',
                content: 'Are you sure you want to change the product template?  This will result in data under template values being lost',
                type: 'blue',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-blue',
                        action: function() {
                            get_template_fields(template_id);
                        }
                    },
                    close: function() {}
                }
            });
        });


        var load_ass_template_id = '<?php echo $assign_template_id ?>';
        if (load_ass_template_id > 0) {
            get_assign_template_fields(load_ass_template_id);
        }

        $(".assign_pro_template_select").change(function() {
            var template_id = $(this).val();
            $.confirm({
                title: 'Change Template',
                content: 'Are you sure you want to change the product template?  This will result in data under template values being lost',
                type: 'blue',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-blue',
                        action: function() {
                            get_assign_template_fields(template_id);
                        }
                    },
                    close: function() {}
                }
            });
        });

        function get_template_fields(template_id) {
            $.ajax({
                type: 'GET',
                url: base_url + '/get_template_fields_ajax/' + template_id + "/<?= $id ?>",
                success: function(data) {
                    $(".pro_template_field_content").html(data);
                    console.log(data);

                }
            });
        }

        function get_assign_template_fields(template_id) {
            $.ajax({
                type: 'GET',
                url: base_url + '/get_assign_template_fields/' + template_id,
                success: function(data) {
                    $(".assign_pro_template_field_content").html(data);
                    console.log(data);

                }
            });
        }


        //=================Search Filter ============//
        $("#filter_GroupSelect").change(function() {
            var groupId = $(this).val();
            $.ajax({
                type: 'GET',
                url: base_url + '/get_option_list_by_group_id_ajax/' + groupId,
                success: function(data) {
                    $("#OptionList0").html(data);
                    console.log(data);
                }
            });
        });


        $('body').on('change', '#filter_optionSelect', function() {
            var optionId = $(this).val();
            $.ajax({
                type: 'GET',
                url: base_url + '/get_sub_group_by_option_id_ajax/' + optionId,
                success: function(data) {
                    $("#subGroupList").html(data);
                    console.log(data);
                }
            });
        });

        $(".save_filter_btn").click(function() {
            var filter_width = $("#filter_width").val();
            var filter_height = $("#filter_height").val();
            var filter_lt_gt = $("#filter_lt_gt").val();
            var filter_GroupSelect = $("#filter_GroupSelect").val();
            var filter_optionSelect = $("#filter_optionSelect").val();
            var filter_subGroupSelect = $("#filter_subGroupSelect").val();
            $.ajax({
                type: 'POST',
                url: base_url + '/productFilterSave_ajax',
                data: {
                    _token: '<?= csrf_token() ?>',
                    id: '<?= $id ?>',
                    filter_width: filter_width,
                    filter_height: filter_height,
                    filter_lt_gt: filter_lt_gt,
                    filter_GroupSelect: filter_GroupSelect,
                    filter_optionSelect: filter_optionSelect,
                    filter_subGroupSelect: filter_subGroupSelect,
                },
                success: function(data) {
                    // window.open(base_url + '/product-edit/'+'<?= $id ?>');
                    location.reload();
                    console.log(data);
                }
            });
        });



        //========== START:: Image Preview section ===========//
 
        imagePreview(lifestyleimg_name, lifestyleimg_name_pre);
        imagePreview(lifestleimg_scnd, lifestleimg_scnd_pre);
        imagePreview(colleclifestyle_name, colleclifestyle_name_pre);
        imagePreview(favorite_img_name, favorite_img_name_pre);
        imagePreview(image_name, image_name_pre);
        imagePreview(first_swatch_image, first_swatch_image_pre);
        imagePreview(first_swatch_UploadPDF, first_swatch_UploadPDF_pre);
        imagePreview(second_swatch_image, second_swatch_image_pre);
        imagePreview(second_swatch_UploadPDF, second_swatch_UploadPDF_pre);
        imagePreview(third_swatch_image, third_swatch_image_pre);
        imagePreview(third_swatch_UploadPDF, third_swatch_UploadPDF_pre);

        function imagePreview(imgId, imgPreviewId) {
            imgId.onchange = evt => {
                const [file] = imgId.files
                if (file) {
                    imgPreviewId.src = URL.createObjectURL(file)
                }
            }
        }
        //========== END:: Image Preview section ===========//


    });
</script>
@stop