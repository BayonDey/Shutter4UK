@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <?php
        
        use App\Utility;
        
        if (empty($pCat)) {
            $pageHeading = 'Add Product Category';
            $id = 0;
            // $product_type_id
            $name = '';
            $louvres_only_available = $parent_id = $assign_template_id = $image_logo = $circle_logoimage = $x = 0;
            $searchrslt = 'Y';
            $promote_to_front = 't';
            $brandname = $description = $AltTag_MainImg = '';
            $TagCloudKeyworkOrPhase = $TagCloudMeasurement = $tag_cloud = $TagCloudAreaOrPostCodes = '';
            $Delivery_Text = $textforpdf = '';
            $thumbnail1_description = $thumbnail2_description = $thumbnail3_description = '';
            $op_extra_promo_code = $code = '';
            $start_date = $end_date = date('Y-m-d');
            $discount_text = $Delivery_Text_TOP = $Delivery_Text_BOTTOM = '';
            $choosetemplateoption = 'MFS';
            $productfeature_text_1 = $productfeature_text_2 = $productfeature_text_3 = $productfeature_text_4 = $productfeature_text_5 = '';
            $productfeature_text_6 = $productfeature_text_7 = $productfeature_text_8 = $productfeature_text_9 = $productfeature_text_10 = '';
            $f_footer_scroll = 'E';
            $collectionlogooption = 'UploadLogo';
        
            $f_scroll_content = '';
            $image_name = $first_swatch_image = $first_swatch_UploadPDF = $second_swatch_image = $second_swatch_UploadPDF = '';
            $third_swatch_image = $third_swatch_UploadPDF = $leftcornerimage = $f_scroll_image = $express_delivery = $saleimage = '';
        } else {
            $pageHeading = 'Edit Product Category';
            $id = $pCat->id;
            $product_type_id = $pCat->product_type_id;
            $assign_template_id = $pCat->assign_template_id;
            $name = $pCat->name;
            $image_logo = $pCat->image_logo;
            $louvres_only_available = $pCat->louvres_only_available;
            $parent_id = $pCat->parent_id;
            $searchrslt = $pCat->searchrslt;
            $promote_to_front = $pCat->promote_to_front;
            $brandname = $pCat->brandname;
            $description = $pCat->description;
            $AltTag_MainImg = $pCat->AltTag_MainImg;
            $TagCloudKeyworkOrPhase = $pCat->TagCloudKeyworkOrPhase;
            $TagCloudMeasurement = $pCat->TagCloudMeasurement;
            $tag_cloud = $pCat->tag_cloud;
            $TagCloudAreaOrPostCodes = $pCat->TagCloudAreaOrPostCodes;
            $Delivery_Text = $pCat->Delivery_Text;
            $textforpdf = $pCat->textforpdf;
            $thumbnail1_description = $pCat->thumbnail1_description;
            $thumbnail2_description = $pCat->thumbnail2_description;
            $thumbnail3_description = $pCat->thumbnail3_description;
            $op_extra_promo_code = $pCat->op_extra_promo_code;
            $code = $pCat->code;
            $x = $pCat->x;
            $start_date = $pCat->start_date;
            $end_date = $pCat->end_date;
            $discount_text = $pCat->discount_text;
            $Delivery_Text_TOP = $pCat->Delivery_Text_TOP;
            $Delivery_Text_BOTTOM = $pCat->Delivery_Text_BOTTOM;
            $choosetemplateoption = $pCat->choosetemplateoption;
            $productfeature_text_1 = $pCat->productfeature_text_1;
            $productfeature_text_2 = $pCat->productfeature_text_2;
            $productfeature_text_3 = $pCat->productfeature_text_3;
            $productfeature_text_4 = $pCat->productfeature_text_4;
            $productfeature_text_5 = $pCat->productfeature_text_5;
            $productfeature_text_6 = $pCat->productfeature_text_6;
            $productfeature_text_7 = $pCat->productfeature_text_7;
            $productfeature_text_8 = $pCat->productfeature_text_8;
            $productfeature_text_9 = $pCat->productfeature_text_9;
            $productfeature_text_10 = $pCat->productfeature_text_10;
            $f_footer_scroll = $pCat->f_footer_scroll;
            $f_scroll_content = $pCat->f_scroll_content;
            $collectionlogooption = $pCat->collectionlogooption;
            $image_name = $pCat->image_name;
            $circle_logoimage = $pCat->circle_logoimage;
            $first_swatch_image = $pCat->first_swatch_image;
            $first_swatch_UploadPDF = $pCat->first_swatch_UploadPDF;
            $second_swatch_image = $pCat->second_swatch_image;
            $second_swatch_UploadPDF = $pCat->second_swatch_UploadPDF;
            $third_swatch_image = $pCat->third_swatch_image;
            $third_swatch_UploadPDF = $pCat->third_swatch_UploadPDF;
            $leftcornerimage = $pCat->leftcornerimage;
            $f_scroll_image = $pCat->f_scroll_image;
            $express_delivery = $pCat->express_delivery;
            $saleimage = $pCat->saleimage;
        }
        
        $image_name_ph = Utility::filePathShow($image_name, 'v2_categories');
        $first_swatch_image_ph = Utility::filePathShow($first_swatch_image, 'v2_categories');
        $first_swatch_UploadPDF_ph = Utility::filePathShow($first_swatch_UploadPDF, 'v2_categories');
        $second_swatch_image_ph = Utility::filePathShow($second_swatch_image, 'v2_categories');
        $second_swatch_UploadPDF_ph = Utility::filePathShow($second_swatch_UploadPDF, 'v2_categories');
        $third_swatch_image_ph = Utility::filePathShow($third_swatch_image, 'v2_categories');
        $third_swatch_UploadPDF_ph = Utility::filePathShow($third_swatch_UploadPDF, 'v2_categories');
        $leftcornerimage_ph = Utility::filePathShow($leftcornerimage, 'v2_categories');
        $f_scroll_image_ph = Utility::filePathShow($f_scroll_image, 'v2_categories');
        $express_delivery_ph = Utility::filePathShow($express_delivery, 'v2_categories');
        $saleimage_ph = Utility::filePathShow($saleimage, 'v2_categories');
        
        ?>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>{{ $pageHeading }}</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="fas fa-home"></i> Home</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                <a href="{{ route('product', ['type' => $product_type_id]) }}" class="btn btn-primary">
                    << Back to list</a>

                        <form class="mt-4" action="{{ route('store_product_category') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- main details --}}
                            <div class="card card-outline card-info spec-details">
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="card-body">
                                    <h3 class="heading">Category Details</h3>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <span class="label-title">Product Type</span>

                                                <select name="product_type_id" class="form-control select2 product_type_id">
                                                    @foreach ($pTypes as $pType)
                                                        <option value="{{ $pType->id }}"
                                                            {{ $product_type_id == $pType->id ? 'selected' : '' }}>
                                                            {{ $pType->pname }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <span class="label-title">Name</span>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $name }}">
                                                @if ($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                                <small class="form-text d-flex justify-content-between align-items-center">
                                                    <div class="radio-part">
                                                        <span class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="louvres_only_available"
                                                                {{ $louvres_only_available == 1 ? 'checked' : '' }}
                                                                id="louvres_only_available">
                                                            <label class="form-check-label"
                                                                for="louvres_only_available">Louvres
                                                                Only Available </label>
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
                                                    <option value="t" {{ $promote_to_front == 't' ? 'selected' : '' }}>
                                                        Yes
                                                    </option>
                                                    <option value="f" {{ $promote_to_front == 'f' ? 'selected' : '' }}>
                                                        No</option>
                                                </select>

                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="switch_frontAll"
                                                        id="Promote">
                                                    <small class="form-check-label" for="Promote"> All Swatches (Promote to
                                                        front)
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title"> Display in Search
                                                    Results</span>
                                                <div class="radio-part form-control">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="searchrslt"
                                                            id="searchrslt1" value="Y"
                                                            {{ $searchrslt == 'Y' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="searchrslt1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="searchrslt"
                                                            id="searchrslt2" value="N"
                                                            {{ $searchrslt == 'N' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="searchrslt2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Brand Name </span>
                                                <input type="text" name="brandname" placeholder="Brand name"
                                                    value="{{ $brandname }}" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Parent Category</span>
                                                <select class="select2 form-control parent_id" name="parent_id">
                                                    <option value="0">None</option>
                                                    @foreach ($pParentCat as $parent)
                                                        <option value="{{ $parent->id }}"
                                                            {{ $parent_id == $parent->id ? 'selected' : '' }}>
                                                            {{ $parent->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Description</span>
                                                <textarea name="description" class="form-control ckeditor" rows="3"
                                                    placeholder="Description...">{{ $description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span class="label-title mb-0">Tag Cloud - Keywords & Phrases</span>

                                                </div>
                                                <textarea name="TagCloudKeyworkOrPhase" class="form-control" rows="3"
                                                    placeholder="Tag Cloud - Keywords & Phrases...">{{ $TagCloudKeyworkOrPhase }}</textarea>
                                                <span class="text-info" data-toggle="collapse"
                                                    data-target="#collapseExample" aria-expanded="false"
                                                    aria-controls="collapseExample" style="cursor: pointer;">Add more</span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="collapse" id="collapseExample">
                                                <div class="card card-body">
                                                    <h3 class="heading">Add more tags</h3>
                                                    <div class="form-group">
                                                        <span class="label-title ">Tag Cloud - Measurements</span>
                                                        <textarea class="form-control" name="TagCloudMeasurement" rows="3"
                                                            placeholder="Tag Cloud - Keywords & Phrases...">{{ $TagCloudMeasurement }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <span class="label-title ">Tag Cloud - Towns & Cities</span>
                                                        <textarea class="form-control" name="tag_cloud" rows="3"
                                                            placeholder="Tag Cloud - Towns & Cities...">{{ $tag_cloud }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <span class="label-title ">Tag Cloud - Post Codes</span>
                                                        <textarea class="form-control" name="TagCloudAreaOrPostCodes"
                                                            rows="3"
                                                            placeholder="Tag Cloud - Towns & Cities...">{{ $TagCloudAreaOrPostCodes }}</textarea>
                                                    </div>
                                                    <span class="text-info" data-toggle="collapse"
                                                        data-target="#collapseExample" aria-expanded="false"
                                                        aria-controls="collapseExample"
                                                        style="cursor: pointer;">Close</span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="add-more-data mb-3">
                                                <h3 class="heading">Image uploads</h3>

                                                <div class="form-group mb-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="col-md-12 mb-2 row">
                                                                <div class="col-md-4">
                                                                    <span class="label-title">Image</span>
                                                                    <label class="file-upload-sec">
                                                                        <input type="file" name="image_name" id="image_name"
                                                                            accept="image/*" hidden="">
                                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="uploaded-image">
                                                                        <img class="upload-img"
                                                                            src="{{ $image_name_ph }}"
                                                                            id="image_name_pre">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group  ">
                                                                <span class="label-title">Alt Tag</span>
                                                                <input type="text" name="AltTag_MainImg"
                                                                    class="form-control" value="{{ $AltTag_MainImg }}"
                                                                    placeholder="Alt tag">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <span class="label-title">Circle Images
                                                                    <button class="btn btn-outline-info" type="button"
                                                                        data-toggle="collapse" data-target="#ShowImages"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseExample">
                                                                        Show Images for change
                                                                    </button>
                                                                </span>
                                                                <div class="collapse mt-3" id="ShowImages">
                                                                    <div class="card card-body">
                                                                        <div class="card circleimage-wrap">
                                                                            <img src=" " class="logo-img">
                                                                            <div class="form-check">
                                                                                <input type="radio" name="circle_logoimage"
                                                                                    class="form-check-input"
                                                                                    id="imageDesc1"
                                                                                    {{ $circle_logoimage == 0 ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="imageDesc1">None</label>
                                                                            </div>
                                                                        </div>
                                                                        @if (!empty($collection_images))
                                                                            @foreach ($collection_images as $i => $collImg)
                                                                                @if ($collImg->field_id == 1)

                                                                                    <div class="card circleimage-wrap">
                                                                                        <img src="{{ asset('uploads/v3_collection_images/' . $collImg->image) }}"
                                                                                            class="logo-img">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                name="circle_logoimage"
                                                                                                class="form-check-input"
                                                                                                id="imageCollDesc11{{ $i }}"
                                                                                                value="{{ $collImg->id }}"
                                                                                                {{ $circle_logoimage == $collImg->id ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="imageCollDesc11{{ $i }}">{{ $collImg->name }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif

                                                                            @endforeach
                                                                        @endif
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <span class="label-title">Choose Option</span>
                                                                <div class="mt-2 mb-2 form-control">
                                                                    <div class="form-check form-check-inline">
                                                                        <input
                                                                            class="form-check-input collectionlogooption"
                                                                            type="radio" name="collectionlogooption"
                                                                            id="UploadLogo" value="UploadLogo"
                                                                            {{ $collectionlogooption == 'UploadLogo' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="UploadLogo">Upload Logo</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input
                                                                            class="form-check-input collectionlogooption"
                                                                            type="radio" name="collectionlogooption"
                                                                            id="UploadSale" value="UploadSaleImage"
                                                                            {{ $collectionlogooption == 'UploadSaleImage' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="UploadSale">Upload Sale Image</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input
                                                                            class="form-check-input collectionlogooption"
                                                                            type="radio" name="collectionlogooption"
                                                                            id="DefaultImage" value="ShowFrmDefaultSec"
                                                                            {{ $collectionlogooption == 'ShowFrmDefaultSec' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="DefaultImage">Default Image</label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-group upload_logo_content">
                                                                <span class="label-title">Logo:
                                                                    <button class="btn btn-outline-info  collapsed"
                                                                        type="button" data-toggle="collapse"
                                                                        data-target="#ShowImages_logo" aria-expanded="false"
                                                                        aria-controls="collapseExample">
                                                                        Show Images for change
                                                                    </button>
                                                                </span>
                                                                <div class="mt-3 collapse" id="ShowImages_logo">
                                                                    <div class="card card-body">
                                                                        <div class="card circleimage-wrap">
                                                                            <img src=" " class="logo-img">
                                                                            <div class="form-check">
                                                                                <input type="radio" name="image_logo"
                                                                                    class="form-check-input"
                                                                                    id="imageCollDesc001" value="0"
                                                                                    {{ $image_logo == 0 ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="imageDesc1">None</label>
                                                                            </div>
                                                                        </div>
                                                                        @if (!empty($collection_images))
                                                                            @foreach ($collection_images as $i => $collImg)
                                                                                @if ($collImg->field_id == 2)

                                                                                    <div class="card circleimage-wrap">
                                                                                        <img src="{{ asset('uploads/v3_collection_images/' . $collImg->image) }}"
                                                                                            class="logo-img">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                name="image_logo"
                                                                                                class="form-check-input"
                                                                                                id="imageCollDesc{{ $i }}"
                                                                                                value="{{ $collImg->id }}"
                                                                                                {{ $image_logo == $collImg->id ? 'checked' : '' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="imageCollDesc{{ $i }}">{{ $collImg->name }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif

                                                                            @endforeach
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="col-md-12 mb-2 row upload_sale_image">
                                                                    <div class="col-md-4">
                                                                        <span class="label-title">Upload Sale
                                                                            Image</span>
                                                                        <label class="file-upload-sec">
                                                                            <input type="file" name="saleimage"
                                                                                id="saleimage" accept="image/*" hidden="">
                                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="uploaded-image">
                                                                            <img class="upload-img"
                                                                                src="{{ $saleimage_ph }}"
                                                                                id="saleimage_pre">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <div class="col-md-12 mb-2 row">
                                                                                <div class="col-md-4">
                                                                                    <span class="label-title">Express
                                                                                        Delivery</span>
                                                                                    <label class="file-upload-sec">
                                                                                        <input type="file"
                                                                                            name="express_delivery"
                                                                                            id="express_delivery"
                                                                                            accept="image/*" hidden="">
                                                                                        <i
                                                                                            class="fas fa-cloud-upload-alt"></i>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="uploaded-image">
                                                                                        <img class="upload-img"
                                                                                            src="{{ $express_delivery_ph }}"
                                                                                            id="express_delivery_pre">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group  ">
                                                                                <span class="label-title">Express
                                                                                    Delivery Text </span>
                                                                                <input type="text" name="Delivery_Text"
                                                                                    value="{{ $Delivery_Text }}"
                                                                                    class="form-control">

                                                                            </div>
                                                                            <div class="form-group  ">
                                                                                <span class="label-title">Text For PDF
                                                                                </span>
                                                                                <input type="text" name="textforpdf"
                                                                                    class="form-control"
                                                                                    value="{{ $textforpdf }}">

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <hr />
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <div class="col-md-12 mb-2 row">
                                                                                <div class="col-md-4">
                                                                                    <span class="label-title">Swatch
                                                                                        Image 1</span>
                                                                                    <label class="file-upload-sec">
                                                                                        <input type="file"
                                                                                            name="first_swatch_image"
                                                                                            id="first_swatch_image"
                                                                                            accept="image/*" hidden="">
                                                                                        <i
                                                                                            class="fas fa-cloud-upload-alt"></i>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="uploaded-image">
                                                                                        <img class="upload-img"
                                                                                            src="{{ $first_swatch_image_ph }}"
                                                                                            id="first_swatch_image_pre">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-7 row">
                                                                            <div class="col-md-3">
                                                                                <span class="label-title">Upload Image
                                                                                    PDF </span>

                                                                                <label class="file-upload-sec">
                                                                                    <input type="file"
                                                                                        name="first_swatch_UploadPDF"
                                                                                        id="first_swatch_UploadPDF"
                                                                                        accept="image/*" hidden>
                                                                                    <i class="fas fa-file-pdf"></i>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <span class="label-title">Swatch Image 1
                                                                                    Description</span>
                                                                                <textarea name="thumbnail1_description"
                                                                                    rows="3"
                                                                                    class="form-control">{{ $thumbnail1_description }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <hr />


                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <div class="col-md-12 mb-2 row">
                                                                                <div class="col-md-4">
                                                                                    <span class="label-title">Swatch
                                                                                        Image 2</span>
                                                                                    <label class="file-upload-sec">
                                                                                        <input type="file"
                                                                                            name="second_swatch_image"
                                                                                            id="second_swatch_image"
                                                                                            accept="image/*" hidden="">
                                                                                        <i
                                                                                            class="fas fa-cloud-upload-alt"></i>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="uploaded-image">
                                                                                        <img class="upload-img"
                                                                                            src="{{ $second_swatch_image_ph }}"
                                                                                            id="second_swatch_image_pre">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-7 row">
                                                                            <div class="col-md-3">
                                                                                <span class="label-title">Upload Image
                                                                                    PDF </span>

                                                                                <label class="file-upload-sec">
                                                                                    <input type="file"
                                                                                        name="second_swatch_UploadPDF"
                                                                                        id="second_swatch_UploadPDF"
                                                                                        accept="image/*" hidden>
                                                                                    <i class="fas fa-file-pdf"></i>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <span class="label-title">Swatch Image 2
                                                                                    Description</span>
                                                                                <textarea name="thumbnail2_description"
                                                                                    rows="3"
                                                                                    class="form-control">{{ $thumbnail2_description }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <hr />


                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <div class="col-md-12 mb-2 row">
                                                                                <div class="col-md-4">
                                                                                    <span class="label-title">Swatch
                                                                                        Image 3</span>
                                                                                    <label class="file-upload-sec">
                                                                                        <input type="file"
                                                                                            name="third_swatch_image"
                               5                                                             id="third_swatch_image"
                                                                                            accept="image/*" hidden="">
                                                                                        <i
                                                                                            class="fas fa-cloud-upload-alt"></i>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="uploaded-image">
                                                                                        <img class="upload-img"
                                                                                            src="{{ $third_swatch_image_ph }}"
                                                                                            id="third_swatch_image_pre">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-7 row">
                                                                            <div class="col-md-3">
                                                                                <span class="label-title">Upload Image
                                                                                    PDF </span>

                                                                                <label class="file-upload-sec">
                                                                                    <input type="file"
                                                                                        name="third_swatch_UploadPDF"
                                                                                        id="third_swatch_UploadPDF"
                                                                                        accept="image/*" hidden>
                                                                                    <i class="fas fa-file-pdf"></i>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <span class="label-title">Swatch Image 3
                                                                                    Description</span>
                                                                                <textarea name="thumbnail3_description"
                                                                                    rows="3"
                                                                                    class="form-control">{{ $thumbnail3_description }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="col-md-12">
                                                <div class="add-more-data mb-3">
                                                    <h3 class="heading">Extra Promotional Discount Code</h3>
                                                    <small class="text-red d-block"> Note: if code used here this will
                                                        overide swatches
                                                    </small>
                                                    <div class="row mt-3">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <span class="label-title">Choose Options</span>
                                                                <div class="mt-2 mb-2 form-control">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="op_extra_promo_code" id="Chooseoptions1"
                                                                            value="Y"
                                                                            {{ $op_extra_promo_code == 'Y' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="Chooseoptions1">Enable
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="op_extra_promo_code" id="Chooseoptions12"
                                                                            value="N"
                                                                            {{ $op_extra_promo_code == 'N' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="Chooseoptions12">Disable</label>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <span class="label-title">Discount Code</span>
                                                                <input class="form-control" name="code" type="text"
                                                                    value="{{ $code }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <span class="label-title">Percentage Off (%)</span>
                                                                <input class="form-control" name="x" type="text"
                                                                    value="{{ $x }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <!-- <div class="form-group">
                                                        <span class="label-title">Alt Tag</span>
                                                        <input class="form-control" name="Discount_Image_Alt" type="text" value="">
                                                    </div> -->
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <span class="label-title">Start Date</span>
                                                                <input class="form-control" name="start_date" type="date"
                                                                    value="{{ $start_date }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <span class="label-title">End Date</span>
                                                                <input class="form-control" name="end_date" type="date"
                                                                    value="{{ $end_date }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <span class="label-title">Discount Text</span>
                                                                <input class="form-control" name="discount_text"
                                                                    value="{{ $discount_text }}" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <span class="label-title">Delivery Text Top</span>
                                                                <input class="form-control" name="Delivery_Text_TOP"
                                                                    value="{{ $Delivery_Text_TOP }}" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <span class="label-title">Delivery Text Bottom</span>
                                                                <input class="form-control" name="Delivery_Text_BOTTOM"
                                                                    value="{{ $Delivery_Text_BOTTOM }}" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col-md-12 mb-2 row">
                                                                <div class="col-md-4">
                                                                    <span class="label-title">Left Corner Image</span>
                                                                    <label class="file-upload-sec">
                                                                        <input type="file" name="leftcornerimage"
                                                                            id="leftcornerimage" accept="image/*" hidden="">
                                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="uploaded-image">
                                                                        <img class="upload-img"
                                                                            src="{{ $leftcornerimage_ph }}"
                                                                            id="leftcornerimage_pre">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-12">
                                                            <hr>
                                                            <h3 class="heading">Choose Template Option</h3>
                                                            <div class="form-group">

                                                                <div class="card card-body">
                                                                    <div class="mt-2 mb-2 form-control">
                                                                        <div class="form-check form-check-inline">
                                                                            <input
                                                                                class="form-check-input choosetemplateoption"
                                                                                type="radio" name="choosetemplateoption"
                                                                                id="SwatchLevel" value="MFS"
                                                                                {{ $choosetemplateoption == 'MFS' ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="SwatchLevel">Manage
                                                                                From Swatch Level</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input
                                                                                class="form-check-input choosetemplateoption"
                                                                                type="radio" name="choosetemplateoption"
                                                                                id="CollectionLevel" value="MFC"
                                                                                {{ $choosetemplateoption == 'MFC' ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="CollectionLevel">Manage
                                                                                From Collection Level </label>
                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group assign_template_content">
                                                                        <span class="subheading">Assign Template
                                                                        </span>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <small class="d-block mb-1 text-success">
                                                                                    Please select product template to assign
                                                                                </small>
                                                                                <select name="assign_template_id"
                                                                                    class="form-control select2">
                                                                                    <option value="0">Select...</option>
                                                                                    @foreach ($pTemplate as $template)
                                                                                        <option
                                                                                            value="{{ $template->id }}"
                                                                                            {{ $assign_template_id == $template->id ? 'selected' : '' }}>
                                                                                            {{ $template->name }}
                                                                                        </option>
                                                                                    @endforeach

                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>

                                                                <div class="card card-body">
                                                                    <div class="form-group">
                                                                        <span class="subheading">Product
                                                                            features</span>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <small class="form-check-label mb-1">
                                                                                        Text-1
                                                                                    </small>
                                                                                    <input class="form-control"
                                                                                        name="productfeature_text_1"
                                                                                        value="{{ $productfeature_text_1 }}"
                                                                                        type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <small class="form-check-label mb-1">
                                                                                        Text-2
                                                                                    </small>
                                                                                    <input class="form-control"
                                                                                        name="productfeature_text_2"
                                                                                        value="{{ $productfeature_text_2 }}"
                                                                                        type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <small class="form-check-label mb-1">
                                                                                        Text-3
                                                                                    </small>
                                                                                    <input class="form-control"
                                                                                        name="productfeature_text_3"
                                                                                        value="{{ $productfeature_text_3 }}"
                                                                                        type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <small class="form-check-label mb-1">
                                                                                        Text-4
                                                                                    </small>
                                                                                    <input class="form-control"
                                                                                        name="productfeature_text_4"
                                                                                        value="{{ $productfeature_text_4 }}"
                                                                                        type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <small class="form-check-label mb-1">
                                                                                        Text-5
                                                                                    </small>
                                                                                    <input class="form-control"
                                                                                        name="productfeature_text_5"
                                                                                        value="{{ $productfeature_text_5 }}"
                                                                                        type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <small class="form-check-label mb-1">
                                                                                        Text-6
                                                                                    </small>
                                                                                    <input class="form-control"
                                                                                        name="productfeature_text_6"
                                                                                        value="{{ $productfeature_text_6 }}"
                                                                                        type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <small class="form-check-label mb-1">
                                                                                        Text-7
                                                                                    </small>
                                                                                    <input class="form-control"
                                                                                        name="productfeature_text_7"
                                                                                        value="{{ $productfeature_text_7 }}"
                                                                                        type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <small class="form-check-label mb-1">
                                                                                        Text-8
                                                                                    </small>
                                                                                    <input class="form-control"
                                                                                        name="productfeature_text_8"
                                                                                        value="{{ $productfeature_text_8 }}"
                                                                                        type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <small class="form-check-label mb-1">
                                                                                        Text-9
                                                                                    </small>
                                                                                    <input class="form-control"
                                                                                        name="productfeature_text_9"
                                                                                        value="{{ $productfeature_text_9 }}"
                                                                                        type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <small class="form-check-label mb-1">
                                                                                        Text-10
                                                                                    </small>
                                                                                    <input class="form-control"
                                                                                        name="productfeature_text_10"
                                                                                        value="{{ $productfeature_text_10 }}"
                                                                                        type="text">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                                <div class="button-action justify-content-start">
                                                                    <a
                                                                        href="{{ route('product', ['type' => $product_type_id]) }}"><button
                                                                            type="button"
                                                                            class="btn btn-default">Cancel</button></a>

                                                                    <button type="submit"
                                                                        class="btn btn-info mr-2">Save</button>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-12">
                                                                <hr>
                                                                <h3 class="heading">Image for Footer Scroll</h3>
                                                                <div class="row">
                                                                    <div class="col-md-5">

                                                                        <div class="form-group">
                                                                            <span class="label-title">Footer
                                                                                Scroll</span>
                                                                            <div class="mt-2 mb-2 form-control">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="f_footer_scroll"
                                                                                        id="ScrollEnable" value="E"
                                                                                        {{ $f_footer_scroll == 'E' ? 'checked' : '' }}>
                                                                                    <label class="form-check-label"
                                                                                        for="ScrollEnable">Enable</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="f_footer_scroll"
                                                                                        id="ScrollDisable" value="D"
                                                                                        {{ $f_footer_scroll == 'D' ? 'checked' : '' }}>
                                                                                    <label class="form-check-label"
                                                                                        for="ScrollDisable">Disable</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 mb-2 row">
                                                                            <div class="col-md-4">
                                                                                <span class="label-title">Scroll Image
                                                                                    <!-- <br><small class="text-danger">(Size: 370px x 370px)</small> -->
                                                                                </span>
                                                                                <label class="file-upload-sec">
                                                                                    <input type="file" name="f_scroll_image"
                                                                                        id="f_scroll_image" accept="image/*"
                                                                                        hidden="">
                                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="uploaded-image">
                                                                                    <img class="upload-img"
                                                                                        src="{{ $f_scroll_image_ph }}"
                                                                                        id="f_scroll_image_pre">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-7">

                                                                        <div class="form-group">
                                                                            <span class="label-title">Scroll
                                                                                Content</span>
                                                                            <textarea class="form-control ckeditor"
                                                                                type="text" name="f_scroll_content"
                                                                                rows="1">{{ $f_scroll_content }}</textarea>
                                                                        </div>

                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="button-action justify-content-start">
                                                    <a href="{{ route('product', ['type' => $product_type_id]) }}"><button
                                                            type="button" class="btn btn-default">Cancel</button></a>
                                                    <button type="submit" class="btn btn-info mr-2">Save</button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                        </form>
            </div>
        </div>

    </div>


@endsection


@section('page-script')
    <script type="text/javascript">
        $(document).ready(function() {
            var base_url = "<?php echo URL::to('/') . '/admin'; ?>";

            $('.product_type_id').change(function() {
                var product_type_id = $(".product_type_id").val();
                $.ajax({
                    type: 'GET',
                    url: base_url + '/get_pro_cat_by_type_id_ajax/' + product_type_id,
                    success: function(data) {
                        $(".parent_id").html(data);
                    }
                });
            });


            $(".assign_template_content").hide();

            $(".choosetemplateoption").click(function() {
                var choosetemplateoption = $(this).val();
                if (choosetemplateoption == 'MFC') {
                    $(".assign_template_content").show();
                } else {
                    $(".assign_template_content").hide();
                }
            });

            $(".upload_sale_image").hide();
            $(".collectionlogooption").click(function() {
                var collectionlogooption = $(this).val();
                if (collectionlogooption == 'UploadSaleImage') {
                    $(".upload_sale_image").show();
                    $(".upload_logo_content").hide();
                } else {
                    $(".upload_sale_image").hide();
                    $(".upload_logo_content").show();

                }
            });

            //======== Image preview section ========//
            imagePreview(image_name, image_name_pre);
            imagePreview(first_swatch_image, first_swatch_image_pre);
            imagePreview(second_swatch_image, second_swatch_image_pre);
            imagePreview(third_swatch_image, third_swatch_image_pre);
            imagePreview(leftcornerimage, leftcornerimage_pre);
            imagePreview(f_scroll_image, f_scroll_image_pre);
            imagePreview(express_delivery, express_delivery_pre);
            imagePreview(saleimage, saleimage_pre);

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
