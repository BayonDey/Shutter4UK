<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/login', 'LoginController@login')->name('login');
    Route::post('/post-login', 'LoginController@postLogin');
    Route::middleware(['adminRoute:admin'])->group(function () {
        //////////////////////////////Get Route Start/////////////////////////////////
        Route::get('/reset', function () {
            return view('admin.reset');
        });
        Route::get('/dashboard', 'DashboardController@getAdminDashboard')->name('dashboard'); // Parent Menu
        // Route::get('/logout', 'LoginController@getLogOut');
        Route::get('/logout', 'LoginController@logout')->name('logout');


        Route::get('/admin-users', 'UserController@getAdminUsers')->name('admin_users'); // Child menu
        Route::get('/users', 'UserController@getFrontendUsers')->name('frontend_users'); // Child menu
        Route::get('/users-popup', 'UserController@getPopupUsers')->name('popup_users');  // Child menu
        Route::get('/users/details/{id}', 'UserController@getUserDetails')->name('user_details');
        Route::get('/users/edit/{id}', 'UserController@editUser')->name('user_edit');
        Route::get('/user-change-status/{id}', 'UserController@changeUserStatus')->name('user_change_status');
        Route::get('/admin-users/create', 'UserController@createAdminUser')->name('create_admin_user');
        Route::get('/admin-users/edit/{id}', 'UserController@editAdminUser')->name('edit_admin_user');
        Route::get('/admin-users/delete/{id}', 'UserController@deleteAdminUser')->name('delete_admin_user');
        Route::get('/admin-users/profile/{id}', 'UserController@viewAdminUser')->name('view_admin_user');

        Route::post('/update-user/{id}', 'UserController@updateUser')->name('update_user');
        Route::post('/storeAdminUser', 'UserController@storeAdminUser')->name('storeAdminUser');


        Route::get('/menu/list', 'UserPermissionController@menuList')->name('menu_list'); // Parent Menu
        Route::get('/menu/create', 'UserPermissionController@createMenu')->name('menu_create');
        Route::get('/admin-users/permission/{userId}', 'UserPermissionController@userPermission')->name('user_permission');

        Route::post('/storeMenu', 'UserPermissionController@storeMenu')->name('storeMenu');
        Route::post('/updateAllMenus', 'UserPermissionController@updateAllMenus')->name('updateAllMenus');
        Route::post('/updateUserPermission', 'UserPermissionController@updateUserPermission')->name('updateUserPermission');


        //=== START :: Product Type ====//
        Route::post('/store_product_type', 'ProductTypeController@storeProductType')->name('store_product_type');

        Route::get('/product/type', 'ProductTypeController@getProductTypeList')->name('product_type_list');
        Route::get('/product/type/create', 'ProductTypeController@createProductType')->name('product_type_create');
        Route::get('/product/type/edit/{id}', 'ProductTypeController@editProductType')->name('product_type_edit');
        Route::get('/product-type-up-down/{id}/{flag}', 'ProductTypeController@productTypeUpDown')->name('product_type_up_down');
        Route::get('/sample-available-or-not/{id}/{flag}', 'ProductTypeController@sampleAvailableOrNot')->name('sample_available_or_not');
        Route::get('/delete_pro_type/{id}', 'ProductTypeController@deleteProductType')->name('delete_pro_type');


        //===== START:: Product controller ======//
        Route::get('/product-create/{typeId}/{catId}', 'ProductController@createProduct')->name('product_create');
        Route::get('/product-details/{id}', 'ProductController@getProductDetails')->name('product_details');
        Route::get('/products', 'ProductController@getProductList')->name('product_list_first');
        Route::get('/products/{product_type_id}/{parent_id}', 'ProductController@getProductList')->name('product_list');
        Route::get('/product-up-down/{id}/{product_type_id}/{parent_id}/{flag}', 'ProductController@productUpDown')->name('product_up_down');
        Route::get('/pro-sample-available-or-not/{id}/{product_type_id}/{parent_id}/{flag}', 'ProductController@sampleAvailableOrNot')->name('pro_sample_available_or_not');
        Route::get('/product-edit/{id}', 'ProductController@editProduct')->name('product_edit');
        Route::get('/delete_product/{id}', 'ProductController@deleteProduct')->name('delete_product');

        Route::get('/product-search', 'ProductController@getProductList_serach')->name('getProductList_serach');


        Route::get('/product', 'ProductController@product')->name('product');
        Route::get('/get_pro_cat_by_type_ajax/{pTypeId}', 'ProductController@getProCatByType_ajax')->name('get_pro_cat_by_type_ajax');
        Route::get('/get_pro_and_sub_cat_by_cat_ajax/{pTypeId}/{pCatId}', 'ProductController@getProAndSubCatByCat_ajax')->name('get_pro_and_sub_cat_by_cat_ajax');
        Route::get('/get_pro_for_sub_cat_ajax/{pTypeId}/{pCatId}', 'ProductController@getProForSubCatCat_ajax')->name('get_pro_for_sub_cat_ajax');
        Route::get('/get_view_site_link/{id}/{flag}', 'ProductController@get_view_site_link')->name('get_full_url');
        Route::get('/generateCsvForProductType', 'ProductController@generateCsvForProductType')->name('generateCsvForProductType');
        Route::get('/generateCsvForProductCategory/{pTypeId}', 'ProductController@generateCsvForProductCategory')->name('generateCsvForProductCategory');
        Route::get('/generateCsvForProductList/{pTypeId}/{pCatId}', 'ProductController@generateCsvForProductList')->name('generateCsvForProductList');
        Route::get('/getAssignContentList_ajax/{id}/{flag}/{hitNo}', 'ProductController@getAssignContentList_ajax')->name('getAssignContentList_ajax');
        Route::get('/assignContentSave_ajax/{flagId}/{flag}', 'ProductController@assignContentSave_ajax')->name('assignContentSave_ajax');
        Route::get('/get_template_fields_ajax/{template_id}/{pId}', 'ProductController@get_template_fields_ajax')->name('get_template_fields_ajax');
        Route::get('/get_assign_template_fields/{template_id}', 'ProductController@get_assign_template_fields')->name('get_assign_template_fields');
        Route::get('/get_catlist_by_type_id_ajax/{typeId}', 'ProductController@get_catlist_by_type_id_ajax')->name('get_catlist_by_type_id_ajax');
        Route::get('/delete_product_filter/{pId}/{wd}/{hg}/{lt_gt}/{gpId}/{opId}', 'ProductController@delete_product_filter')->name('delete_product_filter');
        Route::get('/get_option_list_by_group_id_ajax/{groupId}', 'ProductController@get_option_list_by_group_id_ajax')->name('get_option_list_by_group_id_ajax');
        Route::get('/get_sub_group_by_option_id_ajax/{optionId}', 'ProductController@get_sub_group_by_option_id_ajax')->name('get_sub_group_by_option_id_ajax');


        Route::post('/store_product', 'ProductController@storeProduct')->name('store_product');
        Route::post('/setPriceForTypeCategoryProduct_ajax', 'ProductController@setPriceForTypeCategoryProduct')->name('setPriceForTypeCategoryProduct_ajax');
        Route::post('/setLeadTimeForTypeCategoryProduct_ajax', 'ProductController@setLeadTimeForTypeCategoryProduct')->name('setLeadTimeForTypeCategoryProduct_ajax');
        Route::post('/assignContentSession_ajax', 'ProductController@assignContentSession_ajax')->name('assignContentSession_ajax');
        Route::post('/actionAssignContent_ajax', 'ProductController@actionAssignContent_ajax')->name('actionAssignContent_ajax');
        Route::post('/productFilterSave_ajax', 'ProductController@productFilterSave_ajax')->name('productFilterSave_ajax');

        Route::get('/upload-price', 'ProductController@uploadPrice')->name('upload_price');
        Route::get('/uploadPriceTempList_ajax', 'ProductController@uploadPriceTempList_ajax')->name('uploadPriceTempList_ajax');
        Route::get('/uploadPriceAssignOptionList_ajax', 'ProductController@uploadPriceAssignOptionList_ajax')->name('uploadPriceAssignOptionList_ajax');

        Route::get('/assign_temp_price/{id}/{band_id}', 'ProductController@assignTempPrice_ajax')->name('assign_temp_price');
        Route::get('/delete_temp_price/{id}', 'ProductController@deleteTempPrice_ajax')->name('delete_temp_price');
        Route::get('/getOptionByGrId_ajax/{GrId}/{BandId}', 'ProductController@getOptionByGrId_ajax')->name('getOptionByGrId_ajax');
        Route::get('/saveOptionbox_ajax/{optionId}/{bandId}', 'ProductController@saveOptionbox_ajax')->name('saveOptionbox_ajax');
        Route::get('/delete_price_option/{bandId}', 'ProductController@delete_price_option')->name('delete_price_option');

        Route::post('/uploadPrice_store', 'ProductController@uploadPrice_store')->name('uploadPrice_store');

        Route::get('/product-price', 'ProductController@product_price_list')->name('product_price_list');
        Route::post('/view_product_price_table', 'ProductController@view_product_price_table')->name('view_product_price_table');
        Route::post('/update_product_price', 'ProductController@update_product_price')->name('update_product_price');


        Route::get('/product-matrix/price', 'ProductMatrixController@product_price_matrix')->name('product_price_matrix');
        Route::get('/product-matrix/template', 'ProductMatrixController@product_template_matrix')->name('product_template_matrix');
        Route::get('/product-matrix/option', 'ProductMatrixController@product_option_matrix')->name('product_option_matrix');

        Route::post('/product_matrix_price_save', 'ProductMatrixController@product_matrix_price_save')->name('product_matrix_price_save');
        Route::post('/product_template_matrix_save', 'ProductMatrixController@product_template_matrix_save')->name('product_template_matrix_save');
        Route::post('/product_option_matrix_save', 'ProductMatrixController@product_option_matrix_save')->name('product_option_matrix_save');



        //=== START:: ProductTemplateController ==//
        Route::post('/store_pro_template', 'ProductTemplateController@storeProductTemplate')->name('store_pro_template');
        Route::post('/deleteTemplateLandingFields_ajax', 'ProductTemplateController@deleteTemplateLandingFields_ajax')->name('deleteTemplateLandingFields_ajax');
        Route::post('/add_field_to_template', 'ProductTemplateController@add_field_to_template')->name('add_field_to_template');

        Route::get('/products-template', 'ProductTemplateController@getProductTemplateList')->name('product-template-list');
        Route::get('/products-template/create', 'ProductTemplateController@createProductTemplate')->name('product_template_create');
        Route::get('/products-template/edit/{id}', 'ProductTemplateController@editProductTemplate')->name('product_template_edit');
        Route::get('/delete_template/{id}', 'ProductTemplateController@delete_template')->name('delete_template');

        //=== END:: ProductTemplateController ==//

        Route::get('/product/category/{product_type_id}', 'ProductCategoryController@getProductCatList')->name('product_cat_list');
        Route::get('/product/category/create/{product_type_id}', 'ProductCategoryController@createProductCategory')->name('product_cat_create');
        Route::get('/product/category/edit/{id}', 'ProductCategoryController@editProductCategory')->name('product_cat_edit');
        Route::get('/product-cat-up-down/{id}/{product_type_id}/{flag}', 'ProductCategoryController@productCatUpDown')->name('product_cat_up_down');
        Route::get('/cat-sample-available-or-not/{id}/{product_type_id}/{flag}', 'ProductCategoryController@sampleAvailableOrNot')->name('cat_sample_available_or_not');
        Route::get('/delete_pro_cat/{id}', 'ProductCategoryController@deleteProductCategory')->name('delete_pro_cat');
        Route::get('/get_pro_cat_by_type_id_ajax/{product_type_id}', 'ProductCategoryController@getProCatByTypeId_ajax')->name('get_pro_cat_by_type_id_ajax');

        Route::post('/store_product_category', 'ProductCategoryController@storeProductCategory')->name('store_product_category');


        //====== START:: Product Template fields ====//
        Route::get('/product-fields', 'ProductFieldController@getProductTemplateFieldList')->name('products_field_list');
        Route::get('/product-fields/create', 'ProductFieldController@create_field')->name('create_field');
        Route::get('/product-fields/edit/{id}', 'ProductFieldController@edit_field')->name('edit_field');
        Route::get('/product-fields/delete/{id}', 'ProductFieldController@delete_field')->name('delete_field');

        Route::post('/storeProductField', 'ProductFieldController@storeProductField')->name('storeProductField');
        //====== END:: Product Template fields ====//

        //====== START:: Suppliers && GUIDE  ====//
        Route::get('/supplier/list', 'SupplierController@supplierList')->name('supplier_list');
        Route::get('/supplier/create', 'SupplierController@createSupplier')->name('create_supplier');
        Route::get('/supplier/edit/{id}', 'SupplierController@editSupplier')->name('edit_supplier');
        Route::get('/deleteSupplier/{id}', 'SupplierController@deleteSupplier')->name('delete_supplier');
        Route::get('/supplier/ftp/{supplierId}', 'SupplierController@setSupplierFTP')->name('set_supplier_ftp');

        Route::post('/storeSupplier', 'SupplierController@storeSupplier')->name('storeSupplier');
        Route::post('/storeSupplierFTP', 'SupplierController@storeSupplierFTP')->name('storeSupplierFTP');

        Route::get('/band/{supplierId}', 'SupplierController@bandList')->name('band_list');
        Route::get('/band/create/{supplierId}', 'SupplierController@bandCreate')->name('band_create');
        Route::get('/band/edit/{bandId}', 'SupplierController@bandEdit')->name('band_edit');
        Route::get('/band-delete/{bandId}', 'SupplierController@bandDelete')->name('band_delete');
        Route::get('/bandGroupRemove/{id}/{bandId}/{flagId}/{flag}', 'SupplierController@bandGroupRemove')->name('band_group_remove');
        Route::get('/bandGroupEnableDisable_ajax/{grId}', 'SupplierController@bandGroupEnableDisable_ajax')->name('bandGroupEnableDisable');
        Route::get('/bandGroupMove/{groupId}/{bandId}/{position}/{moveFlag}', 'SupplierController@bandGroupMove')->name('band_group_move');
        Route::get('/bandGroupOptionDelete/{optionId}/{bandId}', 'SupplierController@bandGroupOptionDelete')->name('band_group_option_delete');

        Route::post('/bandCreate_store', 'SupplierController@bandCreate_store')->name('bandCreate_store');
        Route::post('/bandUpdate_store', 'SupplierController@bandUpdate_store')->name('bandUpdate_store');
        Route::post('/bandGroup_store', 'SupplierController@bandGroup_store')->name('bandGroup_store');
        Route::post('/bandGroupOption_store', 'SupplierController@bandGroupOption_store')->name('bandGroupOption_store');
        Route::post('/enableWebUpdate', 'SupplierController@enableWebUpdate')->name('enableWebUpdate');


        Route::post('/copyBand', 'SupplierController@copyBand')->name('copyBand');
        Route::post('/importGroupToBand', 'SupplierController@importGroupToBand')->name('importGroupToBand');

        //====== END:: Suppliers  ====//


        //====== START:: Guide  ====//
        Route::get('/guide/list', 'GuideController@guideList')->name('guide_list');
        Route::get('/guide/create', 'GuideController@guideCreate')->name('guide_create');
        Route::get('/guide/edit/{id}', 'GuideController@guideEdit')->name('guide_edit');
        Route::get('/guide/delete/{id}', 'GuideController@guideDelete')->name('guide_delete');

        Route::post('/guide_store', 'GuideController@guide_store')->name('guide_store');


        Route::get('/product-guide', 'GuideController@productGuideList')->name('product_guide');
        Route::get('/product-guide/create', 'GuideController@productGuideCreate')->name('product_guide_create');
        Route::get('/product-guide/edit/{id}', 'GuideController@productGuideEdit')->name('product_guide_edit');
        Route::get('/product-guide/delete/{id}', 'GuideController@productGuideDelete')->name('product_guide_delete');

        Route::post('/product_guide_store', 'GuideController@productGuide_store')->name('product_guide_store');
        Route::post('/product_guide_field_store', 'GuideController@productGuideField_store')->name('product_guide_field_store');
        Route::post('/productGuideField_image_and_delete', 'GuideController@productGuideField_image_and_delete')->name('productGuideField_image_and_delete');

        Route::get('/assign-group-to-product', 'GuideController@assign_group_to_product')->name('assign_group_to_product');
        Route::get('/guide_matrix', 'GuideController@guide_matrix')->name('guide_matrix');

        Route::post('/guide_matrix_save', 'GuideController@guide_matrix_save')->name('guide_matrix_save');

        Route::get('/discount-product', 'DiscountController@assign_discount_product')->name('assign_discount_product');
        Route::get('/discount-product-list', 'DiscountController@discount_product_list')->name('discount_product_list');

        Route::post('/assign_discount_product_save', 'DiscountController@assign_discount_product_save')->name('assign_discount_product_save');
        Route::post('/delete_discount_product', 'DiscountController@delete_discount_product')->name('delete_discount_product');


        //====== END:: Guide  ====//


        //====== START:: Product Filter   ====//
        Route::get('/filters', 'ProductFilterController@product_filters')->name('product_filters');
        Route::get('/product_filters_delete/{id}', 'ProductFilterController@product_filters_delete')->name('product_filters_delete');
        Route::get('/assign-product-filters', 'ProductFilterController@assign_product_filters')->name('assign_product_filters');
        Route::get('/colour-palette', 'ProductFilterController@manageColourPalette')->name('colour_palette');
        Route::get('/update_colour_palette/{id}', 'ProductFilterController@update_colour_palette')->name('update_colour_palette');

        Route::post('/product_filter_save', 'ProductFilterController@product_filter_save')->name('product_filter_save');
        Route::post('/product_filter_matrix_save', 'ProductFilterController@product_filter_matrix_save')->name('product_filter_matrix_save');

        //====== END:: Product Filter  ====//


        Route::get('/orders', 'OrderController@getOrderList')->name('order_list');
        Route::get('/order-details/{id}', 'OrderController@getOrderDetails')->name('order_details');
        Route::get('/create-order-mn', 'OrderController@createManualOrder')->name('create_order_mn');
        Route::get('/create-quote-mn', 'OrderController@createManualQuote')->name('create_quote_mn');
        Route::get('/updateOrderCancel/{id}', 'OrderController@updateOrderCancel')->name('updateOrderCancel');
        Route::get('/orderDeleteAndRestore/{id}', 'OrderController@orderDeleteAndRestore')->name('orderDeleteAndRestore');

        Route::post('/update_order_address', 'OrderController@updateOrderAddress')->name('update_order_address');
        Route::post('/update_order_status', 'OrderController@updateOrderStatus')->name('update_order_status');
        Route::post('/updateOrderStatus_multiple', 'OrderController@updateOrderStatus_multiple')
            ->name('updateOrderStatus_multiple'); // This action also used for generate pdf
        // Route::post('/generate-order-pdf', 'OrderController@generateOrderPDF')->name('generate_order_pdf'); 
        Route::get('/order-pdf', 'OrderController@OrderPDF')->name('order_pdf'); // used only for view structure

        Route::get('/order-sample', 'OrderController@order_sample')->name('order_sample');
        Route::post('/sample-order-pdf', 'OrderController@sampleOrderPDF')->name('sample_order_pdf');

        Route::get('/supplier-order-sample', 'OrderController@supplier_order_sample')->name('supplier_order_sample');


        Route::get('/promotions/list', 'PromotionsController@promotionsList')->name('promotions_list');
        Route::get('/promotions/create', 'PromotionsController@promotionsCreate')->name('promotions_create');
        Route::get('/promotions/edit/{id}', 'PromotionsController@promotionsEdit')->name('promotions_edit');
        Route::get('/promotions/delete/{id}', 'PromotionsController@promotionsDelete')->name('promotions_delete');

        Route::get('/discounts/list', 'PromotionsController@extraDiscounts')->name('extra_discounts');
        Route::get('/discounts/create', 'PromotionsController@extraDiscountsCreate')->name('extra_discounts_create');
        Route::get('/discounts/edit/{id}', 'PromotionsController@extraDiscountsEdit')->name('extra_discounts_edit');
        Route::get('/discounts/delete/{id}', 'PromotionsController@extraDiscountsDelete')->name('extra_discounts_delete');
        Route::post('/extraDiscounts_store', 'PromotionsController@extraDiscounts_store')->name('extraDiscounts_store');

        Route::get('/promotions-popup', 'PromotionsController@popup_promotion')->name('popup_promotion');
        Route::get('/collection-promo-banner', 'PromotionsController@collection_promo_banner')->name('collection_promo_banner');
        Route::get('/promotion-countdown', 'PromotionsController@promotion_countdown')->name('promotion_countdown');

        Route::post('/promotions_store', 'PromotionsController@promotions_store')->name('promotions_store');

        //====== START :: Manage CONTENT  ====//

        Route::get('/feedback/list', 'FeedbackController@feedbackList')->name('feedback_list');
        Route::get('/feedback_promote_to_front/{id}', 'FeedbackController@feedback_promote_to_front')->name('feedback_promote_to_front');

        Route::get('/manage-content', 'ManageContentController@manageContentSettings')->name('manage_content_settings');
        Route::get('/manage-content/edit/{id}', 'ManageContentController@manageContentEdit')->name('manage_content_settings_edit');
        Route::post('/manage_content_save', 'ManageContentController@manageContentSave')->name('manage_content_settings_save');

        Route::get('/news-letter', 'NewsLetterController@newsLetterList')->name('news_letter_list');
        Route::get('/news-letter/create', 'NewsLetterController@newsLetterCreate')->name('news_letter_create');
        Route::get('/news-letter/edit/{id}', 'NewsLetterController@newsLetterEdit')->name('news_letter_edit');
        Route::get('/news-letter/delete/{id}', 'NewsLetterController@newsLetterDelete')->name('news_letter_delete');
        Route::post('/newsLetter_store', 'NewsLetterController@newsLetter_store')->name('newsLetter_store');


        Route::get('/blinds-glossary', 'FeedbackController@blindsGlossary')->name('blinds_glossary');
        Route::get('/blinds-glossary/child/create', 'FeedbackController@blindsGlossary_child_create')->name('blinds_glossary_child_create');
        Route::get('/blinds-glossary/child/{id}', 'FeedbackController@blindsGlossary_child_edit')->name('blinds_glossary_child_edit');
        Route::get('/blinds-glossary/delete/{id}', 'FeedbackController@blindsGlossary_child_delete')->name('blinds_glossary_child_delete');

        Route::post('/blindsGlossary_save', 'FeedbackController@blindsGlossary_save')->name('blindsGlossary_save');
        Route::post('/blindsGlossary_child_save', 'FeedbackController@blindsGlossary_child_save')->name('blindsGlossary_child_save');

        Route::get('/home-page-manage', 'FeedbackController@manageHomePage')->name('manage_home_page');
        Route::get('/home-page-manage/thumbnail', 'FeedbackController@productThumbnail')->name('product_thumbnail');
        Route::get('/update_homepage_image/{id}/{val}', 'FeedbackController@update_homepage_image')->name('update_homepage_image');
        Route::get('/homepage_image_ordering/{id}/{flag}', 'FeedbackController@homepage_image_ordering')->name('homepage_image_ordering');
        Route::get('/productThumbnail_edit/{id}', 'FeedbackController@productThumbnail_edit')->name('productThumbnail_edit');
        Route::post('/productThumbnail_save', 'FeedbackController@productThumbnail_save')->name('productThumbnail_save');
        Route::get('/home-page-manage/slide', 'FeedbackController@home_page_slide_form')->name('home_page_slide_form');

        Route::get('/home-page-manage/thumb_sale_img', 'FeedbackController@thumb_sale_img')->name('thumb_sale_img');
        Route::post('/home-page-manage/thumb_sale_img_update', 'FeedbackController@thumb_sale_img_update')->name('thumb_sale_img_update');

        Route::get('/home-page-manage/big_thumb_sale_img', 'FeedbackController@big_thumb_sale_img')->name('big_thumb_sale_img');
        Route::get('/home-page-manage/top_slider_img', 'FeedbackController@top_slider_img')->name('top_slider_img');

        Route::get('/blog/homepage', 'BlogController@manageHomepage')->name('blog_homepage');

        Route::get('/blog/category', 'BlogController@blogCatList')->name('blog_cat_list');
        Route::get('/blog/category/create', 'BlogController@blogCatCreate')->name('blog_cat_create');
        Route::get('/blog/category/edit/{template_id}', 'BlogController@blogCatEdit')->name('blog_cat_edit');
        Route::get('/blog_cat_delete/{template_id}', 'BlogController@blogCatDelete')->name('blog_cat_delete');
        Route::post('/blogCat_store', 'BlogController@blogCat_store')->name('blogCat_store');

        Route::get('/blog/post/list', 'BlogController@blogPostList')->name('blog_post_list');
        Route::get('/blog/post/create', 'BlogController@blogPostCreate')->name('blog_post_create');
        Route::get('/blog/post/edit/{template_id}', 'BlogController@blogPostEdit')->name('blog_post_edit');
        Route::get('/blog_post_delete/{template_id}', 'BlogController@blogPostDelete')->name('blog_post_delete');
        Route::get('/blog_post_promot/{template_id}', 'BlogController@blogPostPromote')->name('blog_post_promot');
        Route::post('/blogPost_store', 'BlogController@blogPost_store')->name('blogPost_store');

        //====== END :: Manage CONTENT  ====//

        //====== START :: ADMIN MANAGER  ====//
        Route::get('/download-product-image', 'ProductTypeController@downloadProductImage')->name('download_product_image');
        Route::post('/create-zip', 'ProductTypeController@createProductImageZip')->name('create_product_image_zip');
        Route::get('/download-zip/{id}', 'ProductTypeController@downloadProductImageZip')->name('download_product_image_zip');


        Route::get('/gdpr-user-list', 'GdprController@gdprUserList')->name('gdpr_user_list');
        Route::get('/gdpr_user_status_update/{id}/{status}', 'GdprController@gdpr_user_status_update')->name('gdpr_user_status_update');
        Route::get('/generate-report', 'GenerateReportController@generate_report')->name('generate_report');
        Route::post('/dn-generate-report', 'GenerateReportController@dn_generate_report')->name('dn_generate_report');

        //====== END :: ADMIN MANAGER  ====//

        //====== START :: DELIVERY OPTIONS  ====//
        Route::get('/express-delivery/list', 'DeliveryController@express_delivery_list')->name('express_delivery_list');
        Route::get('/express-delivery/assign', 'DeliveryController@assign_express_delivery')->name('assign_express_delivery');
        Route::get('/express-delivery/edit/{id}', 'DeliveryController@express_delivery_edit')->name('express_delivery_edit');

        Route::post('/express_delivery_store', 'DeliveryController@express_delivery_store')->name('express_delivery_store');
        Route::post('/assign_express_delivery_save', 'DeliveryController@assign_express_delivery_save')->name('assign_express_delivery_save');
        Route::post('/assign_express_delivery_delete', 'DeliveryController@assign_express_delivery_delete')->name('assign_express_delivery_delete');

        Route::get('/express-delivery-cost/list', 'DeliveryController@express_delivery_cost_list')->name('express_delivery_cost_list');
        Route::get('/express-delivery-cost/create', 'DeliveryController@express_delivery_cost_create')->name('express_delivery_cost_create');
        Route::get('/express-delivery-cost/edit/{id}', 'DeliveryController@express_delivery_cost_edit')->name('express_delivery_cost_edit');

        Route::post('/express_delivery_cost_store', 'DeliveryController@express_delivery_cost_store')->name('express_delivery_cost_store');
        Route::post('/express_delivery_cost_delete', 'DeliveryController@express_delivery_cost_delete')->name('express_delivery_cost_delete');

        Route::get('/delivery-option/list', 'DeliveryController@delivery_option_list')->name('delivery_option_list');
        Route::get('/delivery-option/create', 'DeliveryController@delivery_option_create')->name('delivery_option_create');
        Route::get('/delivery-option/edit/{id}', 'DeliveryController@delivery_option_edit')->name('delivery_option_edit');

        Route::post('/delivery_option_store', 'DeliveryController@delivery_option_store')->name('delivery_option_store');
        Route::post('/delivery_option_delete', 'DeliveryController@delivery_option_delete')->name('delivery_option_delete');

        //====== END :: DELIVERY OPTIONS  ====//

        //==================== New Actions ========================//
        Route::get('/appointment-time/list', 'AppointTimeController@appointment_time')->name('appointment_time');
        Route::get('/appointment-time/create', 'AppointTimeController@appointment_time_create')->name('appointment_time_create');
        Route::get('/appointment-time/edit/{id}', 'AppointTimeController@appointment_time_edit')->name('appointment_time_edit');
        Route::get('/appoint_time_show_front/{id}', 'AppointTimeController@appoint_time_show_front')->name('appoint_time_show_front');
        Route::post('/appointment_time_store', 'AppointTimeController@appointment_time_store')->name('appointment_time_store');

        Route::get('/department/list', 'DepartmentController@department_list')->name('department_list');
        Route::get('/department/create', 'DepartmentController@department_create')->name('department_create');
        Route::get('/department/edit/{id}', 'DepartmentController@department_edit')->name('department_edit');
        Route::get('/department/contact/{id}', 'DepartmentController@department_contact_list')->name('department_contact_list');
        Route::get('/department/appointments/{id}', 'DepartmentController@department_appointments_list')->name('department_appointments_list');
        Route::get('/department/quote/{id}', 'DepartmentController@department_quote_list')->name('department_quote_list');
        Route::get('/department/products/{id}', 'DepartmentController@department_products_list')->name('department_products_list');
        Route::get('/department/category/{id}', 'DepartmentController@department_category_list')->name('department_category_list');
        Route::post('/department_store', 'DepartmentController@department_store')->name('department_store');

        
        Route::get('/appointment/list', 'SubmittedDataController@appointment_list')->name('appointment_list');
        Route::get('/appointment/details/{id}', 'SubmittedDataController@appointment_details')->name('appointment_details');
        Route::get('/quote/list', 'SubmittedDataController@quote_list')->name('quote_list');
        Route::get('/quote/details/{id}', 'SubmittedDataController@quote_details')->name('quote_details');

        Route::get('/contactus/list', 'SubmittedDataController@contactus_list')->name('contactus_list');
        Route::get('/contactus/details/{id}', 'SubmittedDataController@contactus_details')->name('contactus_details');
        
        Route::get('/generate_pdf_single/{flag}/{id}', 'SubmittedDataController@generate_pdf_single')->name('generate_pdf_single');
        Route::post('/generate_csv_submitted', 'SubmittedDataController@generate_csv_submitted')->name('generate_csv_submitted');
   
        Route::get('/dep-category/list', 'DepartmentCategoryController@category_list')->name('category_list');
        Route::get('/dep-category/create', 'DepartmentCategoryController@category_create')->name('category_create');
        Route::get('/dep-category/edit/{id}', 'DepartmentCategoryController@category_edit')->name('category_edit');
        Route::get('/promote_front_category/{id}', 'DepartmentCategoryController@promote_front_category')->name('promote_front_category');
        Route::post('/category_store', 'DepartmentCategoryController@category_store')->name('category_store');
        
        Route::get('/dep-product/list', 'DepartmentProductController@product_list')->name('product_list');
        Route::get('/dep-product/create', 'DepartmentProductController@product_create')->name('product_create');
        Route::get('/dep-product/edit/{id}', 'DepartmentProductController@product_edit')->name('product_edit');
        Route::get('/promote_front_product/{id}', 'DepartmentProductController@promote_front_product')->name('promote_front_product');
        Route::get('/dep-product-img-del/{id}', 'DepartmentProductController@dep_product_img_del')->name('dep_product_img_del');
        Route::post('/product_store', 'DepartmentProductController@product_store')->name('product_store');
      
        Route::get('/dep-slider/list', 'DepartmentSliderController@slider_list')->name('slider_list');
        Route::get('/dep-slider/create', 'DepartmentSliderController@slider_create')->name('slider_create');
        Route::get('/dep-slider/edit/{id}', 'DepartmentSliderController@slider_edit')->name('slider_edit');
        Route::get('/dep-slider/delete/{id}', 'DepartmentSliderController@slider_delete')->name('slider_delete');
        Route::post('/slider_store', 'DepartmentSliderController@slider_store')->name('slider_store');
      
        Route::get('/dep-client/{id}', 'DepartmentController@client_details')->name('client_details');
        Route::post('/client_details_save', 'DepartmentController@client_details_save')->name('client_details_save');
        
    });
});
