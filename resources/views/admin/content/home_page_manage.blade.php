@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Homepage</h3>
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
            <div class="spec-details">

                <div class="card card-outline card-info p-3">
 

                    <h3 class="heading">Please choose the section that you want to edit</h3>
                    <div class="section-edit">
                        <div class="card single-card">
                            <h3>Blinds4UK Homepage</h3>
                            <a href="{{route('home_page_slide_form')}}" class="list-items"> H1 & H2 Elements - Header & Body titles- max 1051px Section  --x</a>
                            <a href="{{route('product_thumbnail')}}" class="list-items">Product Thumbnail</a>
                            <a href="{{route('thumb_sale_img')}}" class="list-items"> Thumb Sale Image</a>
                            <a href="{{route('big_thumb_sale_img')}}" class="list-items"> Big Thumb Sale Image --x</a>
                            <a href="{{route('top_slider_img')}}" class="list-items">Top Slider Images --x</a>
                            

                        </div>
                        <div class="card single-card">
                            <h3>Images</h3>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">publishing software like Aldus PageMaker including versions
                                of Lorem Ipsum. --x</a>

                        </div>
                        <div class="card single-card">
                            <h3>Footer Header Links</h3>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">publishing software like Aldus PageMaker including versions
                                of Lorem Ipsum. --x</a>

                        </div>
                        <div class="card single-card">
                            <h3>Misc</h3>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">publishing software like Aldus PageMaker including versions
                                of Lorem Ipsum. --x</a>

                        </div>
                        <div class="card single-card">
                            <h3>Blinds4UK Homepage</h3>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">Lorem Ipsum is simply dummy text of the printing --x</a>
                            <a href="#" class="list-items">publishing software like Aldus PageMaker including versions
                                of Lorem Ipsum. --x</a>

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


        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop