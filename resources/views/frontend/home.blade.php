@extends('frontend.layouts.app')
@section('content')

<!-- Carousel Content -->
<!-- Bootstrap Carousel Content Full Screen -->

<section class="carousel-content">
    <div class="container-fuild">
        <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">

                <li data-target="#carouselExampleIndicators1" data-slide-to="0" class=" active "></li>
                <li data-target="#carouselExampleIndicators1" data-slide-to="1" class=" active "></li>
                <li data-target="#carouselExampleIndicators1" data-slide-to="2" class=" active "></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <img class="d-block w-100"
                        src="https://www.blinds4uk.co.uk/static/cms/homepage/SL_TopImgTwo-1429864824.png" width="100%"
                        alt="First slide">

                    <div class="carousel-caption d-none d-md-flex position-center textcontent-center text-white">
                        <div class="text-deco1">
                            {{-- <h2 class="slider-navigation-title">Slider One</h2>
                            <p class="slider-navigation-desc">Slider 1 Text Goes Here</p> --}}
                            <a href="https://rawal.themes-coder.net/shop?category=8"
                                class="slider-navigation-url btn btn-secondary swipe-to-top">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">

                    <img class="d-block w-100"
                        src="https://www.blinds4uk.co.uk/static/cms/homepage/SL_TopImgTwo-1429864824.png" width="100%"
                        alt="First slide">

                    <div class="carousel-caption d-none d-md-flex position-center textcontent-center text-white">
                        <div class="text-deco1">
                            {{-- <h2 class="slider-navigation-title">Slider Two</h2>
                            <p class="slider-navigation-desc">Slider 2 Text Goes Here</p> --}}
                            <a href="https://rawal.themes-coder.net/shop?category=8"
                                class="slider-navigation-url btn btn-secondary swipe-to-top">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">

                    <img class="d-block w-100"
                        src="https://www.blinds4uk.co.uk/static/cms/homepage/SL_TopImgTwo-1429864824.png" width="100%"
                        alt="First slide">

                    <div class="carousel-caption d-none d-md-flex position-center textcontent-center text-white">
                        <div class="text-deco1">
                            {{-- <h2 class="slider-navigation-title">Slider Three</h2>
                            <p class="slider-navigation-desc">Slider 3 Text Goes Here</p> --}}
                            <a href="https://rawal.themes-coder.net/shop?category=8"
                                class="slider-navigation-url btn btn-secondary swipe-to-top">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                <span class="sr-only"></span>
            </a>
        </div>
    </div>
</section>
<!-- Fixed Carousel Content -->

<!-- Banners Content -->
<!-- Products content -->

<!-- Banners Content -->
<section class="banners-content">

    <!-- //banner eight -->
    <div class="banner-eight">

        <div class="container">
            <div class="group-banners">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <figure class="banner-image imagespace">
                                    <a href=""><img class="img-fluid height-270"
                                            src="https://www.blinds4uk.co.uk/images/500x500/blackout-blinds/Envision-Blockout-Shades/Bonford-Dove-Lifestyle.jpg?w=6196"
                                            alt="Banner Image"></a>
                                </figure>
                            </div>
                            <div class="col-12 col-md-6">
                                <figure class="banner-image ">
                                    <a href=""><img class="img-fluid"
                                            src="https://www.blinds4uk.co.uk/images/370x370/office-blinds/Homepage/1633530377_Office_Blinds_vertical_370x370.jpg?w=6196"
                                            alt="Banner Image"></a>
                                </figure>
                            </div>
                            <div class="col-12 col-md-6">
                                <figure class="banner-image ">
                                    <a href=""><img class="img-fluid"
                                            src="https://www.blinds4uk.co.uk/images/300x300/perfect-fit-blackout-blinds/Homepage/1600236782_PF_blackout_370x370.jpg?w=6196"
                                            alt="Banner Image"></a>
                                </figure>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <figure class="banner-image ">
                            <a href=""><img class="img-fluid"
                                    src="https://www.blinds4uk.co.uk/images/370x370/blackout-blinds/Homepage/1633525119_Blackout_Blinds_370x370.jpg?w=6196"
                                    alt="Banner Image"></a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="tabs-content pro-content">
    <div class="container">
        <div class="products-area">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="pro-heading-title">
                        <h2> WELCOME TO STORE </h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi venenatis felis tempus
                            feugiat maximus.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="tabs-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-0">
                    <div class="nav" role="tablist" id="tabCarousel">
                        <a class="nav-link btn show active" data-toggle="tab" href="#featured" role="tab"
                            aria-selected="true"><span data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="Top Sales">Top Sales</span></a>

                        <a class="nav-link btn show" data-toggle="tab" href="#special" role="tab"
                            aria-controls="special" aria-selected="false"><span data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="Special">Special</span></a>


                        <a class="nav-link btn show" data-toggle="tab" href="#liked" role="tab" aria-controls="liked"
                            aria-selected="false"><span data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="Most Liked">Most Liked</span></a>

                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <template id="product-card-template">
                            <div class="div-class">
                                <div class="product product3">
                                    <article>
                                        <div class="thumb">

                                            <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                <div class="icons">

                                                    <a href="javascript:void(0)"
                                                        class="icon active swipe-to-top wishlist-icon"
                                                        data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-original-title="Wishlist">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <div class="icon swipe-to-top quick-view-icon" data-toggle="modal"
                                                        data-target="#quickViewModal" data-tooltip="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="Quick View">
                                                        <i class="fas fa-eye"></i>
                                                    </div>
                                                    <a href="javascript:void(0)" class="icon swipe-to-top compare-icon"
                                                        data-toggle="tooltip" data-placement="bottom" title=""
                                                        data-original-title="Compare"><i class="fas fa-align-right"
                                                            data-fa-transform="rotate-90"></i></a>
                                                </div>

                                            </div>
                                            <div class="mobile-icons d-lg-none d-xl-none">
                                                <div class="icons">
                                                    <div class="icon-liked">
                                                        <a href="javascript:void(0)" class="icon active wishlist-icon">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                    </div>
                                                    <div class="icon quick-view-icon" data-toggle="modal"
                                                        data-target="#quickViewModal"><i class="fas fa-eye"></i></div>
                                                    <a href="javascript:void(0)" class="icon compare-icon"><i
                                                            class="fas fa-align-right"
                                                            data-fa-transform="rotate-90"></i></a>
                                                </div>
                                            </div>
                                            <img class="img-fluid product-card-image" src="" alt="Modern Single Sofa">
                                        </div>

                                        <div class="content  content-relative">
                                            <span class="tag product-card-category">

                                            </span>
                                            <h5 class="title text-center"><a href="javascript:void(0)"
                                                    class="product-card-name"></a></h5>
                                            <p class="para product-card-desc"></p>
                                            <div class="price product-card-price">
                                            </div>
                                            <div class=" btn-hover new-design">
                                                <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                    href="javascript:void(0)" data-toggle="tooltip"
                                                    data-placement="bottom" title=""
                                                    data-original-title="View Detail">View Detail</a>

                                            </div>
                                        </div>




                                    </article>
                                    <div class="d-none display-rating"></div>
                                    <div class="d-none display-rating1"></div>
                                </div>
                            </div>
                        </template>
                        <div role="tabpanel" class="tab-pane fade active show" id="featured">

                            <div class="tab_top_sales slider store ">


                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="13"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="13"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="13"
                                                            data-type="simple" onclick="addCompare(this)"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/perfect-fit-pleated-blinds/Homepage/1602487380_PF_pleated_natural_370x370.jpg?w=6196"
                                                    alt="Perfect Fit Pleated Blinds">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/13/Simple-Product-13"
                                                        class="product-card-name" tabindex="0">Simple Product
                                                        13</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 330.24<span>$ 384</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="13" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class  ">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="1"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="1"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="1" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="0"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-roller-blinds/Homepage/1602487472_intu_roller_370x370.jpg?w=6196"
                                                    alt="Simple Product 1">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's Winter
                                                    Wear</span>
                                                <h5 class="title text-center"><a href="/product/1/"
                                                        class="product-card-name" tabindex="0">Simple
                                                        Product
                                                        1</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 611.84<span>$ 956</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="1" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa active"
                                                for="star_4" title="Awesome - 4 stars"></label><label
                                                class="full fa active" for="star_5" title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa active"
                                                for="star_4" title="Awesome - 4 stars"></label><label
                                                class="full fa active" for="star_5" title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="3"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="3"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="3" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="0"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-pleated-blinds/Homepage/1602486030_INTU_PLEATED__370x370.jpg?w=6196"
                                                    alt="Simple Product 3">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/3/Simple-Product-3"
                                                        class="product-card-name" tabindex="0">Simple Product
                                                        3</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 45.6<span>$ 152</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="3" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="4"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="4"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="4" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="0"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-roller-blinds/Homepage/1602487472_intu_roller_370x370.jpg?w=6196"
                                                    alt="Simple Product 4">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's Tops</span>
                                                <h5 class="title text-center"><a href="/product/4/Simple-Product-4"
                                                        class="product-card-name" tabindex="0">Simple Product
                                                        4</a>
                                                </h5>
                                                <p class="para product-card-desc">لكن لا بد أن أوضح لك أن كل هذه
                                                    الأفكار المغلوطة حو</p>
                                                <div class="price product-card-price">$ 308.28<span>$ 734</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="4" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="7"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="7"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="7" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-venetian-blinds/Homepage/1600236755_INTU_venetian_370x370.jpg?w=6196">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/7/Simple-Product-7"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        7</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 345.45<span>$ 987</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="7" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>

                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="2"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="2"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="2" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/pleated-blinds/Homepage/1602487218_pleated_grey_370x370.jpg?w=6196"
                                                    alt="Simple Product 2">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/2/Simple-Product-2"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        2</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 248.56<span>$ 478</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="2" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="8"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="8"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="8" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/skylight-blinds-for-fakro-blinds/Homepage/1567751535_SKYLIGHT_BLINDS_FOR_FAKRO_500X500.jpg?w=6196"
                                                    alt="Simple Product 8">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/8/Simple-Product-8"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        8</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 291.51<span>$ 711</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="8" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="5"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="5"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="5" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="/gallary/medium2021092440576YsTj19909.jpg"
                                                    alt="Simple Product 5">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/5/Simple-Product-5"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        5</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 258.3<span>$ 630</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="5" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="19"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="19"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="19"
                                                            data-type="simple" onclick="addCompare(this)"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/skylight-blinds-for-velux-blinds/Homepage/1567751606_SKYLIGHT_BLINDS_FOR_VELUX_500X500.jpg?w=6196"
                                                    alt="Simple Product 19">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Men's</span>
                                                <h5 class="title text-center"><a href="/product/19/Simple-Product-19"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        19</a></h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 214.55<span>$ 613</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="19" data-type="simple" tabindex="-1">Add To
                                                        Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="15"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="15"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="15"
                                                            data-type="simple" onclick="addCompare(this)"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="/gallary/medium2021092449141QCrL17512.jpg"
                                                    alt="Simple Product 15">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Men's</span>
                                                <h5 class="title text-center"><a href="/product/15/Simple-Product-15"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        15</a></h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 574</div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="15" data-type="simple" tabindex="-1">Add To
                                                        Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- 1st tab -->
                        </div>
                        <div role="tabpanel" class="tab-pane product-card-templatee fade" id="special">
                            <div class="tab_special_products slider store ">

                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="13"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="13"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="13"
                                                            data-type="simple" onclick="addCompare(this)"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/perfect-fit-pleated-blinds/Homepage/1602487380_PF_pleated_natural_370x370.jpg?w=6196"
                                                    alt="Perfect Fit Pleated Blinds">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/13/Simple-Product-13"
                                                        class="product-card-name" tabindex="0">Simple Product
                                                        13</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 330.24<span>$ 384</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="13" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class  ">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="1"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="1"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="1" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="0"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-roller-blinds/Homepage/1602487472_intu_roller_370x370.jpg?w=6196"
                                                    alt="Simple Product 1">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's Winter
                                                    Wear</span>
                                                <h5 class="title text-center"><a href="/product/1/"
                                                        class="product-card-name" tabindex="0">Simple
                                                        Product
                                                        1</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 611.84<span>$ 956</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="1" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa active"
                                                for="star_4" title="Awesome - 4 stars"></label><label
                                                class="full fa active" for="star_5" title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa active"
                                                for="star_4" title="Awesome - 4 stars"></label><label
                                                class="full fa active" for="star_5" title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="3"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="3"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="3" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="0"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-pleated-blinds/Homepage/1602486030_INTU_PLEATED__370x370.jpg?w=6196"
                                                    alt="Simple Product 3">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/3/Simple-Product-3"
                                                        class="product-card-name" tabindex="0">Simple Product
                                                        3</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 45.6<span>$ 152</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="3" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="4"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="4"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="4" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="0"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-roller-blinds/Homepage/1602487472_intu_roller_370x370.jpg?w=6196"
                                                    alt="Simple Product 4">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's Tops</span>
                                                <h5 class="title text-center"><a href="/product/4/Simple-Product-4"
                                                        class="product-card-name" tabindex="0">Simple Product
                                                        4</a>
                                                </h5>
                                                <p class="para product-card-desc">لكن لا بد أن أوضح لك أن كل هذه
                                                    الأفكار المغلوطة حو</p>
                                                <div class="price product-card-price">$ 308.28<span>$ 734</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="4" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="7"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="7"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="7" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-venetian-blinds/Homepage/1600236755_INTU_venetian_370x370.jpg?w=6196">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/7/Simple-Product-7"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        7</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 345.45<span>$ 987</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="7" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>

                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="2"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="2"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="2" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/pleated-blinds/Homepage/1602487218_pleated_grey_370x370.jpg?w=6196"
                                                    alt="Simple Product 2">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/2/Simple-Product-2"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        2</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 248.56<span>$ 478</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="2" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="8"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="8"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="8" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/skylight-blinds-for-fakro-blinds/Homepage/1567751535_SKYLIGHT_BLINDS_FOR_FAKRO_500X500.jpg?w=6196"
                                                    alt="Simple Product 8">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/8/Simple-Product-8"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        8</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 291.51<span>$ 711</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="8" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="5"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="5"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="5" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="/gallary/medium2021092440576YsTj19909.jpg"
                                                    alt="Simple Product 5">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/5/Simple-Product-5"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        5</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 258.3<span>$ 630</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="5" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="19"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="19"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="19"
                                                            data-type="simple" onclick="addCompare(this)"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/skylight-blinds-for-velux-blinds/Homepage/1567751606_SKYLIGHT_BLINDS_FOR_VELUX_500X500.jpg?w=6196"
                                                    alt="Simple Product 19">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Men's</span>
                                                <h5 class="title text-center"><a href="/product/19/Simple-Product-19"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        19</a></h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 214.55<span>$ 613</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="19" data-type="simple" tabindex="-1">Add To
                                                        Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="15"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="15"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="15"
                                                            data-type="simple" onclick="addCompare(this)"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="/gallary/medium2021092449141QCrL17512.jpg"
                                                    alt="Simple Product 15">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Men's</span>
                                                <h5 class="title text-center"><a href="/product/15/Simple-Product-15"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        15</a></h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 574</div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="15" data-type="simple" tabindex="-1">Add To
                                                        Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- 2nd tab -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="liked">
                            <div class="tab_most_liked slider store ">

                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="13"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="13"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="13"
                                                            data-type="simple" onclick="addCompare(this)"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/perfect-fit-pleated-blinds/Homepage/1602487380_PF_pleated_natural_370x370.jpg?w=6196"
                                                    alt="Perfect Fit Pleated Blinds">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/13/Simple-Product-13"
                                                        class="product-card-name" tabindex="0">Simple Product
                                                        13</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 330.24<span>$ 384</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="13" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class  ">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="1"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="1"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="1" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="0"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-roller-blinds/Homepage/1602487472_intu_roller_370x370.jpg?w=6196"
                                                    alt="Simple Product 1">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's Winter
                                                    Wear</span>
                                                <h5 class="title text-center"><a href="/product/1/"
                                                        class="product-card-name" tabindex="0">Simple
                                                        Product
                                                        1</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 611.84<span>$ 956</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="1" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa active"
                                                for="star_4" title="Awesome - 4 stars"></label><label
                                                class="full fa active" for="star_5" title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa active"
                                                for="star_4" title="Awesome - 4 stars"></label><label
                                                class="full fa active" for="star_5" title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="3"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="3"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="3" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="0"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-pleated-blinds/Homepage/1602486030_INTU_PLEATED__370x370.jpg?w=6196"
                                                    alt="Simple Product 3">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/3/Simple-Product-3"
                                                        class="product-card-name" tabindex="0">Simple Product
                                                        3</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 45.6<span>$ 152</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="3" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="4"
                                                            onclick="addWishlist(this)" data-type="simple" tabindex="0">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="4"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="4" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="0"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="0">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="0"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-roller-blinds/Homepage/1602487472_intu_roller_370x370.jpg?w=6196"
                                                    alt="Simple Product 4">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's Tops</span>
                                                <h5 class="title text-center"><a href="/product/4/Simple-Product-4"
                                                        class="product-card-name" tabindex="0">Simple Product
                                                        4</a>
                                                </h5>
                                                <p class="para product-card-desc">لكن لا بد أن أوضح لك أن كل هذه
                                                    الأفكار المغلوطة حو</p>
                                                <div class="price product-card-price">$ 308.28<span>$ 734</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="4" data-type="simple" tabindex="0">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="7"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="7"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="7" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/intu-venetian-blinds/Homepage/1600236755_INTU_venetian_370x370.jpg?w=6196">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/7/Simple-Product-7"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        7</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 345.45<span>$ 987</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="7" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>

                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="2"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="2"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="2" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/pleated-blinds/Homepage/1602487218_pleated_grey_370x370.jpg?w=6196"
                                                    alt="Simple Product 2">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/2/Simple-Product-2"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        2</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 248.56<span>$ 478</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="2" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="8"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="8"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="8" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/skylight-blinds-for-fakro-blinds/Homepage/1567751535_SKYLIGHT_BLINDS_FOR_FAKRO_500X500.jpg?w=6196"
                                                    alt="Simple Product 8">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/8/Simple-Product-8"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        8</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 291.51<span>$ 711</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="8" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="5"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="5"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="5" data-type="simple"
                                                            onclick="addCompare(this)" tabindex="-1"><i
                                                                class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="/gallary/medium2021092440576YsTj19909.jpg"
                                                    alt="Simple Product 5">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Women's</span>
                                                <h5 class="title text-center"><a href="/product/5/Simple-Product-5"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        5</a>
                                                </h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 258.3<span>$ 630</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="5" data-type="simple" tabindex="-1">Add To Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="19"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="19"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="19"
                                                            data-type="simple" onclick="addCompare(this)"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="https://www.blinds4uk.co.uk/images/300x300/skylight-blinds-for-velux-blinds/Homepage/1567751606_SKYLIGHT_BLINDS_FOR_VELUX_500X500.jpg?w=6196"
                                                    alt="Simple Product 19">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Men's</span>
                                                <h5 class="title text-center"><a href="/product/19/Simple-Product-19"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        19</a></h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 214.55<span>$ 613</span>
                                                </div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="19" data-type="simple" tabindex="-1">Add To
                                                        Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-class">
                                    <div class="product product3">
                                        <article>
                                            <div class="thumb">

                                                <div class="product-hover d-none d-lg-flex d-xl-flex">
                                                    <div class="icons">

                                                        <a href="javascript:void(0)"
                                                            class="icon active swipe-to-top wishlist-icon"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Wishlist" data-id="15"
                                                            onclick="addWishlist(this)" data-type="simple"
                                                            tabindex="-1">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <div class="icon swipe-to-top quick-view-icon"
                                                            data-toggle="modal" data-target="#quickViewModal"
                                                            data-tooltip="tooltip" data-placement="bottom" title=""
                                                            data-original-title="Quick View" data-id="15"
                                                            data-type="simple" onclick="quiclViewData(this)">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Compare" data-id="15"
                                                            data-type="simple" onclick="addCompare(this)"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>

                                                </div>
                                                <div class="mobile-icons d-lg-none d-xl-none">
                                                    <div class="icons">
                                                        <div class="icon-liked">
                                                            <a href="javascript:void(0)"
                                                                class="icon active wishlist-icon" tabindex="-1">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="icon quick-view-icon" data-toggle="modal"
                                                            data-target="#quickViewModal"><i class="fas fa-eye"></i>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon compare-icon"
                                                            tabindex="-1"><i class="fas fa-align-right"
                                                                data-fa-transform="rotate-90"></i></a>
                                                    </div>
                                                </div>
                                                <img class="img-fluid product-card-image"
                                                    src="/gallary/medium2021092449141QCrL17512.jpg"
                                                    alt="Simple Product 15">
                                            </div>

                                            <div class="content  content-relative">
                                                <span class="tag product-card-category">Men's</span>
                                                <h5 class="title text-center"><a href="/product/15/Simple-Product-15"
                                                        class="product-card-name" tabindex="-1">Simple Product
                                                        15</a></h5>
                                                <p class="para product-card-desc">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing</p>
                                                <div class="price product-card-price">$ 574</div>
                                                <div class=" btn-hover new-design">
                                                    <a class="btn  btn-secondary  swipe-to-top product-card-link"
                                                        href="javascript:void(0)" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="View Detail" onclick="addToCart(this)"
                                                        data-id="15" data-type="simple" tabindex="-1">Add To
                                                        Cart</a>

                                                </div>
                                            </div>




                                        </article>
                                        <div class="d-none display-rating"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                        <div class="d-none display-rating1"><label class="full fa " for="star1"
                                                title="Awesome - 1 stars"></label><label class="full fa " for="star_2"
                                                title="Awesome - 2 stars"></label><label class="full fa " for="star_3"
                                                title="Awesome - 3 stars"></label><label class="full fa " for="star_4"
                                                title="Awesome - 4 stars"></label><label class="full fa " for="star_5"
                                                title="Awesome - 5 stars"></label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- 3rd tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Products content -->
<section class="categories-content pro-content">
    <div class="container">
        <div class="products-area">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="pro-heading-title">
                        <h2> PRODUCT CATEGORIES </h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Morbi venenatis felis tempus feugiat maximus. </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="general-product">
        <div class="container p-0">
            <div class="cat1-carousel-js">
                <div class="cat-banner">
                    <a href="https://www.blinds4uk.co.uk/static/images/feedback_start.png">
                        <figure class=" categories-icon">
                            <img class="img-fluid" src="https://www.blinds4uk.co.uk/static/images/feedback_start.png"
                                alt="Test 1">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Product Cat 1</h3>
                            </div>
                        </figure>
                    </a>
                </div>

                <div class="cat-banner">
                    <a href="https://www.blinds4uk.co.uk/static/images/feedback_start.png">
                        <figure class=" categories-icon">
                            <img class="img-fluid" src="https://www.blinds4uk.co.uk/static/images/feedback_start.png"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Product Cat 2</h3>
                            </div>
                        </figure>
                    </a>
                </div>

                <div class="cat-banner">
                    <a href="https://www.blinds4uk.co.uk/static/images/feedback_start.png">
                        <figure class=" categories-icon">
                            <img class="img-fluid" src="https://www.blinds4uk.co.uk/static/images/feedback_start.png"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Product Cat 3</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="cat-banner">
                    <a href="https://www.blinds4uk.co.uk/static/images/feedback_start.png">
                        <figure class=" categories-icon">
                            <img class="img-fluid" src="https://www.blinds4uk.co.uk/static/images/feedback_start.png"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Product Cat 4</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="cat-banner">
                    <a href="https://www.blinds4uk.co.uk/static/images/feedback_start.png">
                        <figure class=" categories-icon">
                            <img class="img-fluid" src="https://www.blinds4uk.co.uk/static/images/feedback_start.png"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Product Cat 5</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="cat-banner">
                    <a href="https://www.blinds4uk.co.uk/static/images/feedback_start.png">
                        <figure class=" categories-icon">
                            <img class="img-fluid" src="https://www.blinds4uk.co.uk/static/images/feedback_start.png"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Product Cat 6</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="cat-banner">
                    <a href="https://www.blinds4uk.co.uk/static/images/feedback_start.png">
                        <figure class=" categories-icon">
                            <img class="img-fluid" src="https://www.blinds4uk.co.uk/static/images/feedback_start.png"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Product Cat 7</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="cat-banner">
                    <a href="https://www.blinds4uk.co.uk/static/images/feedback_start.png">
                        <figure class=" categories-icon">
                            <img class="img-fluid" src="https://www.blinds4uk.co.uk/static/images/feedback_start.png"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Product Cat 8</h3>
                            </div>
                        </figure>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="tri-banners-content pro-content">


    <div class="fullwidth-banner"
        style="background-image: url('https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2020/11/C4mLx18506.jpg') ">
        <div class="parallax-banner-text">
            <div class="parallax-banner-text">
                <h2> Food Festival</h2>
                <h4>Ramadan Special</h4>
                <div class="hover-link">
                    <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom"
                        title="" data-original-title="View All Range">Shop Now</a>
                </div>
            </div>
        </div>
    </div>



</div>

<section class="new-products-content pro-content">
    <div class="container">
        <div class="products-area">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="pro-heading-title">
                        <h2> Top Selling of the Week
                        </h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Morbi venenatis felis tempus feugiat maximus. </p>
                    </div>
                </div>
            </div>
            <div class="row ">



            </div>
        </div>
    </div>
</section>
<div class="tri-banners-content pro-content">



    <div class="fullwidth-banner"
        style="background-image: url('https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2020/11/C4mLx18506.jpg') ">
        <div class="parallax-banner-text">
            <div class="parallax-banner-text">
                <h2> Fresh Fruits & Vegetables</h2>
                <h4>Farm Fresh</h4>
                <div class="hover-link">
                    <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom"
                        title="" data-original-title="View All Range">View All Range</a>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- Products content -->

<section class="new-products-content pro-content">
    <div class="container">
        <div class="products-area">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="pro-heading-title">
                        <h2> NEW ARRIVAL </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Morbi venenatis felis tempus feugiat maximus. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <!-- Product -->
                    <div class="product product11">
                        <article>
                            <div class="thumb">
                                <div class="badges">




                                </div>
                                <div class="producthover ">
                                    <div class="icons">


                                        <a href="javascript:void(0)" class="icon active swipe-to-top is_liked"
                                            products_id="4" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>

                                        <div class="icon swipe-to-top modal_show" products_id="4" data-toggle="tooltip"
                                            data-placement="bottom" title="Quick View">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <a onclick="myFunction3(4)" class="btn-secondary icon swipe-to-top"
                                            data-toggle="tooltip" data-placement="bottom" title="Compare">
                                            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                                        </a>

                                    </div>

                                </div>

                                <img class="img-fluid"
                                    src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/oVBu327812.jpg"
                                    alt="Lorem Ipsum is dummy text">
                            </div>

                            <div class="content">
                                <span class="tag">
                                    Product Cat 2
                                </span>
                                <h5 class="title"><a
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/lorem-ipsum-is-dummy-text">Lorem
                                        Ipsum is dummy text</a></h5>
                                <p>
                                    Lorem Ipsum is dummy text </p>
                                <div class="price">
                                    $&nbsp;201&nbsp;

                                </div>

                                <div class="pro-counter">
                                    <div class="input-group item-quantity">

                                        <input name="products_4" type="text" readonly value="2"
                                            class="form-control qty products_4" max="9999" min="2">
                                        <span class="input-group-btn">
                                            <button type="button" value="quantity"
                                                class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <button type="button" value="quantity"
                                                class="quantity-minus1 btn qtyminuscart" data-type="minus"
                                                data-field="">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                    </div>

                                    <a class="btn-secondary btn icon swipe-to-top cart"
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/lorem-ipsum-is-dummy-text"
                                        data-toggle="tooltip" data-placement="bottom" title="View Detail"><i
                                            class="fas fa-shopping-bag"></i></a>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <!-- Product -->
                    <div class="product product11">
                        <article>
                            <div class="thumb">
                                <div class="badges">



                                    <span class="badge badge-success">Featured</span>

                                </div>
                                <div class="producthover ">
                                    <div class="icons">


                                        <a href="javascript:void(0)" class="icon active swipe-to-top is_liked"
                                            products_id="3" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>

                                        <div class="icon swipe-to-top modal_show" products_id="3" data-toggle="tooltip"
                                            data-placement="bottom" title="Quick View">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <a onclick="myFunction3(3)" class="btn-secondary icon swipe-to-top"
                                            data-toggle="tooltip" data-placement="bottom" title="Compare">
                                            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                                        </a>

                                    </div>

                                </div>

                                <img class="img-fluid"
                                    src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/medium1632747419g58O827812.jpeg"
                                    alt="What is lorem ipsum in English?">
                            </div>

                            <div class="content">
                                <span class="tag">
                                    Test 1
                                </span>
                                <h5 class="title"><a
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english-1">What
                                        is lorem ipsum in English?</a></h5>
                                <p>
                                    What is lorem ipsum in English? </p>
                                <div class="price">
                                    $&nbsp;150&nbsp;

                                </div>

                                <div class="pro-counter">
                                    <div class="input-group item-quantity">

                                        <input name="products_3" type="text" readonly value="1"
                                            class="form-control qty products_3" max="9999" min="1">
                                        <span class="input-group-btn">
                                            <button type="button" value="quantity"
                                                class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <button type="button" value="quantity"
                                                class="quantity-minus1 btn qtyminuscart" data-type="minus"
                                                data-field="">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                    </div>

                                    <a class="btn-secondary btn icon swipe-to-top cart"
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english-1"
                                        data-toggle="tooltip" data-placement="bottom" title="View Detail"><i
                                            class="fas fa-shopping-bag"></i></a>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <!-- Product -->
                    <div class="product product11">
                        <article>
                            <div class="thumb">
                                <div class="badges">




                                </div>
                                <div class="producthover ">
                                    <div class="icons">


                                        <a href="javascript:void(0)" class="icon active swipe-to-top is_liked"
                                            products_id="2" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>

                                        <div class="icon swipe-to-top modal_show" products_id="2" data-toggle="tooltip"
                                            data-placement="bottom" title="Quick View">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <a onclick="myFunction3(2)" class="btn-secondary icon swipe-to-top"
                                            data-toggle="tooltip" data-placement="bottom" title="Compare">
                                            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                                        </a>

                                    </div>

                                </div>

                                <img class="img-fluid"
                                    src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/Oxwc327701.png"
                                    alt="What is lorem ipsum in English">
                            </div>

                            <div class="content">
                                <span class="tag">
                                    Test 1
                                </span>
                                <h5 class="title"><a
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english">What
                                        is lorem ipsum in English</a></h5>
                                <p>
                                    What is lorem ipsum in English </p>
                                <div class="price">
                                    $&nbsp;200&nbsp;

                                </div>

                                <div class="pro-counter">
                                    <div class="input-group item-quantity">

                                        <input name="products_2" type="text" readonly value="1"
                                            class="form-control qty products_2" max="9999" min="1">
                                        <span class="input-group-btn">
                                            <button type="button" value="quantity"
                                                class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <button type="button" value="quantity"
                                                class="quantity-minus1 btn qtyminuscart" data-type="minus"
                                                data-field="">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                    </div>

                                    <button type="button" class="btn-secondary btn icon swipe-to-top cart"
                                        products_id="2" data-toggle="tooltip" data-placement="bottom"
                                        title="Add to Cart"><i class="fas fa-shopping-bag"></i></button>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <!-- Product -->
                    <div class="product product11">
                        <article>
                            <div class="thumb">
                                <div class="badges">



                                    <span class="badge badge-success">Featured</span>

                                </div>
                                <div class="producthover ">
                                    <div class="icons">


                                        <a href="javascript:void(0)" class="icon active swipe-to-top is_liked"
                                            products_id="1" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>

                                        <div class="icon swipe-to-top modal_show" products_id="1" data-toggle="tooltip"
                                            data-placement="bottom" title="Quick View">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <a onclick="myFunction3(1)" class="btn-secondary icon swipe-to-top"
                                            data-toggle="tooltip" data-placement="bottom" title="Compare">
                                            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                                        </a>

                                    </div>

                                </div>

                                <img class="img-fluid"
                                    src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/siL3z27212.jpg"
                                    alt="test product english">
                            </div>

                            <div class="content">
                                <span class="tag">
                                    Test 1
                                </span>
                                <h5 class="title"><a
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/test-product-english">test
                                        product english</a></h5>
                                <p>
                                    test product english </p>
                                <div class="price">
                                    $&nbsp;399&nbsp;

                                </div>

                                <div class="pro-counter">
                                    <div class="input-group item-quantity">

                                        <input name="products_1" type="text" readonly value="1"
                                            class="form-control qty products_1" max="9999" min="1">
                                        <span class="input-group-btn">
                                            <button type="button" value="quantity"
                                                class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <button type="button" value="quantity"
                                                class="quantity-minus1 btn qtyminuscart" data-type="minus"
                                                data-field="">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                    </div>

                                    <button type="button" class="btn-secondary btn icon swipe-to-top cart"
                                        products_id="1" data-toggle="tooltip" data-placement="bottom"
                                        title="Add to Cart"><i class="fas fa-shopping-bag"></i></button>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<!-- Products content -->
<section class="new-products-content pro-content">
    <div class="container">
        <div class="products-area">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="pro-heading-title">
                        <h2> website.FEATURED PRODUCTS </h2>
                        <p>website.Featured Products Detail </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <!-- Product -->
                    <div class="product product11">
                        <article>
                            <div class="thumb">
                                <div class="badges">



                                    <span class="badge badge-success">Featured</span>

                                </div>
                                <div class="producthover ">
                                    <div class="icons">


                                        <a href="javascript:void(0)" class="icon active swipe-to-top is_liked"
                                            products_id="3" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>

                                        <div class="icon swipe-to-top modal_show" products_id="3" data-toggle="tooltip"
                                            data-placement="bottom" title="Quick View">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <a onclick="myFunction3(3)" class="btn-secondary icon swipe-to-top"
                                            data-toggle="tooltip" data-placement="bottom" title="Compare">
                                            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                                        </a>

                                    </div>

                                </div>

                                <img class="img-fluid"
                                    src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/medium1632747419g58O827812.jpeg"
                                    alt="What is lorem ipsum in English?">
                            </div>

                            <div class="content">
                                <span class="tag">
                                    Test 1
                                </span>
                                <h5 class="title"><a
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english-1">What
                                        is lorem ipsum in English?</a></h5>
                                <p>
                                    What is lorem ipsum in English? </p>
                                <div class="price">
                                    $&nbsp;150&nbsp;

                                </div>

                                <div class="pro-counter">
                                    <div class="input-group item-quantity">

                                        <input name="products_3" type="text" readonly value="1"
                                            class="form-control qty products_3" max="9999" min="1">
                                        <span class="input-group-btn">
                                            <button type="button" value="quantity"
                                                class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <button type="button" value="quantity"
                                                class="quantity-minus1 btn qtyminuscart" data-type="minus"
                                                data-field="">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                    </div>

                                    <a class="btn-secondary btn icon swipe-to-top cart"
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english-1"
                                        data-toggle="tooltip" data-placement="bottom" title="View Detail"><i
                                            class="fas fa-shopping-bag"></i></a>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <!-- Product -->
                    <div class="product product11">
                        <article>
                            <div class="thumb">
                                <div class="badges">



                                    <span class="badge badge-success">Featured</span>

                                </div>
                                <div class="producthover ">
                                    <div class="icons">


                                        <a href="javascript:void(0)" class="icon active swipe-to-top is_liked"
                                            products_id="1" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>

                                        <div class="icon swipe-to-top modal_show" products_id="1" data-toggle="tooltip"
                                            data-placement="bottom" title="Quick View">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <a onclick="myFunction3(1)" class="btn-secondary icon swipe-to-top"
                                            data-toggle="tooltip" data-placement="bottom" title="Compare">
                                            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                                        </a>

                                    </div>

                                </div>

                                <img class="img-fluid"
                                    src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/siL3z27212.jpg"
                                    alt="test product english">
                            </div>

                            <div class="content">
                                <span class="tag">
                                    Test 1
                                </span>
                                <h5 class="title"><a
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/test-product-english">test
                                        product english</a></h5>
                                <p>
                                    test product english </p>
                                <div class="price">
                                    $&nbsp;399&nbsp;

                                </div>

                                <div class="pro-counter">
                                    <div class="input-group item-quantity">

                                        <input name="products_1" type="text" readonly value="1"
                                            class="form-control qty products_1" max="9999" min="1">
                                        <span class="input-group-btn">
                                            <button type="button" value="quantity"
                                                class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <button type="button" value="quantity"
                                                class="quantity-minus1 btn qtyminuscart" data-type="minus"
                                                data-field="">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                    </div>

                                    <button type="button" class="btn-secondary btn icon swipe-to-top cart"
                                        products_id="1" data-toggle="tooltip" data-placement="bottom"
                                        title="Add to Cart"><i class="fas fa-shopping-bag"></i></button>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Products content -->
<div class="tri-banners-content pro-content">




    <div class="fullwidth-banner"
        style="background-image: url('https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2020/11/C4mLx18506.jpg') ">
        <div class="parallax-banner-text">
            <div class="parallax-banner-text">
                <h2> Grocery Zone</h2>
                <h4>Your Favorite</h4>
                <div class="hover-link">
                    <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom"
                        title="" data-original-title="View All Range">Buy Now</a>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Products content -->

<section class="categories-content pro-content">
    <div class="container">
        <div class="products-area">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="pro-heading-title">
                        <h2>

                            Test 1
                        </h2>
                        <p>
                            test category descriptio9n </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="container">


            <div class="categories-carousel-js">


                <div class="slick ">

                    <div class="product product11">
                        <article>
                            <div class="thumb">
                                <div class="badges">



                                    <span class="badge badge-success">Featured</span>

                                </div>
                                <div class="producthover ">
                                    <div class="icons">


                                        <a href="javascript:void(0)" class="icon active swipe-to-top is_liked"
                                            products_id="3" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>

                                        <div class="icon swipe-to-top modal_show" products_id="3" data-toggle="tooltip"
                                            data-placement="bottom" title="Quick View">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <a onclick="myFunction3(3)" class="btn-secondary icon swipe-to-top"
                                            data-toggle="tooltip" data-placement="bottom" title="Compare">
                                            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                                        </a>

                                    </div>

                                </div>

                                <img class="img-fluid"
                                    src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/medium1632747419g58O827812.jpeg"
                                    alt="What is lorem ipsum in English?">
                            </div>

                            <div class="content">
                                <span class="tag">
                                    Test 1
                                </span>
                                <h5 class="title"><a
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english-1">What
                                        is lorem ipsum in English?</a></h5>
                                <p>
                                    What is lorem ipsum in English? </p>
                                <div class="price">
                                    $&nbsp;150&nbsp;

                                </div>

                                <div class="pro-counter">
                                    <div class="input-group item-quantity">

                                        <input name="products_3" type="text" readonly value="1"
                                            class="form-control qty products_3" max="9999" min="1">
                                        <span class="input-group-btn">
                                            <button type="button" value="quantity"
                                                class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <button type="button" value="quantity"
                                                class="quantity-minus1 btn qtyminuscart" data-type="minus"
                                                data-field="">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                    </div>

                                    <a class="btn-secondary btn icon swipe-to-top cart"
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english-1"
                                        data-toggle="tooltip" data-placement="bottom" title="View Detail"><i
                                            class="fas fa-shopping-bag"></i></a>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="slick ">

                    <div class="product product11">
                        <article>
                            <div class="thumb">
                                <div class="badges">




                                </div>
                                <div class="producthover ">
                                    <div class="icons">


                                        <a href="javascript:void(0)" class="icon active swipe-to-top is_liked"
                                            products_id="2" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>

                                        <div class="icon swipe-to-top modal_show" products_id="2" data-toggle="tooltip"
                                            data-placement="bottom" title="Quick View">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <a onclick="myFunction3(2)" class="btn-secondary icon swipe-to-top"
                                            data-toggle="tooltip" data-placement="bottom" title="Compare">
                                            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                                        </a>

                                    </div>

                                </div>

                                <img class="img-fluid"
                                    src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/Oxwc327701.png"
                                    alt="What is lorem ipsum in English">
                            </div>

                            <div class="content">
                                <span class="tag">
                                    Test 1
                                </span>
                                <h5 class="title"><a
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english">What
                                        is lorem ipsum in English</a></h5>
                                <p>
                                    What is lorem ipsum in English </p>
                                <div class="price">
                                    $&nbsp;200&nbsp;

                                </div>

                                <div class="pro-counter">
                                    <div class="input-group item-quantity">

                                        <input name="products_2" type="text" readonly value="1"
                                            class="form-control qty products_2" max="9999" min="1">
                                        <span class="input-group-btn">
                                            <button type="button" value="quantity"
                                                class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <button type="button" value="quantity"
                                                class="quantity-minus1 btn qtyminuscart" data-type="minus"
                                                data-field="">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                    </div>

                                    <button type="button" class="btn-secondary btn icon swipe-to-top cart"
                                        products_id="2" data-toggle="tooltip" data-placement="bottom"
                                        title="Add to Cart"><i class="fas fa-shopping-bag"></i></button>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="slick ">

                    <div class="product product11">
                        <article>
                            <div class="thumb">
                                <div class="badges">



                                    <span class="badge badge-success">Featured</span>

                                </div>
                                <div class="producthover ">
                                    <div class="icons">


                                        <a href="javascript:void(0)" class="icon active swipe-to-top is_liked"
                                            products_id="1" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </a>

                                        <div class="icon swipe-to-top modal_show" products_id="1" data-toggle="tooltip"
                                            data-placement="bottom" title="Quick View">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <a onclick="myFunction3(1)" class="btn-secondary icon swipe-to-top"
                                            data-toggle="tooltip" data-placement="bottom" title="Compare">
                                            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                                        </a>

                                    </div>

                                </div>

                                <img class="img-fluid"
                                    src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/siL3z27212.jpg"
                                    alt="test product english">
                            </div>

                            <div class="content">
                                <span class="tag">
                                    Test 1
                                </span>
                                <h5 class="title"><a
                                        href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/test-product-english">test
                                        product english</a></h5>
                                <p>
                                    test product english </p>
                                <div class="price">
                                    $&nbsp;399&nbsp;

                                </div>

                                <div class="pro-counter">
                                    <div class="input-group item-quantity">

                                        <input name="products_1" type="text" readonly value="1"
                                            class="form-control qty products_1" max="9999" min="1">
                                        <span class="input-group-btn">
                                            <button type="button" value="quantity"
                                                class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <button type="button" value="quantity"
                                                class="quantity-minus1 btn qtyminuscart" data-type="minus"
                                                data-field="">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                    </div>

                                    <button type="button" class="btn-secondary btn icon swipe-to-top cart"
                                        products_id="1" data-toggle="tooltip" data-placement="bottom"
                                        title="Add to Cart"><i class="fas fa-shopping-bag"></i></button>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>


            </div>
        </div>
        <!-- 2nd tab -->
    </div>
    </div>

</section>



<section class="boxes-content">

    <div class="container">
        <div class="info-boxes-content">
            <div class="row">

                <div class="col-12 col-md-6 col-lg-3 pl-xl-0">
                    <div class="info-box first">
                        <div class="panel">
                            <h3 class="fas fa-truck"></h3>
                            <div class="block">
                                <h4 class="title">Free Shipping</h4>
                                <p>On order over</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 pl-xl-0">
                    <div class="info-box">
                        <div class="panel">
                            <h3 class="fas fa-money-bill-alt"></h3>
                            <div class="block">
                                <h4 class="title">Money Return</h4>
                                <p>30 Days money return</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 pl-xl-0">
                    <div class="info-box">
                        <div class="panel">
                            <h3 class="fas fa-life-ring"></h3>
                            <div class="block">
                                <h4 class="title">Support 24/7</h4>
                                <p>Hotline&nbsp;:&nbsp;(+12 123 456789)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 pl-xl-0">
                    <div class="info-box last">
                        <div class="panel">
                            <h3 class="fas fa-credit-card"></h3>
                            <div class="block">
                                <h4 class="title">Safe Payment</h4>
                                <p>Protect online payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Products content -->
<section class="categories-content pro-content">
    <div class="general-product ">
        <div class="container">
            <div class="products-area">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="pro-heading-title">
                            <h2 style="margin-top: 4px"> Users review </h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Morbi venenatis felis tempus feugiat maximus. </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="container p-0">
            <div class="customer-feedback slider">
                <div class="cat-banner">
                    <a href="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg">
                        <figure class=" categories-icon">
                            <img class="img-fluid"
                                src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
                                alt="Test 1">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Excellent product as described and</h3>
                            </div>
                            <p class="para">Excellent product as described and delivered promptly</p>
                            <h3 class="reviewername">Andy Hutchinson</h3>
                        </figure>
                    </a>
                </div>

                <div class="cat-banner">
                    <a href="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg">
                        <figure class=" categories-icon">
                            <img class="img-fluid"
                                src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Excellent product as described and</h3>
                            </div>
                            <p class="para">Excellent product as described and delivered promptly</p>
                            <h3 class="reviewername">Andy Hutchinson</h3>
                        </figure>
                    </a>
                </div>

                <div class="cat-banner">
                    <a href="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg">
                        <figure class=" categories-icon">
                            <img class="img-fluid"
                                src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Excellent product as described and</h3>
                            </div>
                            <p class="para">Excellent product as described and delivered promptly</p>
                            <h3 class="reviewername">Andy Hutchinson</h3>
                        </figure>
                    </a>
                </div>
                <div class="cat-banner">
                    <a href="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg">
                        <figure class=" categories-icon">
                            <img class="img-fluid"
                                src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Excellent product as described and</h3>
                            </div>
                            <p class="para">Excellent product as described and delivered promptly</p>
                            <h3 class="reviewername">Andy Hutchinson</h3>
                        </figure>
                    </a>
                </div>
                <div class="cat-banner">
                    <a href="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg">
                        <figure class=" categories-icon">
                            <img class="img-fluid"
                                src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Excellent product as described and</h3>
                            </div>
                            <p class="para">Excellent product as described and delivered promptly</p>
                            <h3 class="reviewername">Andy Hutchinson</h3>
                        </figure>
                    </a>
                </div>
                <div class="cat-banner">
                    <a href="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg">
                        <figure class=" categories-icon">
                            <img class="img-fluid"
                                src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Excellent product as described and</h3>
                            </div>
                            <p class="para">Excellent product as described and delivered promptly</p>
                            <h3 class="reviewername">Andy Hutchinson</h3>
                        </figure>
                    </a>
                </div>
                <div class="cat-banner">
                    <a href="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg">
                        <figure class=" categories-icon">
                            <img class="img-fluid"
                                src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Excellent product as described and</h3>
                            </div>
                            <p class="para">Excellent product as described and delivered promptly</p>
                            <h3 class="reviewername">Andy Hutchinson</h3>
                        </figure>
                    </a>
                </div>
                <div class="cat-banner">
                    <a href="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg">
                        <figure class=" categories-icon">
                            <img class="img-fluid"
                                src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
                                alt="Product Cat 2">

                            <div class="categories-title">
                                <h3 class="category-slider-title">Excellent product as described and</h3>
                            </div>
                            <p class="para">Excellent product as described and delivered promptly</p>
                            <h3 class="reviewername">Andy Hutchinson</h3>
                        </figure>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('.store').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows:true,
     responsive: [
    {
    breakpoint: 1024,
    settings: {
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    dots: true
    }
    },
    {
    breakpoint: 600,
    settings: {
    slidesToShow: 2,
    slidesToScroll: 1
    }
    },
    {
    breakpoint: 480,
    settings: {
    slidesToShow: 1,
    slidesToScroll: 1,dots: true,

    }
    }
   
    ]



});
$('.customer-feedback').slick({
infinite: false,
slidesToShow: 4,
slidesToScroll: 1,
arrows:true,
responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 3,
slidesToScroll: 1,
infinite: true,
dots: true
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 2,
slidesToScroll: 1
}
},
{
breakpoint: 480,
settings: {
slidesToShow: 1,
slidesToScroll: 1,dots: true,

}
}

]



});
     
</script>

@endsection