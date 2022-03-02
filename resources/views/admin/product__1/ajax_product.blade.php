<?php
$noImg = asset('admin/dist/img/noImg.jpg');

?>
@if(!empty($pCats))
<table class="table text-nowrap m-16px" id="pTypeChild__{{$pTypeId}}">
    @foreach($pCats as $i =>$pCat)
    <tr class="pCatTR " id="pCat__{{$pTypeId}}__{{$pCat->id}}">
        <td class="pCatNameTD" id="pCatName__{{$pTypeId}}__{{$pCat->id}}">
            <div class="card item-card">
                <div class="d-flex justify-content-between align-items-center">
                    <span>
                        @if($pCat->promote_to_front == 't')
                        <i class="fa fa-caret-right text-success" id="pCatIcon__{{$pTypeId}}__{{$pCat->id}}" title="Promote to front"></i>
                        @else
                        <i class="fa fa-times text-danger"></i>
                        @endif
                        &nbsp;
                        <u class="pCatNameU " id="pCatU__{{$pTypeId}}__{{$pCat->id}}">{{$pCat->name}}</u>
                        <input type="hidden" id="hidden_setPriceCat_{{$pCat->id}}" value="{{ $pCat->name }}">

                    </span>
                    <div class="action-button-wrap">
                        <h3 class="act-button-title">Action</h3>

                        <a href="{{route('generateCsvForProductList',['pTypeId' => $pCat->product_type_id, 'pCatId' => $pCat->id])}}" type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Download product list csv under this category">
                            <i class="far fa fa-file-csv"></i>
                        </a>
                        <a href="{{ route('get_full_url', ['id'=>  $pCat->id, 'flag'=>'category']) }}" target="_blank" type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="View in Site">
                            <i class="far fa-eye"></i>
                        </a>

                        @if (App\Model\UserPermission::checkPermission('products', 'edit') > 0)
                        <a href="{{ route('product_cat_edit', $pCat->id) }}" type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        @endif

                        <a href="#" type="button" class="btn btn-outline-success setPrice_btn" id="setPriceCat__{{$pCat->id}}" data-toggle="tooltip" data-placement="top" title="Set Prices">
                            <i class="fas fa-euro-sign"></i>
                        </a>
                        <a href="#" type="button" class="btn btn-outline-light setLeadTime_btn" id="setLeadTimeCat__{{$pCat->id}}" data-toggle="tooltip" data-placement="top" title="Set Lead Time">
                            <i class="far fa-clock"></i>
                        </a>

                        <!-- <a href="#" type="button" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Samples Availability">
                            <i class="fas fa-calendar-check"></i>
                        </a> -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-warning   dropdown-hover  " title="Samples Availability" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span><i class="fas fa-calendar-check"></i>
                            </button>
                            <div class="dropdown-menu" role="menu">

                                <a class="dropdown-item" href="{{ route('cat_sample_available_or_not', ['id' => $pCat->id,'product_type_id' => $pCat->product_type_id, 'flag'=>'y']) }}" onclick="return confirm('You can use Yes, samples available to allow all products in all categories and sub-categories under \'{{ $pCat->name }}\' to be offered as samples.\nAre you sure?')" title="Yes, samples available">
                                    <i class="fa fa-thumbs-up"></i> Yes, samples available
                                </a>

                                <a class="dropdown-item" href="{{ route('cat_sample_available_or_not', ['id' => $pCat->id,'product_type_id' => $pCat->product_type_id, 'flag'=>'n']) }}" onclick="return confirm('You can use No, samples not available to allow all products in all categories and sub-categories under \'{{ $pCat->name }}\' to be offered as samples.\nAre you sure?')" title="No, samples not available">
                                    <i class="fa fa-thumbs-down"></i> No, samples not available
                                </a>
                            </div>
                        </div>


                        <a href="#" type="button" class="btn btn-outline-info assignContent_btn" id="assignContentCat__{{$pCat->id}}" data-toggle="tooltip" data-placement="top" title="Assign Content">
                            <i class="fas fa-clipboard-list"></i>
                        </a>

                        @if (App\Model\UserPermission::checkPermission('products', 'add') > 0)
                        <a href="{{route('product_create', ['typeId' => $pTypeId,'catId' => $pCat->id])}}" type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Product">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                        @endif

                        @if (App\Model\UserPermission::checkPermission('products', 'delete') > 0)
                        <a href="{{ route('delete_pro_cat', ['id' => $pCat->id]) }}" type="button" onclick="return confirm('{{ $pCat->name }}:: Are you sure you want to delete this item? Any sub categories or products will also be deleted.')" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                        @endif


                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-warning dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span><i class="fas fa-sort-amount-up-alt"></i>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                @if ($i > 0)
                                <a class="dropdown-item" href="{{route('product_cat_up_down', ['id' => $pCat->id, 'product_type_id' => $pCat->product_type_id, 'flag'=>'top'])}}">
                                    Move to top
                                </a>
                                <a class="dropdown-item" href="{{route('product_cat_up_down', ['id' => $pCat->id, 'product_type_id' => $pCat->product_type_id, 'flag'=>'up'])}}">
                                    Move up
                                </a>
                                @endif

                                @if ($i != (count($pCats) - 1))

                                <a class="dropdown-item" href="{{route('product_cat_up_down', ['id' => $pCat->id, 'product_type_id' => $pCat->product_type_id, 'flag'=>'down'])}}">
                                    Move down
                                </a>
                                <a class="dropdown-item" href="{{route('product_cat_up_down', ['id' => $pCat->id, 'product_type_id' => $pCat->product_type_id, 'flag'=>'bottom'])}}">
                                    Move to bottom
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="append_sub_cat_and_product" id="appendSubCatAndPro__{{$pTypeId}}__{{$pCat->id}}"></div>
            </div>
        </td>
    </tr>
    @endforeach
</table>
@endif



@if(!empty($pSubCats) || !empty($products))
<div id="pCatChild__{{$pCatId}}">

    @if(!empty($pSubCats))
    <table class="table table-head-fixed text-nowrap ">
        @foreach($pSubCats as $i=>$pCat)
        <tr class="pSubCatTR card item-card" id="pSubCat__{{$pTypeId}}__{{$pCat->id}}">
            <td class="pSubCatNameTD " id="pSubCatName__{{$pTypeId}}__{{$pCat->id}}">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        @if($pCat->promote_to_front == 't')
                        <i class="fa fa-caret-right text-success" id="pSubCatIcon__{{$pTypeId}}__{{$pCat->id}}" title="Promote to front"></i>
                        @else
                        <i class="fa fa-times text-danger"></i>
                        @endif
                        <u class="pSubCatNameU " id="pSubCatU__{{$pTypeId}}__{{$pCat->id}}">{{$pCat->name}}</u>
                        <input type="hidden" id="hidden_setPriceCat_{{$pCat->id}}" value="{{ $pCat->name }}">

                    </div>

                    <div>

                        <a href="{{route('generateCsvForProductList',['pTypeId' => $pTypeId, 'pCatId' => $pCat->id])}}" type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Download product list csv under this sub category">
                            <i class="far fa fa-file-csv"></i>
                        </a>

                        @if (App\Model\UserPermission::checkPermission('products', 'add') > 0)
                        <a href="{{route('product_create', ['typeId' => $pTypeId,'catId' => $pCat->id])}}" type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Add New Product">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                        @endif

                        <div class="btn-group">
                            <!-- <button type="button" class="btn btn-info"></button> -->
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>Action d
                            </button>

                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="{{ route('get_full_url', ['id'=>  $pCat->id, 'flag'=>'sub_category']) }}">View in Site</a>
                                <!-- <a class="dropdown-item" href="{{route('product_list',['product_type_id' => $pCat->product_type_id, 'parent_id' => $pCat->id])}}" target="_blank">Browse</a> -->

                                @if (App\Model\UserPermission::checkPermission('products', 'edit') > 0)
                                <a class="dropdown-item" href="{{ route('product_cat_edit', $pCat->id) }}">Edit</a>
                                @endif

                                <a class="dropdown-item  setPrice_btn" id="setPriceCat__{{$pCat->id}}" href="#">Set
                                    Prices</a>
                                <a class="dropdown-item setLeadTime_btn" id="setLeadTimeCat__{{$pCat->id}}" href="#">Set
                                    Lead Time</a>

                                <span class="dropdown-item" title="{{ $pCat->name }} :: &#013;You can use this to allow all products in all categories and sub-categories &#013;under {{ $pCat->name }} to be offered as samples">
                                    Samples Availability
                                    <!-- <br> -->&nbsp;
                                    <a href="{{ route('cat_sample_available_or_not', ['id' => $pCat->id,'product_type_id' => $pCat->product_type_id, 'flag'=>'y']) }}" onclick="return confirm('You can use Yes, samples available to allow all products in all categories and sub-categories under \'{{ $pCat->name }}\' to be offered as samples.\nAre you sure?')" title="Yes, samples available">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('cat_sample_available_or_not', ['id' => $pCat->id,'product_type_id' => $pCat->product_type_id, 'flag'=>'n']) }}" onclick="return confirm('You can use No, samples not available to allow all products in all categories and sub-categories under \'{{ $pCat->name }}\' to be offered as samples.\nAre you sure?')" title="No, samples not available">
                                        <i class="fa fa-thumbs-down"></i>
                                    </a>
                                </span>


                                <!-- <a class="dropdown-item" href="#">Add New Category</a> -->
                                <a class="dropdown-item assignContent_btn" id="assignContentCat__{{$pCat->id}}" href="#">Assign Content</a>

                                @if (App\Model\UserPermission::checkPermission('products', 'delete') > 0)
                                <a href="{{ route('delete_pro_cat', ['id' => $pCat->id]) }}" class="dropdown-item" onclick="return confirm('{{ $pCat->name }}:: Are you sure you want to delete this item? Any sub categories or products will also be deleted.')">
                                    Delete
                                </a>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>

                <div class="append_pro_fr_sub_cat" id="appendProFrSubCat__{{$pTypeId}}__{{$pCat->id}}"></div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

    @if(!empty($products))
    <table class="table table-head-fixed text-nowrap" id="prold__{{$pTypeId}}">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Image</th>
                <th>Product Name</th>
                <!-- <th>Supplied Name</th> -->
                <th>Trade</th>
                <th>Retail</th>
                <th>Sale</th>
                <th>Sale</th>
                <!-- <th>Lead</th> -->
                <th>Sample</th>
                <th>Action</th>
            </tr>
        </thead>
        @if(count($products) == 0)
        <tr class="proTR " id="pro__0">
            <td colspan="8">No Porduct</td>
        </tr>
        @endif
        @foreach($products as $i=>$product)
        <tr class="proTR " id="pro__{{$product->id}}">
            <!-- <td>{{$product->id}}</td> -->
            <td>
                <?php
                $pimage_ph = (file_exists(public_path() . "/uploads/v2_products/" . $product->image_name)) ? asset('uploads/v2_products/' . $product->image_name) : $noImg;
                ?>
                <!-- <a href="{{$pimage_ph}}" target="_blank"><img src="{{$pimage_ph}}" width="80px"></a> -->
                <span class='productImg'>
                    <img src="{{$pimage_ph}}" width="45px" height="45px">
                </span>
            </td>
            <td class="proNameTD" id="proName__{{$product->id}}">

                <a href="{{ route('product_edit', $product->id) }}">
                    @if($product->promote_to_front == 't')
                    <i class="fa fa-caret-right text-success" title="Promote to front"></i>
                    @else
                    <i class="fa fa-times text-danger"></i>
                    @endif
                    {{$product->name}}
                </a><br>
                <u>{{ $product->supplied_name }}</u>
                <input type="hidden" id="hidden_setPricePro_{{$product->id}}" value="{{ $product->name }}">
                <input type="hidden" id="hidden_trade_percentage_{{$product->id}}" value="{{ $product->trade_percentage }}">
                <input type="hidden" id="hidden_profit_margin_{{$product->id}}" value="{{ $product->profit_margin }}">
                <input type="hidden" id="hidden_sales_percentage_{{$product->id}}" value="{{ $product->sales_percentage }}">
                <input type="hidden" id="hidden_sale_start_{{$product->id}}" value="{{ $product->sale_start }}">
                <input type="hidden" id="hidden_sale_end_{{$product->id}}" value="{{ $product->sale_end }}">
                <input type="hidden" id="hidden_lead_time_days_{{$product->id}}" value="{{ $product->lead_time_days }}">

            </td>
            <!-- <td>{{ $product->supplied_name }}</td> -->
            <td>{{ $product->trade_percentage }}%</td>
            <td>{{ $product->profit_margin }}%</td>
            <td>{{ $product->sales_percentage }}%</td>
            <td>{{ date('d/m/y', strtotime($product->sale_start)) }} - <br>
                @if(strtotime($product->sale_end) < strtotime(date('Y-m-d'))) <p class="error">
                    {{ date('d/m/y', strtotime($product->sale_end)) }}</p>
                    @else
                    {{ date('d/m/y', strtotime($product->sale_end)) }}
                    @endif
            </td>
            <!-- <td>{{ $product->lead_time_days }}</td> -->
            <td>{{ ($product->allow_samples == 'y') ? "Yes" : "No" }}</td>


            <td>

                <div>
                    <div class="btn-group">
                        <!-- <button type="button" class="btn btn-info"></button> -->
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>Action
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('product_details', $product->id) }}">View</a>
                            <a class="dropdown-item" href="{{ route('get_full_url', ['id'=>  $product->id, 'flag'=>'product']) }}" target="_blank">View in Site</a>
                            <!-- <a class="dropdown-item" href="#">Browse</a> -->

                            @if (App\Model\UserPermission::checkPermission('products', 'edit') > 0)
                            <a class="dropdown-item" href="{{ route('product_edit', $product->id) }}">Edit</a>
                            @endif

                            <a class="dropdown-item setPrice_btn" id="setPricePro__{{$product->id}}" href="#">Set
                                Prices</a>
                            <a class="dropdown-item setLeadTime_btn" id="setLeadTimePro__{{$product->id}}" href="#"> Set
                                Lead Time</a>

                            <span class="dropdown-item" title="{{ $product->name }} :: &#013;You can use this to allow the product &#013;{{ $product->name }} to be offered as samples">
                                Samples Availability
                                <!-- <br> -->&nbsp;
                                <a href="{{ route('pro_sample_available_or_not', ['id' => $product->id,'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id,'flag'=>'y']) }}" onclick="return confirm('You can use Yes, samples available to allow all product \'{{ $product->name }}\' to be offered as samples.\nAre you sure?')" title="Yes, samples available">
                                    <i class="fa fa-thumbs-up"></i>
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="{{ route('pro_sample_available_or_not', ['id' => $product->id,'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'n']) }}" onclick="return confirm('You can use No, samples not available to allow all product \'{{ $product->name }}\' to be offered as samples.\nAre you sure?')" title="No, samples not available">
                                    <i class="fa fa-thumbs-down"></i>
                                </a>
                            </span>

                            <!-- <a class="dropdown-item" href="#">Add New Category</a> -->
                            <a class="dropdown-item assignContent_btn" id="assignContentPro__{{$product->id}}" href="#">Assign Content</a>

                            @if (App\Model\UserPermission::checkPermission('products', 'delete') > 0)
                            <a href="{{ route('delete_product', ['id' => $product->id]) }}" class="dropdown-item" onclick="return confirm('{{ $product->name }}:: Are you sure you want to delete this item? Any sub categories or products will also be deleted.')">
                                Delete
                            </a>
                            @endif
                        </div>
                    </div>

                    @if (count($products) > 1)

                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span><i class="fas fa-sort-amount-up-alt"></i>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            @if ($i > 0)
                            <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'top'])}}">
                                Move to top
                            </a>
                            <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'up'])}}">
                                Move up
                            </a>
                            @endif

                            @if ($i != (count($products) - 1))

                            <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'down'])}}">
                                Move down
                            </a>
                            <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id, 'parent_id' => $product->parent_id,'flag'=>'bottom'])}}">
                                Move to bottom
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif

                </div>
            </td>
        </tr>
        @endforeach
    </table>

    @endif
</div>

@endif



@if(!empty($subCatProducts))
<?php
// dd($subCatProducts);

?>
<div id="pSubCat__{{$pCatId}}">

    @if(count($subCatProducts) > 0)
    <table class="table table-head-fixed text-nowrap" id="prold__{{$pTypeId}}">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Image</th>
                <th>Product Name</th>
                <th>Trade</th>
                <th>Retail</th>
                <th>Sale</th>
                <th>Sale</th>
                <th>Lead</th>
                <th>Samples</th>
                <th> Action </th>
            </tr>
        </thead>
        @foreach($subCatProducts as $i=>$product)

        <tr class="proTR " id="pro__{{$product->id}}">
            <!-- <td>{{$product->id}}</td> -->
            <td>
                <?php
                $pimage_ph = ($product->image_name != '') ? asset('uploads/v2_products/' . $product->image_name) : $noImg;
                ?>
                <img src="{{$pimage_ph}}" width="80px">
            </td>
            <td class="proNameTD" id="proName__{{$product->id}}">

                <a href="{{ route('get_full_url', ['id'=>  $product->id, 'flag'=>'product']) }}" target="_blank">
                    @if($product->promote_to_front == 't')
                    <i class="fa fa-caret-right text-success" title="Promote to front"></i>
                    @else
                    <i class="fa fa-times text-danger"></i>
                    @endif
                    {{$product->name}}</a>
                </br>
                <u>{{ " (".$product->supplied_name.")" }}</u>
                <input type="hidden" id="hidden_setPricePro_{{$product->id}}" value="{{ $product->name }}">

                <input type="hidden" id="hidden_trade_percentage_{{$product->id}}" value="{{ $product->trade_percentage }}">
                <input type="hidden" id="hidden_profit_margin_{{$product->id}}" value="{{ $product->profit_margin }}">
                <input type="hidden" id="hidden_sales_percentage_{{$product->id}}" value="{{ $product->sales_percentage }}">
                <input type="hidden" id="hidden_sale_start_{{$product->id}}" value="{{ $product->sale_start }}">
                <input type="hidden" id="hidden_sale_end_{{$product->id}}" value="{{ $product->sale_end }}">
                <input type="hidden" id="hidden_lead_time_days_{{$product->id}}" value="{{ $product->lead_time_days }}">
            </td>
            <td>{{ $product->trade_percentage }}%</td>
            <td>{{ $product->profit_margin }}%</td>
            <td>{{ $product->sales_percentage }}%</td>
            <td>{{ date('d/m/y', strtotime($product->sale_start)) }} -
                @if(strtotime($product->sale_end) < strtotime(date('Y-m-d'))) <p class="error">
                    {{ date('d/m/y', strtotime($product->sale_end)) }}</p>
                    @else
                    {{ date('d/m/y', strtotime($product->sale_end)) }}
                    @endif
            </td>
            <td>{{ $product->lead_time_days }}</td>
            <td>{{ ($product->allow_samples == 'y') ? "Yes" : "No" }}</td>


            <td>

                <div>
                    <div class="btn-group">
                        <!-- <button type="button" class="btn btn-info"></button> -->
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>Action
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('product_details', $product->id) }}">View</a>
                            <!-- <a class="dropdown-item" href="{{ env('APP_URL') }}">x View in Site</a> -->
                            <!-- <a class="dropdown-item" href="#">Browse</a> -->

                            @if (App\Model\UserPermission::checkPermission('products', 'edit') > 0)
                            <a class="dropdown-item" href="{{ route('product_edit', $product->id) }}">Edit</a>
                            @endif

                            <a class="dropdown-item  setPrice_btn" id="setPricePro__{{$product->id}}" href="#">Set
                                Prices</a>
                            <a class="dropdown-item setLeadTime_btn" id="setLeadTimePro__{{$product->id}}" href="#">Set
                                Lead Time</a>

                            <span class="dropdown-item" title="{{ $product->name }} :: &#013;You can use this to allow the product &#013;{{ $product->name }} to be offered as samples">
                                Samples Availability
                                <!-- <br> -->&nbsp;
                                <a href="{{ route('pro_sample_available_or_not', ['id' => $product->id,'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id,'flag'=>'y']) }}" onclick="return confirm('You can use Yes, samples available to allow all product \'{{ $product->name }}\' to be offered as samples.\nAre you sure?')" title="Yes, samples available">
                                    <i class="fa fa-thumbs-up"></i>
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="{{ route('pro_sample_available_or_not', ['id' => $product->id,'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'n']) }}" onclick="return confirm('You can use No, samples not available to allow all product \'{{ $product->name }}\' to be offered as samples.\nAre you sure?')" title="No, samples not available">
                                    <i class="fa fa-thumbs-down"></i>
                                </a>
                            </span>

                            <!-- <a class="dropdown-item" href="#">Add New Category</a> -->
                            <a class="dropdown-item assignContent_btn" id="assignContentPro__{{$product->id}}" href="#"> Assign Content</a>

                            @if (App\Model\UserPermission::checkPermission('products', 'delete') > 0)
                            <a href="{{ route('delete_product', ['id' => $product->id]) }}" class="dropdown-item" onclick="return confirm('{{ $product->name }}:: Are you sure you want to delete this item? Any sub categories or products will also be deleted.')">
                                Delete
                            </a>
                            @endif
                        </div>
                    </div>

                    @if (count($subCatProducts) > 1)
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span><i class="fas fa-sort-amount-up-alt"></i>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            @if ($i > 0)
                            <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'top'])}}">
                                Move to top
                            </a>
                            <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'up'])}}">
                                Move up
                            </a>
                            @endif

                            @if ($i != (count($subCatProducts) - 1))

                            <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'down'])}}">
                                Move down
                            </a>
                            <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id, 'parent_id' => $product->parent_id,'flag'=>'bottom'])}}">
                                Move to bottom
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif


                </div>
            </td>
        </tr>
        @endforeach
    </table>
    <?php
    // dd('$product');
    ?>
    @endif

</div>
@endif