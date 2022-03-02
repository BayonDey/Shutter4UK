<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 custom-side-effect">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{asset(config('app.logo'))}}" alt="{{ config('app.name') }}" class="brand-image  elevation-3">
    <span class="brand-text font-weight-light"> &nbsp; </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    @php
    $segment2 = Request::segment(2);
    $segment3 = Request::segment(3);

    @endphp

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ in_array($segment2, ['dashboard']) ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        @if(App\Model\UserPermission::checkPermission('admin_manager') > 0)
        <li class="nav-item {{ in_array($segment2, ['download-product-image', 'appointment-time','department', 'generate-report','dep-category','dep-product','dep-slider']) ? 'menu-open' : '' }} ">
          <a href="#" class="nav-link {{ in_array($segment2, ['download-product-image', 'appointment-time','department', 'generate-report','dep-category','dep-product','dep-slider']) ? 'active' : '' }} ">
            <i class="nav-icon fas fa-laptop"></i>
            <p>ADMIN MANAGER <i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">
            <!-- @if(App\Model\UserPermission::checkPermission('download_product_image') > 0)
            <li class="nav-item">
              <a href="{{ route('download_product_image') }}" class="nav-link {{ (in_array($segment2, ['download-product-image'])) ? 'active' : '' }}">
                <i class="fas fa-cloud-download-alt nav-icon"></i>
                <p>Product Image</p>
              </a>
            </li>
            @endif -->

            <li class="nav-item">
              <a href="{{ route('appointment_time') }}" class="nav-link {{ (in_array($segment2, ['appointment-time'])) ? 'active' : '' }}">
                <i class="fa fa-clock nav-icon"></i>
                <p>Appointment Time</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('department_list') }}" class="nav-link {{ (in_array($segment2, ['department'])) ? 'active' : '' }}">
                <i class="fas fa-cubes nav-icon"></i>
                <p>Departments</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('category_list') }}" class="nav-link {{ (in_array($segment2, ['dep-category'])) ? 'active' : '' }}">
                <i class="fas fa-bezier-curve nav-icon"></i>
                <p>Department Category</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('product_list') }}" class="nav-link {{ (in_array($segment2, ['dep-product'])) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>Department Products</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('slider_list') }}" class="nav-link {{ (in_array($segment2, ['dep-slider'])) ? 'active' : '' }}">
                <i class="fas fa-images nav-icon"></i>
                <p>Department Sliders</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('generate_report') }}" class="nav-link {{ (in_array($segment2, ['generate-report'])) ? 'active' : '' }}">
                <i class="fas fa-file-csv nav-icon"></i>
                <p>Generate Report</p>
              </a>
            </li>
          </ul>
        </li>
        @endif


        <!-- //========= START:: Manage Users =============// -->
        @if(App\Model\UserPermission::checkPermission('manage_users') > 0)
        <li class="nav-item {{ in_array($segment2, ['admin-users','users','popup-users','user-details','user-edit']) ? 'menu-open' : '' }} ">
          <a href="#" class="nav-link {{ in_array($segment2, ['admin-users','users','popup-users','user-details','user-edit']) ? 'active' : '' }} ">
            <i class="nav-icon fas fa-users"></i>
            <p>Manage Users <i class="right fas fa-angle-left"></i> </p>
          </a>
          <ul class="nav nav-treeview">
            @if(App\Model\UserPermission::checkPermission('admin_users') > 0)
            <li class="nav-item">
              <a href="{{ route('admin_users') }}" class="nav-link {{ in_array($segment2, ['admin-users']) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Admin Users</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('frontend_users') > 0)
            <li class="nav-item">
              <a href="{{ route('frontend_users') }}" class="nav-link {{ in_array($segment2, ['users','user-details', 'user-edit']) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Frontend Users</p>
              </a>
            </li>
            @endif

          </ul>
        </li>

        @endif
        <!-- //========= END:: Manage Users =============// -->


        <!-- //========= START :: Manage suppliers =============// -->
        @if(App\Model\UserPermission::checkPermission('manage_suppliers') > 0)
        <li class="nav-item {{ in_array($segment2, ['supplier', 'band', 'guide', 'product-guide', 'assign-group-to-product']) ? 'menu-open' : '' }} ">
          <a href="#" class="nav-link {{ in_array($segment2, ['supplier', 'band', 'guide', 'product-guide', 'assign-group-to-product']) ? 'active' : '' }} ">
            <i class="nav-icon fas fa-cubes"></i>
            <p>Supplier & Guide<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">


            @if(App\Model\UserPermission::checkPermission('view_suppliers') > 0)
            <li class="nav-item">
              <a href="{{ route('supplier_list') }}" class="nav-link {{ in_array($segment2, ['supplier']) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>View Suppliers </p>
              </a>
            </li>
            @endif

            <!-- @if(App\Model\UserPermission::checkPermission('view_bands') > 0)
            <li class="nav-item">
              <a href="{{ route('band_list', 0) }}" class="nav-link {{ in_array($segment2, ['band']) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>View Bands </p>
              </a>
            </li>
            @endif -->

            <!-- @if(App\Model\UserPermission::checkPermission('manage_guide_text') > 0)
            <li class="nav-item">
              <a href="{{ route('guide_list') }}" class="nav-link {{ in_array($segment2, ['guide']) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>Guide Text List</p>
              </a>
            </li>
            @endif -->

            <!-- @if(App\Model\UserPermission::checkPermission('manage_product_guide') > 0)
            <li class="nav-item">
              <a href="{{ route('product_guide') }}" class="nav-link {{ in_array($segment2, ['product-guide']) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>Product Guide List</p>
              </a>
            </li>
            @endif -->

            <!-- @if(App\Model\UserPermission::checkPermission('assign_group_to_product') > 0)
            <li class="nav-item">
              <a href="{{ route('assign_group_to_product') }}" class="nav-link {{ in_array($segment2, ['assign-group-to-product']) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>Assign Group to Product </p>
              </a>
            </li>
            @endif -->

          </ul>
        </li>
        @endif
        <!-- //========= END :: Manage suppliers =============// -->


        <!-- //========= START :: Manage filters =============// -->
        <!-- @if(App\Model\UserPermission::checkPermission('manage_filters') > 0)
        <li class="nav-item {{ in_array($segment2, ['filters', 'assign-product-filters', 'colour-palette']) ? 'menu-open' : '' }} ">
          <a href="#" class="nav-link {{ in_array($segment2, ['filters', 'assign-product-filters', 'colour-palette']) ? 'active' : '' }} ">
            <i class="nav-icon fas fa-cubes"></i>
            <p>Manage Filters<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">

            @if(App\Model\UserPermission::checkPermission('assign_filters') > 0)
            <li class="nav-item">
              <a href="{{ route('assign_product_filters')}}" class="nav-link {{ in_array($segment2, ['assign-product-filters']) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>Assign Filters </p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('create_filters') > 0)
            <li class="nav-item">
              <a href="{{ route('product_filters') }}" class="nav-link {{ in_array($segment2, ['filters']) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>Create Filters </p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('manage_colour_palette') > 0)
            <li class="nav-item">
              <a href="{{ route('colour_palette') }}" class="nav-link {{ in_array($segment2, ['colour-palette']) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>Manage Colour Palette </p>
              </a>
            </li>
            @endif

          </ul>
        </li>
        @endif -->
        <!-- //========= END :: Manage filters =============// -->


        <!-- //========= START:: Manage Products =============// -->
        <!-- @if(App\Model\UserPermission::checkPermission('manage_products') > 0)

        <li class="nav-item {{ in_array($segment2, ['product','products', 'product-type', 'product-cat', 'products-template','product-fields', 'upload-price', 'louvres-only','product-details','product-create','product-edit','product-matrix','discount-product','discount-product-list', 'product-price']) ? 'menu-open' : '' }} ">
          <a href="#" class="nav-link {{ in_array($segment2, ['product','products', 'product-type', 'product-cat', 'products-template','product-fields', 'upload-price', 'louvres-only','product-details','product-create','product-edit','product-matrix','discount-product','discount-product-list', 'product-price']) ? 'active' : '' }} ">
            <i class="nav-icon fas fa-project-diagram"></i>
            <p>Manage Products <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">

            @if(App\Model\UserPermission::checkPermission('products') > 0)
            <li class="nav-item">
              <a href="{{ route('product') }}" class="nav-link {{ in_array($segment2, ['product','product-details','product-create','product-edit']) ? 'active' : '' }}">
                <i class="fas fa-sitemap nav-icon"></i>
                <p>Products </p>
              </a>
            </li>
            @endif 

            @if(App\Model\UserPermission::checkPermission('product_templates') > 0)
            <li class="nav-item">
              <a href="{{ route('product-template-list') }}" class="nav-link {{ in_array($segment2, ['products-template']) ? 'active' : '' }}">
                <i class="fas fa-align-center nav-icon"></i>
                <p>Product Templates</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('product_fields') > 0)
            <li class="nav-item">
              <a href="{{ route('products_field_list') }}" class="nav-link {{ in_array($segment2, ['product-fields']) ? 'active' : '' }}">
                <i class="fas fa-border-all nav-icon"></i>
                <p>Product Fields</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('upload_prices') > 0)
            <li class="nav-item">
              <a href="{{ route('upload_price') }}" class="nav-link {{ in_array($segment2, ['upload-price']) ? 'active' : '' }}">
                <i class="fas fa-file-upload nav-icon"></i>
                <p>Upload Prices</p>
              </a>
            </li>
            @endif 

            @if(App\Model\UserPermission::checkPermission('manage_price_matrix') > 0)
            <li class="nav-item">
              <a href="{{ route('product_price_matrix') }}" class="nav-link {{ (($segment2=='product-matrix') && ($segment3=='price')) ? 'active' : '' }}">
                <i class="fas fa-braille nav-icon"></i>
                <p>Price Matrix</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('manage_product_template_matrix') > 0)
            <li class="nav-item">
              <a href="{{ route('product_template_matrix') }}" class="nav-link {{ (($segment2=='product-matrix') && ($segment3=='template')) ? 'active' : '' }}">
                <i class="fas fa-braille nav-icon"></i>
                <p>Template Matrix</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('manage_filter_option_matrix') > 0)
            <li class="nav-item">
              <a href="{{ route('product_option_matrix') }}" class="nav-link {{ (($segment2=='product-matrix') && ($segment3=='option')) ? 'active' : '' }}">
                <i class="fas fa-braille nav-icon"></i>
                <p>Filter Options Matrix</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('assign_product_discount') > 0)
            <li class="nav-item">
              <a href="{{ route('assign_discount_product') }}" class="nav-link {{ (($segment2=='discount-product') ) ? 'active' : '' }}">
                <i class="fas fa-tags nav-icon"></i>
                <p>Assign Discount</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('discount_product_list') > 0)
            <li class="nav-item">
              <a href="{{ route('discount_product_list') }}" class="nav-link {{ (($segment2=='discount-product-list')) ? 'active' : '' }}">
                <i class="fas fa-sitemap nav-icon"></i>
                <p>Discount Product List</p>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a href="{{ route('product_price_list') }}" class="nav-link {{ (($segment2=='product-price')) ? 'active' : '' }}">
                <i class="fas fa-money-check-alt nav-icon"></i>
                <p>Product Price Table's</p>
              </a>
            </li>
          </ul>
        </li>
        @endif -->
        <!-- //========= END:: Manage Products =============// -->




        <!-- //========= Start:: Manage Orders =============// -->
        @if(App\Model\UserPermission::checkPermission('manage_orders') > 0)
        <li class="nav-item {{ in_array($segment2, ['orders','create-quote-mn','create-order-mn', 'order-details','order-sample','supplier-order-sample']) ? 'menu-open' : '' }} ">
          <a href="#" class="nav-link {{ in_array($segment2, ['orders','create-quote-mn','create-order-mn', 'order-details','order-sample','supplier-order-sample']) ? 'active' : '' }} ">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>Manage Orders <i class="right fas fa-angle-left"></i></p>
          </a>
          @php
          $orderStatus = request()->get('st');
          @endphp

          <ul class="nav nav-treeview">
            <!-- <li class="nav-item">
              <a href="{{ route('create_quote_mn') }}" class="nav-link {{ in_array($segment2, ['create-quote-mn']) ? 'active' : '' }}">
                <i class="fas fa-plus-square nav-icon"></i>
                <p>Create Manual Quote</p>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a href="{{ route('create_order_mn') }}" class="nav-link {{ in_array($segment2, ['create-order-mn']) ? 'active' : '' }}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Create Manual Order</p>
              </a>
            </li> -->

            @if(App\Model\UserPermission::checkPermission('order_list') > 0)
            <li class="nav-item">
              <a href="{{ route('order_list') .'?st=New' }}" class="nav-link {{ (in_array($segment2, ['orders']) && ($orderStatus == 'New')) ? 'active' : '' }}">
                <i class="fas fa-calendar-plus nav-icon"></i>
                <p>New Orders</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('order_list') .'?st=Complete' }}" class="nav-link {{ (in_array($segment2, ['orders']) && ($orderStatus == 'Complete')) ? 'active' : '' }}">
                <i class="fas fa-check-circle nav-icon"></i>
                <p>Complete Orders</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('order_list') .'?st=Incomplete' }}" class="nav-link {{ (in_array($segment2, ['orders']) && ($orderStatus == 'Incomplete')) ? 'active' : '' }}">
                <i class="fas fa-check nav-icon"></i>
                <p>Incomplete Orders</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('order_list') .'?st=Failed' }}" class="nav-link {{ (in_array($segment2, ['orders']) && ($orderStatus == 'Failed')) ? 'active' : '' }}">
                <i class="fas fa-exclamation-circle nav-icon"></i>
                <p>Failed Orders</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('order_list') .'?st=Cancelled' }}" class="nav-link {{ (in_array($segment2, ['orders']) && ($orderStatus == 'Cancelled')) ? 'active' : '' }}">
                <i class="fas fa-times nav-icon"></i>
                <p>Cancelled Orders</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('order_list') .'?st=Quote' }}" class="nav-link {{ (in_array($segment2, ['orders']) && ($orderStatus == 'Quote')) ? 'active' : '' }}">
                <i class="fas fa-question-circle nav-icon"></i>
                <p>Quote Orders</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('order_list') .'?st=Refunded' }}" class="nav-link {{ (in_array($segment2, ['orders']) && ($orderStatus == 'Refunded')) ? 'active' : '' }}">
                <i class="fas fa-retweet nav-icon"></i>
                <p>Refunded Orders</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('order_list') .'?st=Unpaid' }}" class="nav-link {{ (in_array($segment2, ['orders']) && ($orderStatus == 'Unpaid')) ? 'active' : '' }}">
                <i class="fas fa-box-open nav-icon"></i>
                <p>Unpaid Orders</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('order_sample') > 0)
            <li class="nav-item">
              <a href="{{ route('order_sample') }}" class="nav-link {{ (in_array($segment2, ['order-sample'])) ? 'active' : '' }}">
                <i class="fas fa-box-tissue nav-icon"></i>
                <p>Sample Orders</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('supplier_order_sample') > 0)
            <li class="nav-item">
              <a href="{{ route('supplier_order_sample') }}" class="nav-link {{ (in_array($segment2, ['supplier-order-sample'])) ? 'active' : '' }}">
                <i class="fa fa-border-style nav-icon"></i>
                <p>Supplier Sample Order</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @endif
        <!-- //========= End:: Manage Orders =============// -->

        <!-- @if(App\Model\UserPermission::checkPermission('delivery_options') > 0)

        <li class="nav-item {{ in_array($segment2, ['express-delivery','express-delivery-cost','delivery-option']) ? 'menu-open' : '' }} ">
          <a href="#" class="nav-link {{ in_array($segment2, ['express-delivery','express-delivery-cost','delivery-option']) ? 'active' : '' }} ">
            <i class="nav-icon fas fa-headset"></i>
            <p>DELIVERY OPTIONS <i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">

            @if(App\Model\UserPermission::checkPermission('assign_express_delivery') > 0)
            <li class="nav-item">
              <a href="{{ route('express_delivery_list') }}" class="nav-link {{ (in_array($segment2, ['express-delivery'])) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>Express Delivery</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('express_delivery_cost') > 0)
            <li class="nav-item">
              <a href="{{ route('express_delivery_cost_list') }}" class="nav-link {{ (in_array($segment2, ['express-delivery-cost'])) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>Express Delivery Cost</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('delivery_option_list') > 0)
            <li class="nav-item">
              <a href="{{ route('delivery_option_list') }}" class="nav-link {{ (in_array($segment2, ['delivery-option'])) ? 'active' : '' }}">
                <i class="fas fa-cube nav-icon"></i>
                <p>Manage Delivery Options</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @endif -->


        <!-- //========= START :: Manage PROMOTIONS =============// -->
        <!-- @if(App\Model\UserPermission::checkPermission('manage_promotions') > 0)

        <li class="nav-item {{ in_array($segment2, ['promotions','discounts']) ? 'menu-open' : '' }} ">
          <a href="#" class="nav-link {{ in_array($segment2, ['promotions','discounts']) ? 'active' : '' }} ">
            <i class="nav-icon fas fa-headset"></i>
            <p>Manage Promotions <i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">
            @if(App\Model\UserPermission::checkPermission('edit_promotions') > 0)
            <li class="nav-item">
              <a href="{{ route('promotions_list') }}" class="nav-link {{ (in_array($segment2, ['promotions'])) ? 'active' : '' }}">
                <i class="fas fa-file-code nav-icon"></i>
                <p>Promotions</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('extra_discounts') > 0)
            <li class="nav-item">
              <a href="{{ route('extra_discounts') }}" class="nav-link {{ (in_array($segment2, ['discounts'])) ? 'active' : '' }}">
                <i class="fas fa-tags nav-icon"></i>
                <p>Extra Discounts</p>
              </a>
            </li>
            @endif 
          </ul>
        </li>
        @endif -->

        <!-- //========= START :: Manage CONTENT =============// -->

        @if(App\Model\UserPermission::checkPermission('manage_content') > 0)
        <li class="nav-item {{ in_array($segment2, ['blinds-glossary','feedback','home-page-manage', 'blog', 'manage-content','news-letter']) ? 'menu-open' : '' }} ">
          <a href="#" class="nav-link {{ in_array($segment2, ['blinds-glossary','feedback','home-page-manage', 'blog', 'manage-content','news-letter']) ? 'active' : '' }} ">
            <i class="nav-icon fas fa-tasks"></i>
            <p>CONTENT <i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">
            @if(App\Model\UserPermission::checkPermission('manage_content_text') > 0)
            <li class="nav-item">
              <a href="{{ route('manage_content_settings') }}" class="nav-link {{ (in_array($segment2, ['manage-content'])) ? 'active' : '' }}">
                <i class="fas fa-file-signature nav-icon"></i>
                <p>Manage Content</p>
              </a>
            </li>
            @endif
            @if(App\Model\UserPermission::checkPermission('news_letter_template') > 0)
            <li class="nav-item">
              <a href="{{ route('news_letter_list') }}" class="nav-link {{ (in_array($segment2, ['news-letter'])) ? 'active' : '' }}">
                <i class="fas fa-newspaper nav-icon"></i>
                <p>News Later Template</p>
              </a>
            </li>
            @endif

            <!-- @if(App\Model\UserPermission::checkPermission('blind_glossary') > 0)
            <li class="nav-item">
              <a href="{{ route('blinds_glossary') }}" class="nav-link {{ (in_array($segment2, ['blinds-glossary'])) ? 'active' : '' }}">
                <i class="fas fa-file-alt nav-icon"></i>
                <p>Blinds Glossary</p>
              </a>
            </li>
            @endif -->

            <!-- @if(App\Model\UserPermission::checkPermission('customer_feedback') > 0)
            <li class="nav-item">
              <a href="{{ route('feedback_list') }}" class="nav-link {{ (in_array($segment2, ['feedback'])) ? 'active' : '' }}">
                <i class="fas fa-comments nav-icon"></i>
                <p>Customer Feedback</p>
              </a>
            </li>
            @endif -->

            @if(App\Model\UserPermission::checkPermission('manage_home_page') > 0)
            <li class="nav-item">
              <a href="{{ route('manage_home_page') }}" class="nav-link {{ (in_array($segment2, ['home-page-manage'])) ? 'active' : '' }}">
                <i class="fas fa-home nav-icon"></i>
                <p>Manage Home Page</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('blog_categories') > 0)
            <li class="nav-item">
              <a href="{{ route('blog_cat_list') }}" class="nav-link {{ (($segment2 == 'blog') && ($segment3 == 'category')) ? 'active' : '' }}">
                <i class="fas fa-cubes nav-icon"></i>
                <p>Blog Categories</p>
              </a>
            </li>
            @endif

            @if(App\Model\UserPermission::checkPermission('blog_posts') > 0)
            <li class="nav-item">
              <a href="{{ route('blog_post_list') }}" class="nav-link {{ (($segment2 == 'blog') && ($segment3 == 'post')) ? 'active' : '' }}">
                <i class="fas fa-blog nav-icon"></i>
                <p>Blog Post</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @endif
        <!-- //========= END :: Manage CONTENT =============// -->

        <li class="nav-item {{ in_array($segment2, ['appointment', 'quote', 'contactus']) ? 'menu-open' : '' }} ">
          <a href="#" class="nav-link {{ in_array($segment2, ['appointment', 'quote', 'contactus']) ? 'active' : '' }} ">
            <i class="nav-icon fas fa-laptop"></i>
            <p>SUBMITTED DATA <i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('appointment_list') }}" class="nav-link {{ (in_array($segment2, ['appointment'])) ? 'active' : '' }}">
                <i class="fas fa-cloud-download-alt nav-icon"></i>
                <p>Appointments</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('quote_list') }}" class="nav-link {{ (in_array($segment2, ['quote'])) ? 'active' : '' }}">
                <i class="fas fa-cloud-download-alt nav-icon"></i>
                <p>Get Quote</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('contactus_list') }}" class="nav-link {{ (in_array($segment2, ['contactus'])) ? 'active' : '' }}">
                <i class="fas fa-cloud-download-alt nav-icon"></i>
                <p>Contact Us </p>
              </a>
            </li>

          </ul>
        </li>


        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="fas fa-sign-out-alt text-danger"></i>
            <p> &nbsp; Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>