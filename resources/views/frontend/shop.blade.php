@extends('frontend.layouts.app')
@section('content')


<!-- Shop Page One content -->
<div class="container-fuild">
  <nav aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public">Home</a></li>
        <li class="breadcrumb-item active">Shop</li>
      </ol>
    </div>
  </nav>
</div>



<section class="pro-content">
  <div class="container">
    <div class="page-heading-title">
      <h2> Shop
      </h2>

    </div>
  </div>

  <section class="shop-content shop-two">

    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-3  d-lg-block d-xl-block right-menu">
          <div class="right-menu-categories">

            <a class=" main-manu" href=https://www.mydevfactory.com/~rezaul/rabiul/blink/public/shop?category=uncategorized> <img class="img-fuild" src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/Oxwc327701.png"> Test 1</a>
            <a class=" main-manu" href=https://www.mydevfactory.com/~rezaul/rabiul/blink/public/shop?category=product-cat-2> <img class="img-fuild" src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/lF4W227712.jpg"> Product Cat 2</a>
          </div>




          <form enctype="multipart/form-data" name="filters" id="test" method="get">
            <input type="hidden" name="min_price" id="min_price" value="0">
            <input type="hidden" name="max_price" id="max_price" value="400">
            <input type="hidden" name="filters_applied" id="filters_applied" value="0">
            <div class="range-slider-main">
              <h2>Price Range </h2>
              <div class="wrapper">
                <div class="range-slider">
                  <input onChange="getComboA(this)" name="price" type="text" class="js-range-slider" value="" />
                </div>
                <div class="extra-controls form-inline">
                  <div class="form-group">
                    <span>
                      <font>$</font>
                      <input type="text" class="js-input-from form-control" value="0" />
                    </span>
                    <font>-</font>
                    <span>
                      <font>$</font>
                      <input type="text" class="js-input-to form-control" value="0" />
                      <input type="hidden" class="maximum_price" value="400">
                    </span>
                  </div>
                </div>
              </div>
            </div>


            <script>
              jQuery(function() {

                var $range = jQuery(".js-range-slider"),
                  $inputFrom = jQuery(".js-input-from"),
                  $inputTo = jQuery(".js-input-to"),
                  instance,
                  min = 0,
                  max = 400,
                  from = 0,
                  to = 0;
                $range.ionRangeSlider({
                  type: "double",
                  min: min,
                  max: max,
                  from: 0,
                  to: 400,
                  prefix: 'Rp. ',
                  onStart: updateInputs,
                  onChange: updateInputs,
                  step: 1,
                  prettify_enabled: true,
                  prettify_separator: ".",
                  values_separator: " - ",
                  force_edges: true


                });

                instance = $range.data("ionRangeSlider");

                function updateInputs(data) {
                  from = data.from;
                  to = data.to;

                  $inputFrom.prop("value", from);
                  $inputTo.prop("value", to);
                }

                $inputFrom.on("input", function() {
                  var val = $(this).prop("value");

                  // validate
                  if (val < min) {
                    val = min;
                  } else if (val > to) {
                    val = to;
                  }

                  instance.update({
                    from: val
                  });
                });

                $inputTo.on("input", function() {
                  var val = $(this).prop("value");

                  // validate
                  if (val < from) {
                    val = from;
                  } else if (val > max) {
                    val = max;
                  }

                  instance.update({
                    to: val

                  });
                });

              });

              function getComboA(selectObject) {
                var value = selectObject.value;
                console.log(value);
              }
            </script>
            <div class="color-range-main">

              <div class="alret alert-danger" id="filter_required">
              </div>

              <div class="button">
                <a href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/shop" class="btn btn-dark" id="apply_options"> Reset </a>
                <!--<button type="button" class="btn btn-secondary" id="apply_options_btn" disabled> Apply</button>-->
                <button type="button" class="btn btn-secondary" id="apply_options_btn"> Apply</button>
              </div>
            </div>
            <div class="img-main">
              <a href=""><img class="img-fluid" src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2020/11/jOVnc11207.jpg"></a>
            </div>
          </form>


          <div class="range-slider-main">
            <a class=" main-manu" data-toggle="collapse" href="#brands" role="button" aria-expanded="true" aria-controls="men-cloth">
              Brands
            </a>
            <div class="sub-manu collapse show multi-collapse" id="brands">

              <ul class="unorder-list">
                <li class="list-item">
                  <a class="brands-btn list-item" href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/shop?brand=test" role="button"><i class="fas fa-angle-right"></i>test</a>
                </li>
              </ul>
            </div>
          </div>


        </div>
        <div class="col-12 col-lg-9">
          <div class="products-area">
            <div class="top-bar">
              <div class="row">
                <div class="col-12 col-lg-12">
                  <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                      <div class="block">
                        <label>Display</label>
                        <div class="buttons">
                          <a href="javascript:void(0);" id="grid"><i class="fas fa-th-large"></i></a>
                          <a href="javascript:void(0);" id="list"><i class="fas fa-list"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">


                      <form class="form-inline justify-content-end" id="load_products_form">
                        <input type="hidden" name="min_price" value="0">
                        <input type="hidden" name="max_price" value="400">
                        <input type="hidden" value="1" name="page_number" id="page_number">
                        <input type="hidden" name="load_products" value="1">

                        <input type="hidden" name="products_style" id="products_style" value="grid">


                        <div class="form-group">
                          <label>Sort</label>
                          <div class="select-control">
                            <select name="type" id="sortbytype" class="form-control">
                              <option value="desc">Newest</option>
                              <option value="atoz">A - Z</option>
                              <option value="ztoa">Z - A</option>
                              <option value="hightolow">Price: High To Low</option>
                              <option value="lowtohigh">Price: Low To High</option>
                              <option value="topseller">Top Seller</option>
                              <option value="special">Special Products</option>
                              <option value="mostliked">Most Liked</option>
                            </select>
                          </div>
                        </div>



                        <div class="form-group">
                          <label>Limit</label>
                          <div class="select-control">
                            <select class="form-control" name="limit" id="sortbylimit">
                              <option value="15">15</option>
                              <option value="30">30</option>
                              <option value="60">60</option>
                            </select>
                          </div>
                        </div>


                    </div>
                  </div>

                </div>
              </div>
            </div>

            <section id="swap" class="shop-content">
              <div class="products-area">
                <div class="row">



                  <div class="col-12 col-lg-4 col-sm-6 griding">
                    <div class="product product11">
                      <article>
                        <div class="thumb">
                          <div class="badges">




                          </div>
                          <div class="producthover ">
                            <div class="icons">


                              <a href="javascript:void(0)" class="icon active swipe-to-top is_liked" products_id="4" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist">
                                <i class="fas fa-heart"></i>
                              </a>

                              <div class="icon swipe-to-top modal_show" products_id="4" data-toggle="tooltip" data-placement="bottom" title="Quick View">
                                <i class="fas fa-eye"></i>
                              </div>
                              <a onclick="myFunction3(4)" class="btn-secondary icon swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="Compare">
                                <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                              </a>

                            </div>

                          </div>

                          <img class="img-fluid" src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/oVBu327812.jpg" alt="Lorem Ipsum is dummy text">
                        </div>

                        <div class="content">
                          <span class="tag">
                            Product Cat 2
                          </span>
                          <h5 class="title"><a href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/lorem-ipsum-is-dummy-text">Lorem Ipsum is dummy text</a></h5>
                          <p>
                            Lorem Ipsum is dummy text </p>
                          <div class="price">
                            $&nbsp;201&nbsp;

                          </div>

                          <div class="pro-counter">
                            <div class="input-group item-quantity">

                              <input name="products_4" type="text" readonly value="2" class="form-control qty products_4" max="9999" min="2">
                              <span class="input-group-btn">
                                <button type="button" value="quantity" class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                  <i class="fas fa-plus"></i>
                                </button>

                                <button type="button" value="quantity" class="quantity-minus1 btn qtyminuscart" data-type="minus" data-field="">
                                  <i class="fas fa-minus"></i>
                                </button>
                              </span>
                            </div>

                            <a class="btn-secondary btn icon swipe-to-top cart" href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/lorem-ipsum-is-dummy-text" data-toggle="tooltip" data-placement="bottom" title="View Detail"><i class="fas fa-shopping-bag"></i></a>

                          </div>
                        </div>
                      </article>
                    </div>
                  </div>




                  <div class="col-12 col-lg-4 col-sm-6 griding">
                    <div class="product product11">
                      <article>
                        <div class="thumb">
                          <div class="badges">



                            <span class="badge badge-success">Featured</span>

                          </div>
                          <div class="producthover ">
                            <div class="icons">


                              <a href="javascript:void(0)" class="icon active swipe-to-top is_liked" products_id="3" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist">
                                <i class="fas fa-heart"></i>
                              </a>

                              <div class="icon swipe-to-top modal_show" products_id="3" data-toggle="tooltip" data-placement="bottom" title="Quick View">
                                <i class="fas fa-eye"></i>
                              </div>
                              <a onclick="myFunction3(3)" class="btn-secondary icon swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="Compare">
                                <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                              </a>

                            </div>

                          </div>

                          <img class="img-fluid" src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/medium1632747419g58O827812.jpeg" alt="What is lorem ipsum in English?">
                        </div>

                        <div class="content">
                          <span class="tag">
                            Test 1
                          </span>
                          <h5 class="title"><a href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english-1">What is lorem ipsum in English?</a></h5>
                          <p>
                            What is lorem ipsum in English? </p>
                          <div class="price">
                            $&nbsp;150&nbsp;

                          </div>

                          <div class="pro-counter">
                            <div class="input-group item-quantity">

                              <input name="products_3" type="text" readonly value="1" class="form-control qty products_3" max="9999" min="1">
                              <span class="input-group-btn">
                                <button type="button" value="quantity" class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                  <i class="fas fa-plus"></i>
                                </button>

                                <button type="button" value="quantity" class="quantity-minus1 btn qtyminuscart" data-type="minus" data-field="">
                                  <i class="fas fa-minus"></i>
                                </button>
                              </span>
                            </div>

                            <a class="btn-secondary btn icon swipe-to-top cart" href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english-1" data-toggle="tooltip" data-placement="bottom" title="View Detail"><i class="fas fa-shopping-bag"></i></a>

                          </div>
                        </div>
                      </article>
                    </div>
                  </div>




                  <div class="col-12 col-lg-4 col-sm-6 griding">
                    <div class="product product11">
                      <article>
                        <div class="thumb">
                          <div class="badges">




                          </div>
                          <div class="producthover ">
                            <div class="icons">


                              <a href="javascript:void(0)" class="icon active swipe-to-top is_liked" products_id="2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist">
                                <i class="fas fa-heart"></i>
                              </a>

                              <div class="icon swipe-to-top modal_show" products_id="2" data-toggle="tooltip" data-placement="bottom" title="Quick View">
                                <i class="fas fa-eye"></i>
                              </div>
                              <a onclick="myFunction3(2)" class="btn-secondary icon swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="Compare">
                                <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                              </a>

                            </div>

                          </div>

                          <img class="img-fluid" src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/Oxwc327701.png" alt="What is lorem ipsum in English">
                        </div>

                        <div class="content">
                          <span class="tag">
                            Test 1
                          </span>
                          <h5 class="title"><a href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/what-is-lorem-ipsum-in-english">What is lorem ipsum in English</a></h5>
                          <p>
                            What is lorem ipsum in English </p>
                          <div class="price">
                            $&nbsp;200&nbsp;

                          </div>

                          <div class="pro-counter">
                            <div class="input-group item-quantity">

                              <input name="products_2" type="text" readonly value="1" class="form-control qty products_2" max="9999" min="1">
                              <span class="input-group-btn">
                                <button type="button" value="quantity" class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                  <i class="fas fa-plus"></i>
                                </button>

                                <button type="button" value="quantity" class="quantity-minus1 btn qtyminuscart" data-type="minus" data-field="">
                                  <i class="fas fa-minus"></i>
                                </button>
                              </span>
                            </div>

                            <button type="button" class="btn-secondary btn icon swipe-to-top cart" products_id="2" data-toggle="tooltip" data-placement="bottom" title="Add to Cart"><i class="fas fa-shopping-bag"></i></button>

                          </div>
                        </div>
                      </article>
                    </div>
                  </div>




                  <div class="col-12 col-lg-4 col-sm-6 griding">
                    <div class="product product11">
                      <article>
                        <div class="thumb">
                          <div class="badges">



                            <span class="badge badge-success">Featured</span>

                          </div>
                          <div class="producthover ">
                            <div class="icons">


                              <a href="javascript:void(0)" class="icon active swipe-to-top is_liked" products_id="1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist">
                                <i class="fas fa-heart"></i>
                              </a>

                              <div class="icon swipe-to-top modal_show" products_id="1" data-toggle="tooltip" data-placement="bottom" title="Quick View">
                                <i class="fas fa-eye"></i>
                              </div>
                              <a onclick="myFunction3(1)" class="btn-secondary icon swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="Compare">
                                <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                              </a>

                            </div>

                          </div>

                          <img class="img-fluid" src="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/images/media/2021/09/siL3z27212.jpg" alt="test product english">
                        </div>

                        <div class="content">
                          <span class="tag">
                            Test 1
                          </span>
                          <h5 class="title"><a href="https://www.mydevfactory.com/~rezaul/rabiul/blink/public/product-detail/test-product-english">test product english</a></h5>
                          <p>
                            test product english </p>
                          <div class="price">
                            $&nbsp;399&nbsp;

                          </div>

                          <div class="pro-counter">
                            <div class="input-group item-quantity">

                              <input name="products_1" type="text" readonly value="1" class="form-control qty products_1" max="9999" min="1">
                              <span class="input-group-btn">
                                <button type="button" value="quantity" class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                                  <i class="fas fa-plus"></i>
                                </button>

                                <button type="button" value="quantity" class="quantity-minus1 btn qtyminuscart" data-type="minus" data-field="">
                                  <i class="fas fa-minus"></i>
                                </button>
                              </span>
                            </div>

                            <button type="button" class="btn-secondary btn icon swipe-to-top cart" products_id="1" data-toggle="tooltip" data-placement="bottom" title="Add to Cart"><i class="fas fa-shopping-bag"></i></button>

                          </div>
                        </div>
                      </article>
                    </div>
                  </div>

                  <script>
                    function myFunction3(product_id) {
                      jQuery(function($) {
                        jQuery.ajax({
                          beforeSend: function(xhr) { // Add this line
                            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                          },
                          url: 'https://www.mydevfactory.com/~rezaul/rabiul/blink/public/addToCompare',
                          type: "POST",
                          data: {
                            "product_id": product_id,
                            "_token": "g5VTSnKxj8D0HC2oQnGgVuuqlgL9vS8Oo1gYdANK"
                          },
                          success: function(res) {
                            var obj = JSON.parse(res);
                            var message = obj.message;

                            if (obj.success != 0) {
                              $('#compare').html(res);
                              message = "Product is ready to compare!";
                            }
                            notificationWishlist(message);
                          },
                        });
                      });
                    }
                  </script>

                </div>
              </div>
            </section>
          </div>

          <div class="pagination justify-content-between ">
            <input id="record_limit" type="hidden" value="4">
            <input id="total_record" type="hidden" value="4">
            <label for="staticEmail" class="col-form-label"> Showing&nbsp;<span class="showing_record">4</span>&nbsp;of&nbsp;<span class="showing_total_record">4</span> &nbsp;results.</label>

            <div class=" justify-content-end col-6">

              <button class="btn btn-dark" type="button" id="load_products" style="display:none">Load More</button>
            </div>
          </div>
          </form>

        </div>



      </div>
    </div>

    </div>
    <script type="text/javascript">
      window.onload = function() {


      }
      jQuery(document).on('click', '#apply_options_btn', function(e) {
        if (jQuery('input:checkbox.filters_box:checked').length > 0) {
          jQuery('#filters_applied').val(1);
          jQuery('#apply_options_btn').removeAttr('disabled');
        } else {
          jQuery('#filters_applied').val(0);
          jQuery('#apply_options_btn').attr('disabled', true);
        }
        jQuery('#load_products_form').submit();
        jQuery('#test').submit();

      })


      //sortby
      document.getElementById('sortbytype').addEventListener('change', function() {
        jQuery("#load_products_form").submit();

      });

      //sortby
      document.getElementById('sortbylimit').addEventListener('change', function() {
        jQuery("#load_products_form").submit();

      });

      //Display grid/list 3 Column
      jQuery(document).ready(function() {


        jQuery('#list').on('click', function() {
          jQuery('#products_style').val('list');
          jQuery('#swap .col-12').removeClass('griding');
          jQuery('#swap .col-12').removeClass('col-lg-4');
          jQuery('#swap .col-12').removeClass('col-sm-6');
          jQuery('#swap .col-12').addClass('listing');


          jQuery('#swap2 .col-12').removeClass('griding');
          jQuery('#swap2 .col-12').removeClass('col-md-6');
          jQuery('#swap2 .col-12').removeClass('col-lg-3');
          jQuery('#swap2 .col-12').addClass('listing');

          jQuery(this).addClass('active');
          jQuery('#grid').removeClass('active');

          jQuery('#cart_button4').show();
          jQuery('#view_button4').show();
          jQuery('#added_button4').show();
          jQuery('#cart_button24').show();
          jQuery('#view_button24').show();
          jQuery('#added_button24').show();
          jQuery('#out_button4').show();


          jQuery('#cart_button3').show();
          jQuery('#view_button3').show();
          jQuery('#added_button3').show();
          jQuery('#cart_button23').show();
          jQuery('#view_button23').show();
          jQuery('#added_button23').show();
          jQuery('#out_button3').show();


          jQuery('#cart_button2').show();
          jQuery('#view_button2').show();
          jQuery('#added_button2').show();
          jQuery('#cart_button22').show();
          jQuery('#view_button22').show();
          jQuery('#added_button22').show();
          jQuery('#out_button2').show();


          jQuery('#cart_button1').show();
          jQuery('#view_button1').show();
          jQuery('#added_button1').show();
          jQuery('#cart_button21').show();
          jQuery('#view_button21').show();
          jQuery('#added_button21').show();
          jQuery('#out_button1').show();

        });
        jQuery('#grid').on('click', function() {

          jQuery('#products_style').val('grid');

          jQuery('#swap .col-12').removeClass('listing');
          jQuery('#swap .col-12').addClass('col-lg-4');
          jQuery('#swap .col-12').addClass('col-sm-6');

          jQuery('#swap .col-12').addClass('griding');



          jQuery('#swap2 .col-12').addClass('griding');
          jQuery('#swap2 .col-12').addClass('col-md-6');
          jQuery('#swap2 .col-12').addClass('col-lg-3');
          jQuery('#swap2 .col-12').removeClass('listing');

          jQuery(this).addClass('active');
          jQuery('#list').removeClass('active');

          jQuery('#cart_button4').hide();
          jQuery('#view_button4').hide();
          jQuery('#added_button4').hide();
          jQuery('#cart_button24').hide();
          jQuery('#view_button24').hide();
          jQuery('#added_button24').hide();
          jQuery('#out_button4').hide();


          jQuery('#cart_button3').hide();
          jQuery('#view_button3').hide();
          jQuery('#added_button3').hide();
          jQuery('#cart_button23').hide();
          jQuery('#view_button23').hide();
          jQuery('#added_button23').hide();
          jQuery('#out_button3').hide();


          jQuery('#cart_button2').hide();
          jQuery('#view_button2').hide();
          jQuery('#added_button2').hide();
          jQuery('#cart_button22').hide();
          jQuery('#view_button22').hide();
          jQuery('#added_button22').hide();
          jQuery('#out_button2').hide();


          jQuery('#cart_button1').hide();
          jQuery('#view_button1').hide();
          jQuery('#added_button1').hide();
          jQuery('#cart_button21').hide();
          jQuery('#view_button21').hide();
          jQuery('#added_button21').hide();
          jQuery('#out_button1').hide();



        });


      });

      //load more products
      jQuery(document).on('click', '#load_products', function(e) {
        // jQuery('#loader').css('display','flex');
        $('#load_products').html("<img src='https://www.mydevfactory.com/~rezaul/rabiul/blink/public/web/images/miscellaneous/ajax-loader.gif' /> ");
        setTimeout(() => {
          var page_number = jQuery('#page_number').val();
          var total_record = jQuery('#total_record').val();
          var products_style = jQuery('#products_style').val();
          var pagelayout = jQuery('#pagelayout').val();

          var formData = jQuery("#load_products_form").serialize();
          jQuery.ajax({
            headers: {
              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            url: 'https://www.mydevfactory.com/~rezaul/rabiul/blink/public/filterProducts',
            type: "POST",
            data: formData,
            success: function(res) {
              if (jQuery.trim().res == 0) {
                jQuery('#load_products').hide();
                jQuery('#loaded_content').show();
              } else {
                page_number++;
                jQuery('#page_number').val(page_number);
                jQuery('#swap .row').append(res);
                jQuery('#swap2 .row').append(res);
                var record_limit = jQuery('#record_limit').val();
                var showing_record = page_number * record_limit;
                if (total_record <= showing_record) {
                  jQuery('.showing_record').html(total_record);
                  jQuery('#load_products').hide();
                  jQuery('#loaded_content').show();
                } else {
                  jQuery('.showing_record').html(showing_record);
                }
              }


              if (pagelayout !== undefined) {
                if (products_style == 'list') {
                  jQuery('#swap2 .col-12').removeClass('griding');
                  jQuery('#swap2 .col-12').removeClass('col-md-6');
                  jQuery('#swap2 .col-12').removeClass('col-lg-3');
                  jQuery('#swap2 .col-12').addClass('listing');

                } else {
                  jQuery('#swap2 .col-12').addClass('griding');
                  jQuery('#swap2 .col-12').addClass('col-md-6');
                  jQuery('#swap2 .col-12').addClass('col-lg-3');
                  jQuery('#swap2 .col-12').removeClass('listing');
                }
              } else {
                if (products_style == 'list') {
                  jQuery('#swap .col-12').removeClass('griding');
                  jQuery('#swap .col-12').removeClass('col-lg-4');
                  jQuery('#swap .col-12').removeClass('col-sm-6');
                  jQuery('#swap .col-12').addClass('listing');

                } else {
                  jQuery('#swap .col-12').removeClass('listing');
                  jQuery('#swap .col-12').addClass('col-lg-4');
                  jQuery('#swap .col-12').addClass('col-sm-6');
                  jQuery('#swap .col-12').addClass('griding');
                }
              }



              $('#load_products').html('Load More');
            },
          });
        }, 300);
      });
    </script>
  </section>

</section>

@endsection