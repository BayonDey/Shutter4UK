@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <?php
    if (empty($pType)) {
        $pageHeading = 'Add Product Type';
        $id = 0;
        $title = $description = ''; // For Meta tag
        $taxonomy = 0;
        $pname = '';
        $searchfilterpage = 'Y';
        $louvres_only_available = 0; // 0,1
        $promote_to_front = 't';
        $searchrslt = 'Y';
        $url = '';
        $category_limit = $totalchars = 1;
        $f_footer_scroll = 'E';
        $product_cap_text = '';
        $product_cap_text_option = 'E';
        $head_captxt_desc = '';
        $head_captxt_desc_option = 'E';
        $pdesc = $short_desc = '';
        $TagCloudKeyworkOrPhase = $TagCloudMeasurement = $tag_cloud = $TagCloudAreaOrPostCodes = '';
        $is_flash = 't';
        $op_extra_promo_code = 'Y';
        $code = '';
        $start_date = $end_date = $banner_start_date = $banner_end_date = date('Y-m-d');
        $x = 0.0;
        $Discount_Image_Alt = '';
        $discount_text = $discount_text_parttwo = '';
        $main_banner_promote_front = 't';
        $product_footer_scroll = $AssignTemplate = '';

        $pimage = $header_image = $delivery_image = $flash_disabled_image = $discount_txt_img = '';
    } else {
        $pageHeading = 'Edit Product Type';
        $id = $pType->id;

        $title = $Metatag->title;
        $description = $Metatag->description; // For Meta tag
        $taxonomy = $pType->taxonomy;
        $pname = $pType->pname;
        $searchfilterpage = $pType->searchfilterpage;
        $louvres_only_available = $pType->louvres_only_available;
        $promote_to_front = $pType->promote_to_front;
        $searchrslt = $pType->searchrslt;
        $url = $pType->url;
        $category_limit = $pType->category_limit;
        $f_footer_scroll = $pType->f_footer_scroll;
        $product_cap_text = $pType->product_cap_text;
        $product_cap_text_option = $pType->product_cap_text_option;
        $head_captxt_desc = $pType->head_captxt_desc;
        $head_captxt_desc_option = $pType->head_captxt_desc_option;
        $pdesc = $pType->pdesc;
        $totalchars = $pType->totalchars;;
        $short_desc = $pType->short_desc;
        $TagCloudKeyworkOrPhase = $pType->TagCloudKeyworkOrPhase;
        $TagCloudMeasurement = $pType->TagCloudMeasurement;
        $tag_cloud = $pType->tag_cloud;
        $TagCloudAreaOrPostCodes = $pType->TagCloudAreaOrPostCodes;
        $is_flash = $pType->is_flash;
        $op_extra_promo_code = $pType->op_extra_promo_code;
        $code = $pType->code;
        $start_date = $pType->start_date;
        $end_date = $pType->end_date;
        $x = $pType->x;
        $Discount_Image_Alt = $pType->Discount_Image_Alt;
        $discount_text = $pType->discount_text;
        $discount_text_parttwo = $pType->discount_text_parttwo;
        $main_banner_promote_front = $pType->main_banner_promote_front;
        $banner_start_date = $pType->banner_start_date;
        $banner_end_date = $pType->banner_end_date;
        $product_footer_scroll = $pType->product_footer_scroll;
        $AssignTemplate = $pType->AssignTemplate;


        $pimage = $pType->pimage;
        $header_image = $pType->header_image;
        $delivery_image = $pType->delivery_image;
        $flash_disabled_image = $pType->flash_disabled_image;
        $discount_txt_img = $pType->discount_txt_img;
    }
    $noImg = asset('admin/dist/img/noImg.jpg');
    $pimage_ph = (($pimage != '') && file_exists(public_path() . "/uploads/v2_product_types/$pimage")) ? asset('uploads/v2_product_types/' . $pimage) : $noImg;
    $header_image_ph = (($header_image != '') && file_exists(public_path() . "/uploads/v2_product_types/$header_image")) ? asset('uploads/v2_product_types/' . $header_image) : $noImg;
    $delivery_image_ph = (($delivery_image != '') && file_exists(public_path() . "/uploads/v2_product_types/$delivery_image")) ? asset('uploads/v2_product_types/' . $delivery_image) : $noImg;
    $flash_disabled_image_ph = (($flash_disabled_image != '') && file_exists(public_path() . "/uploads/v2_product_types/$flash_disabled_image")) ? asset('uploads/v2_product_types/' . $flash_disabled_image) : $noImg;
    $discount_txt_img_ph = (($discount_txt_img != '') && file_exists(public_path() . "/uploads/v2_product_types/$discount_txt_img")) ? asset('uploads/v2_product_types/' . $discount_txt_img) : $noImg;

    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>{{$pageHeading}}</h3>
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

                
                    @if($id > 0)
                    <a href="{{ route('product', ['type'=> $id]) }}" class="btn btn-primary">
                        << Back to list</a>
                            @else
                            <a href="{{ route('product' ) }}" class="btn btn-primary">
                                << Back to list</a>
                                    @endif

                                    <form action="{{ route('store_product_type') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                                        @csrf
                                        {{--main details--}}
                                        <input type="hidden" name="id" value="{{$id}}">
                                        <div class="card card-outline card-info spec-details">

                                            <div class="card-body">
                                                <h3 class="heading">Main Details </h3>
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <span class="label-title">Taxonomy</span>

                                                                <select name="taxonomy" class="form-control">
                                                                    <option value="0" {{ ($taxonomy == 0) ? 'selected' : '' }}>
                                                                        Category
                                                                    </option>
                                                                    <option value="1" {{ ($taxonomy == 1) ? 'selected' : '' }}>
                                                                        Featured
                                                                    </option>
                                                                    <option value="2" {{ ($taxonomy == 2) ? 'selected' : '' }}>
                                                                        Collection
                                                                    </option>
                                                                </select>

                                                                <!-- <input type="text" class="form-control" /> -->
                                                                <small class="form-text d-flex justify-content-between align-items-center">
                                                                    <label class="form-check-label"> Display in Colour Search
                                                                        Results</label>
                                                                    <div class="radio-part">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="searchfilterpage" id="ds1" value="Y" {{ ($searchfilterpage == 'Y') ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="ds1">Yes</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="searchfilterpage" id="ds2" value="N" {{ ($searchfilterpage == 'N') ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="ds2">No</label>
                                                                        </div>
                                                                    </div>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <span class="label-title">Name</span>
                                                                <input type="text" class="form-control" name="pname" value="{{ $pname }}" required />
                                                                @if($errors->has('pname'))
                                                                <div class="error">{{ $errors->first('pname') }}</div>
                                                                @endif
                                                                <small class="form-text d-flex justify-content-between align-items-center">
                                                                    <div class="radio-part">
                                                                        <span class="form-check">
                                                                            <input class="form-check-input" type="checkbox" name="louvres_only_available" id="louvres_only_available" {{($louvres_only_available == 1) ? 'checked' : ''}}>
                                                                            <label class="form-check-label" for="louvres_only_available">Louvres Only Available </label>
                                                                        </span>

                                                                    </div>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <span class="label-title text-white custom-display-none">Action</span>
                                                            <button class="btn btn-primary w-100 custom-mb-sm-3">Save</button>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <span class="label-title">Promote to front</span>
                                                                <select name="promote_to_front" class="select2 form-control">
                                                                    <option value="t" {{ ($promote_to_front == 't') ? 'selected' : '' }}>
                                                                        Yes
                                                                    </option>
                                                                    <option value="f" {{ ($promote_to_front == 'f') ? 'selected' : '' }}>
                                                                        No
                                                                    </option>
                                                                </select>
                                                                @if($id > 0)
                                                                <small class="form-text d-flex justify-content-between align-items-center">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" name="switch_frontAll" id="Promote" value="option2">
                                                                        <label class="form-check-label">All Collection (Promote to front)</label>
                                                                    </div>
                                                                </small>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <br>
                                                                <small class="form-text d-flex justify-content-between align-items-center">
                                                                    <label class="form-check-label"> Display in Search
                                                                        Results</label>
                                                                    <div class="radio-part">

                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="searchrslt" id="searchrslt1" value="Y" {{ ($searchrslt == 'Y') ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="searchrslt1">
                                                                                Yes
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="searchrslt" id="searchrslt2" value="N" {{ ($searchrslt == 'N') ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="searchrslt2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <hr />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <span class="label-title">URL</span>
                                                                <input type="text" name="url" value="{{$url}}" class=" form-control" required />
                                                                @if($errors->has('url'))
                                                                <div class="error">{{ $errors->first('url') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <span class="label-title">Default number of Collection (Without AJAX)</span>
                                                                <input type="text" name="category_limit" value="{{$category_limit}}" class="form-control" placeholder="Default Category Limit is '15'" />

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="add-more-data mb-3">
                                                                <h3 class="heading">Image for Footer Scroll</h3>
                                                                <div class="form-group">
                                                                    <span class="label-title">Footer Scroll</span>
                                                                    <div class="mt-2 mb-2">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="f_footer_scroll" id="Enable" value="E" {{ ($f_footer_scroll == 'E') ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="Enable">Enable </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="f_footer_scroll" id="Disable" value="D" {{ ($f_footer_scroll == 'D') ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="Disable">Disable</label>
                                                                        </div>

                                                                    </div>
                                                                    <!-- <div class="invalid-feedback d-block">
                                                                No Product type id specified
                                                            </div> -->
                                                                </div>

                                                            </div>

                                                            <div class="add-more-data mb-3">
                                                                <h3 class="heading">Meta Title & Description</h3>
                                                                <!-- From 'metatags' table -->
                                                                <div class="form-group row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Meta Title</span>
                                                                            <textarea type="text" name="title" class="form-control" placeholder="Enter Meta Title">{{$title}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Meta Description</span>
                                                                            <textarea type="text" name="description" class="form-control" placeholder="Enter Meta Description">{{$description}}</textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="add-more-data mb-3">
                                                                <h3 class="heading">Favorites section heading</h3>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Footer Scroll Images</span>
                                                                            <div class="mt-2 mb-2 form-control">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="product_footer_scroll" id="product_footer_scrollEnable" value="E" {{ ($product_footer_scroll == 'E') ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="product_footer_scrollEnable">Enable </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="product_footer_scroll" id="product_footer_scrollDisable" value="D" {{ ($product_footer_scroll == 'D') ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="product_footer_scrollDisable">Disable </label>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Caption Text</span>
                                                                            <input class="form-control" name="product_cap_text" type="text" value="{{$product_cap_text}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Options</span>
                                                                            <div class="mt-2 mb-2 form-control">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="product_cap_text_option" id="Options1" value="E" {{ ($product_cap_text_option == 'E') ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="Options1">Enable </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="product_cap_text_option" id="Options2" value="D" {{ ($product_cap_text_option == 'D') ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="Options2">Disable </label>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="add-more-data mb-3">
                                                                <h3 class="heading">Caption heading for description</h3>
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Heading Text</span>
                                                                            <input class="form-control" name="head_captxt_desc" value="{{$head_captxt_desc}}" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Options</span>
                                                                            <div class="mt-2 mb-2 form-control">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input name="head_captxt_desc_option" class="form-check-input" type="radio" id="Options4" value="E" {{ ($head_captxt_desc_option == 'E') ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="Options4">Enable </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input name="head_captxt_desc_option" class="form-check-input" type="radio" id="Options3" value="DT" {{ ($head_captxt_desc_option == 'DT') ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="Options3">Disable Title </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input name="head_captxt_desc_option" class="form-check-input" type="radio" id="Options4" value="DA" {{ ($head_captxt_desc_option == 'DA') ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="Options4">Disable All </label>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <span class="label-title">Intro Content</span>
                                                                <div class="invalid-feedback d-block mb-2">
                                                                    (top of page)
                                                                </div>
                                                                <textarea name="pdesc" class="form-control " rows="5">{{$pdesc}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <span class="label-title">Total Character</span>
                                                                <input type="number" name="totalchars" value="{{$totalchars}}" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group w-50 custom-width-100">
                                                                <span class="label-title">Image</span>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="file-upload-sec">
                                                                            <input type="file" name="pimage" id="pimage"  accept="image/*" hidden="">
                                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="uploaded-image">
                                                                            <img class="upload-img" src="{{$pimage_ph}}" id="pimage_pre">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <span class="label-title">Intro Description</span>
                                                                <div class="invalid-feedback d-block mb-2">
                                                                    (top of page)
                                                                </div>
                                                                <textarea class="form-control ckeditor" name="short_desc" rows="6">{{$short_desc}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group w-50 custom-width-100">
                                                                <span class="label-title">Header Image</span>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="file-upload-sec">
                                                                            <input type="file" name="header_image" id="header_image"  accept="image/*" hidden="">
                                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="uploaded-image">
                                                                            <img class="upload-img" src="{{$header_image_ph}}" id="header_image_pre">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <span class="label-title">Tag Cloud - Keywords & Phrases</span>
                                                                    <textarea class="form-control" name="TagCloudKeyworkOrPhase" rows="2">{{$TagCloudKeyworkOrPhase}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <span class="label-title">Tag Cloud - Measurements</span>
                                                                    <textarea class="form-control" name="TagCloudMeasurement" rows="2">{{$TagCloudMeasurement}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <span class="label-title">Tag Cloud - Towns & Cities</span>
                                                                    <textarea class="form-control" name="tag_cloud" rows="2">{{$tag_cloud}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <span class="label-title">Tag Cloud - Post Codes</span>
                                                                    <textarea class="form-control" name="TagCloudAreaOrPostCodes" rows="2">{{$TagCloudAreaOrPostCodes}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <span class="label-title">Delivery Image</span>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="file-upload-sec">
                                                                            <input type="file" name="delivery_image" id="delivery_image"  accept="image/*" hidden="">
                                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="uploaded-image">
                                                                            <img class="upload-img" src="{{$delivery_image_ph}}" id="delivery_image_pre">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <span class="label-title">Flash Disabled Image
                                                                    <small class="mt-0 mb-1 form-text d-inline">
                                                                        <label class="form-check-label">(770 x 330)</label>
                                                                    </small></span>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="file-upload-sec">
                                                                            <input type="file" name="flash_disabled_image" id="flash_disabled_image" hidden="">
                                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="uploaded-image">
                                                                            <img class="upload-img" src="{{$flash_disabled_image_ph}}" id="flash_disabled_image_pre">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <span class="label-title">Flash</span>
                                                                <select name="is_flash" class="form-control">
                                                                    <option value="t" {{ ($is_flash == 't') ? 'selected' : '' }}>
                                                                        On
                                                                    </option>
                                                                    <option value="f" {{ ($is_flash == 'f') ? 'selected' : '' }}>
                                                                        Off
                                                                    </option>
                                                                </select>

                                                            </div>
                                                        </div>

                                                        {{--addition discount--}}
                                                        <div class="col-md-12">
                                                            <div class="add-more-data mb-3">
                                                                <h3 class="heading">Extra Promotional Discount Code</h3>
                                                                <small class="text-red d-block mb-3"> Note: If code used here this
                                                                    will overide collection & swatches
                                                                </small>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Choose Options</span>
                                                                            <div class="mt-2 mb-2 form-control">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="op_extra_promo_code" id="Chooseoptions1" value="Y" {{ ($op_extra_promo_code == 'Y') ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="Chooseoptions1">Enable </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="op_extra_promo_code" id="Chooseoptions12" value="N" {{ ($op_extra_promo_code == 'N') ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="Chooseoptions12">Disable </label>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Discount Code</span>
                                                                            <input class="form-control" name="code" type="text" value="{{$code}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Start Date</span>
                                                                            <input class="form-control" name="start_date" type="date" value="{{$start_date}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">End Date</span>
                                                                            <input class="form-control" name="end_date" type="date" value="{{$end_date}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Percentage Off (%)</span>
                                                                            <input class="form-control" name="x" type="text" value="{{$x}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Alt Tag</span>
                                                                            <input class="form-control" name="Discount_Image_Alt" type="text" value="{{$Discount_Image_Alt}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">

                                                                        <div class="form-group  custom-width-100">
                                                                            <span class="label-title">Discount Image</span>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label class="file-upload-sec">
                                                                                        <input type="file" name="discount_txt_img" id="discount_txt_img" hidden="">
                                                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="uploaded-image">
                                                                                        <img class="upload-img" src="{{$discount_txt_img_ph}}" id="discount_txt_img_pre">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <hr />
                                                                        <h3 class="heading">Add promo text </h3>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Discount Text </span>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <small class="form-check-label mb-1">
                                                                                        (Part-1)
                                                                                    </small>
                                                                                    <input class="form-control" name="discount_text" type="text" value="{{$discount_text}}">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <small class="form-check-label mb-1">
                                                                                        (Part-2)
                                                                                    </small>
                                                                                    <input class="form-control" name="discount_text_parttwo" type="text" value="{{$discount_text_parttwo}}">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <span class="label-title">Font Family (Default is "Arial")</span>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <small class="form-check-label mb-1">
                                                                                (Part-1)
                                                                            </small>
                                                                            <select class="select2 form-control">
                                                                                <option>Agency FB</option>
                                                                                <option>Agency FB2</option>
                                                                                <option>Agency FB3</option>
                                                                                <option>Agency FB4</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <small class="form-check-label mb-1">
                                                                                (Part-2)
                                                                            </small>
                                                                            <select class="select2 form-control">
                                                                                <option>Agency FB</option>
                                                                                <option>Agency FB2</option>
                                                                                <option>Agency FB3</option>
                                                                                <option>Agency FB4</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div> -->
                                                                    <!-- <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <span class="label-title">Text Size</span>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <small class="form-check-label mb-1">
                                                                                (Part-1)
                                                                            </small>
                                                                            <input class="form-control" type="text">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <small class="form-check-label mb-1">
                                                                                (Part-2)
                                                                            </small>
                                                                            <input class="form-control" type="text">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div> -->
                                                                    <!-- <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <span class="label-title">Text Color </span>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <small class="form-check-label mb-1">
                                                                                (Part-1)
                                                                            </small>
                                                                            <input class="form-control" type="text">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <small class="form-check-label mb-1">
                                                                                (Part-2)
                                                                            </small>
                                                                            <input class="form-control" type="text">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div> -->
                                                                    <!-- <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <span class="label-title">Font Style </span>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <small class="form-check-label mb-1">
                                                                                (Part-1)
                                                                            </small>
                                                                            <input class="form-control" type="text">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <small class="form-check-label mb-1">
                                                                                (Part-2)
                                                                            </small>
                                                                            <input class="form-control" type="text">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div> -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Assign Template </span>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <small class="form-check-label mb-1">
                                                                                        <!-- (Part-1) --> &nbsp;
                                                                                    </small>
                                                                                    <select name="AssignTemplate" class="form-control">
                                                                                        <option value="WRE" {{($AssignTemplate == 'WRE') ? 'selected' : '' }}>
                                                                                            Without Round Edge
                                                                                        </option>
                                                                                        <option value="SLS" {{($AssignTemplate == 'SLS') ? 'selected' : '' }}>
                                                                                            Swatches with Lifestyle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <hr />
                                                                        <h3 class="heading">Banner Display Settings </h3>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Promote to front banner </span>
                                                                            <select name="main_banner_promote_front" class="select2 form-control">
                                                                                <option value="t" {{($main_banner_promote_front == 't') ? 'selected' : '' }}>
                                                                                    Yes
                                                                                </option>
                                                                                <option value="f" {{($main_banner_promote_front == 'f') ? 'selected' : '' }}>
                                                                                    No
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <span class="label-title">Start Date</span>
                                                                            <input name="banner_start_date" class="form-control" type="date" value="{{$banner_start_date}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <span class="label-title">End Date</span>
                                                                            <input name="banner_end_date" class="form-control" type="date" value="{{$banner_end_date}}">
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="col-md-6"> -->
                                                                    <!-- <div class="form-group">
                                                                    <span class="label-title">xxx Default HTML Button Colour:</span>
                                                                    <input class="form-control" type="color" value="#ff00ff" style="height: 43px;" />
                                                                </div> -->
                                                                    <!-- </div> -->
                                                                    <!-- <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="form-check form-check-inline">
                                                                        <input name="mngCombineSlider" class="form-check-input" type="checkbox" id="TextSlider">
                                                                        <label class="form-check-label" for="TextSlider">Combine
                                                                            "Text Slider" + "Only Slider" On Product
                                                                            Page </label>
                                                                    </div>

                                                                </div>
                                                            </div> -->

                                                                    <!-- <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <span class="label-title">Banner Options </span>
                                                                    <span class="label-title">Choose Banner </span>
                                                                    <div class="mt-2 mb-2">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="OnlySlider" value="No">
                                                                            <label class="form-check-label" for="OnlySlider">Only Slider </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="TextBanner" value="No">
                                                                            <label class="form-check-label" for="TextBanner"> Text Banner</label>
                                                                        </div>

                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ownDesigns" value="No">
                                                                            <label class="form-check-label" for="ownDesigns"> Our own designs &
                                                                                text </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ImagesAdmin" value="No">
                                                                            <label class="form-check-label" for="ImagesAdmin">Images with Admin
                                                                                text</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DefaultHomePage" value="No">
                                                                            <label class="form-check-label" for="DefaultHomePage">Default From
                                                                                HomePage Section</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="NoBanner" value="No">
                                                                            <label class="form-check-label" for="NoBanner"> No Banner to be
                                                                                displayed</label>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                                    <!-- <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <span class="label-title">Upload Full Slider Image</span>

                                                                    <label class="file-upload-sec">
                                                                        <input type="file" hidden="">
                                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                                    </label>
                                                                    <div class="uploaded-image">
                                                                        <button class="btn btn-close" type="button">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                        <img class="upload-img" src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dmlld3xlbnwwfHwwfHw%3D&amp;ixlib=rb-1.2.1&amp;w=1000&amp;q=80">
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="button-action justify-content-start">
                                                                <button type="submit" class="btn btn-info mr-2">Save</button>
                                                                <button type="button" class="btn btn-default">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
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

        imagePreview(pimage, pimage_pre);
        imagePreview(header_image, header_image_pre);
        imagePreview(delivery_image, delivery_image_pre);
        imagePreview(flash_disabled_image, flash_disabled_image_pre);
        imagePreview(discount_txt_img, discount_txt_img_pre);

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