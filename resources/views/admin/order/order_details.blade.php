@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Order Details #{{ $order->id }}</h3>
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
            <div class="row">
                <div class="col-md-12">

                    {{-- main details --}}
                    <div class="spec-details">
                        <div class="individual-box card card-outline card-info">
                            <div class="card-body">
                                <h3 class="heading">Search</h3>

                                <form class="search-filter">
                                    <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success ml-2" type="submit">Search</button>

                                </form>
                                <fieldset class="fields-design mt-4">
                                    <legend> Create & Send Email</legend>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Create & Send Email</span>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select type="text" class="select2 form-control">
                                                            <option>Select Template</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button class="btn btn-primary min-width-65"><i class="far fa-edit"></i></button>
                                                        <button class="btn btn-success min-width-65"><i class="fas fa-paper-plane"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Email Supplier</span>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select type="text" class="select2 form-control">
                                                            <option>Select Supplier</option>
                                                            <option>Select Supplier2</option>
                                                            <option>Select Supplier3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button class="btn btn-primary min-width-65"><i class="far fa-edit"></i></button>
                                                        <button class="btn btn-success min-width-65"><i class="fas fa-paper-plane"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </fieldset>


                            </div>
                        </div>
                        <div class="individual-box card card-outline card-warning">
                            <div class="card-body">
                                <!-- <h2 class="heading "> Personal Information</h2> -->


                                <div class="name-view">
                                    <label>Order ID:</label>
                                    <span>{{ $order->id }} </span>
                                </div>
                                <div class="name-view">
                                    <label>Date:</label>
                                    <span> {{ $order->date }}</span>
                                </div>
                                <div class="name-view">
                                    <label>Customer Account No:</label>
                                    <span> {{ $order->user_id }}</span>
                                </div>
                                <div class="name-view">
                                    <label>Status:</label>
                                    <span class="status_text"> {{ $order->status }}</span>
                                    <span class="change_status_input">
                                        <form action="{{ route('update_order_status') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $order->id }}">
                                            <select name="status">
                                                <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                                                </option>
                                                <option value="Complete" {{ $order->status == 'Complete' ? 'selected' : '' }}>Complete
                                                </option>
                                                <option value="Incomplete" {{ $order->status == 'Incomplete' ? 'selected' : '' }}>
                                                    Incomplete</option>
                                                <option value="New" {{ $order->status == 'New' ? 'selected' : '' }}>New</option>
                                                <option value="Refunded" {{ $order->status == 'Refunded' ? 'selected' : '' }}>Refunded
                                                </option>
                                                <option value="Unpaid" {{ $order->status == 'Unpaid' ? 'selected' : '' }}>Unpaid
                                                </option>
                                            </select>
                                            <button type="submit">Go</button>
                                        </form>
                                    </span>
                                </div>

                                <div class="user-action-part justify-content-between mt-3 pb-0">
                                    <button class="btn btn-outline-primary change_status_btn">Change</button>
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" style="float: right;" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Add note
                                    </button>

                                </div>
                                <div class="collapse mt-2" id="collapseExample">
                                    <div class="card card-body">
                                        <textarea class="form-control" rows="4"> </textarea>
                                        <button class="btn btn-primary note-button">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="address-part">
                            <h2>Addrees details</h2>
                            <div class="button-action justify-content-end">
                                <button type="button" class="btn btn-success mr-2 edit_order_add">Edit address</button>
                                <a href="{{ route('user_details', $order->user_id) }}">
                                    <button type="button" class="btn btn-info">View User Details</button>
                                </a>

                            </div>
                        </div>

                        <form action="{{ route('update_order_address') }}" method="post">
                            @csrf
                            <div class="offer-parts">
                                <input type="hidden" name="id" value="{{ $order->id }}">
                                <div class="individual-box card card-outline card-info">
                                    <div class="card-body">
                                        <h3 class="heading">Billng address</h3>

                                        <div class="name-view">
                                            <label>Name:</label>
                                            <span class="show_val">{{ $order->b_title }}</span>
                                            <span class="input_val"><input type="text" name="b_title" value="{{ $order->b_title }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Name:</label>
                                            <span class="show_val">{{ $order->b_firstname }}</span>
                                            <span class="input_val"><input type="text" name="b_firstname" value="{{ $order->b_firstname }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Name:</label>
                                            <span class="show_val">{{ $order->b_lastname }}</span>
                                            <span class="input_val"><input type="text" name="b_lastname" value="{{ $order->b_lastname }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Company name:</label>
                                            <span class="show_val">{{ $order->b_company }}</span>
                                            <span class="input_val"><input type="text" name="b_company" value="{{ $order->b_company }}"></span>
                                        </div>

                                        <div class="name-view">
                                            <label>Address:</label>
                                            <span class="show_val">{{ $order->b_address1 }}</span>
                                            <span class="input_val"><input type="text" name="b_address1" value="{{ $order->b_address1 }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Address2:</label>
                                            <span class="show_val">{{ $order->b_address2 }}</span>
                                            <span class="input_val"><input type="text" name="b_address2" value="{{ $order->b_address2 }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>City:</label>
                                            <span class="show_val">{{ $order->b_city }}</span>
                                            <span class="input_val"><input type="text" name="b_city" value="{{ $order->b_city }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>County:</label>
                                            <span class="show_val">{{ $order->b_county }}</span>
                                            <span class="input_val"><input type="text" name="b_county" value="{{ $order->b_county }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Postal code:</label>
                                            <span class="show_val">{{ $order->b_postcode }}</span>
                                            <span class="input_val"><input type="text" name="b_postcode" value="{{ $order->b_postcode }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Mobile No.:</label>
                                            <span class="show_val">{{ $order->b_telephone }}</span>
                                            <span class="input_val"><input type="text" name="b_telephone" value="{{ $order->b_telephone }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Country:</label>
                                            <span class="show_val">{{ $order->b_country }}</span>
                                            <span class="input_val"><input type="text" name="b_country" value="{{ $order->b_country }}"></span>
                                        </div>

                                    </div>
                                </div>

                                <div class="individual-box card card-outline card-info">
                                    <div class="card-body">
                                        <h2 class="heading ">
                                            Shipping address
                                        </h2>

                                        <div class="name-view">
                                            <label>Name:</label>
                                            <span class="show_val">{{ $order->s_title }}</span>
                                            <span class="input_val"><input type="text" name="s_title" value="{{ $order->s_title }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Name:</label>
                                            <span class="show_val">{{ $order->s_firstname }}</span>
                                            <span class="input_val"><input type="text" name="s_firstname" value="{{ $order->s_firstname }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Name:</label>
                                            <span class="show_val">{{ $order->s_lastname }}</span>
                                            <span class="input_val"><input type="text" name="s_lastname" value="{{ $order->s_lastname }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Company name:</label>
                                            <span class="show_val">{{ $order->s_company }}</span>
                                            <span class="input_val"><input type="text" name="s_company" value="{{ $order->s_company }}"></span>
                                        </div>

                                        <div class="name-view">
                                            <label>Address:</label>
                                            <span class="show_val">{{ $order->s_address1 }}</span>
                                            <span class="input_val"><input type="text" name="s_address1" value="{{ $order->s_address1 }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Address2:</label>
                                            <span class="show_val">{{ $order->s_address2 }}</span>
                                            <span class="input_val"><input type="text" name="s_address2" value="{{ $order->s_address2 }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>City:</label>
                                            <span class="show_val">{{ $order->s_city }}</span>
                                            <span class="input_val"><input type="text" name="s_city" value="{{ $order->s_city }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>County:</label>
                                            <span class="show_val">{{ $order->s_county }}</span>
                                            <span class="input_val"><input type="text" name="s_county" value="{{ $order->s_county }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Postal code:</label>
                                            <span class="show_val">{{ $order->s_postcode }}</span>
                                            <span class="input_val"><input type="text" name="s_postcode" value="{{ $order->s_postcode }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Mobile No.:</label>
                                            <span class="show_val">{{ $order->s_telephone }}</span>
                                            <span class="input_val"><input type="text" name="s_telephone" value="{{ $order->s_telephone }}"></span>
                                        </div>
                                        <div class="name-view">
                                            <label>Country:</label>
                                            <span class="show_val">{{ $order->s_country }}</span>
                                            <span class="input_val"><input type="text" name="s_country" value="{{ $order->s_country }}"></span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="order_info_submit_btn">Save</button>


                            </div>
                        </form>
                        <hr>
                        <div id="accordion" class="mt-3">
                            @if(count($orderDetails) > 0)
                            @foreach($orderDetails as $key => $detailsRow)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <div class="product-data">
                                        <img class="pdt-image" src="{{ App\Utility::filePathShow($detailsRow->image_name, 'v2_products') }}" />

                                        <div class="data-content">
                                            <p class="brand">{{$detailsRow->band_name}}</p>
                                            <p class="product-name">{{$detailsRow->name}}</p>
                                            <p class="product-subname"><span>Supplier:</span> {{$detailsRow->supplier_name}}</p>
                                            <p class="product-subname"><span>Size:</span> {{$detailsRow->max_width . "cm (W) x " .  $detailsRow->max_drop . "cm (H)"}}</p>


                                            <h5 class="mb-0 d-inline-flex align-items-center">
                                                <p class="product-price mr-2">£ {{$detailsRow->retail_price}}</p>
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_{{$key}}" aria-expanded="true" aria-controls="collapse_{{$key}}">
                                                    View more
                                                </button>
                                            </h5>
                                        </div>
                                        <div class="oder-status">
                                            <!-- <div class="order-id">
                                                <span>Order ID:</span>
                                                <a href="#">#{{$detailsRow->order_id}}</a>
                                            </div> -->
                                            <div class="order-status  ">Order status: <a href="#">{{$detailsRow->status}}</a></div>
                                            <!-- <div class="order-status text-success">Order status: {{$detailsRow->status}}
                                                 <i class="fas fa-check-circle "></i>  
                                            </div> -->

                                            <div class="action">
                                                <button class="btn action-data text-success">
                                                    <i class="far fa-edit"></i>
                                                    <span>Create Similar</span>
                                                </button>
                                                <button class="btn action-data text-success">
                                                    <i class="far fa-edit"></i>
                                                    <span>Edit Product</span>
                                                </button>
                                                <button class="btn action-data text-success">
                                                    <i class="far fa-edit"></i>
                                                    <span>Update</span>
                                                </button>
                                                <button class="btn action-data text-danger">
                                                    <i class="far fa-times-circle"></i>
                                                    <span>Remove</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="collapse_{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body view-all-data-wrap">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Product Type:</label>
                                                    <label class="col-sm-9 col-form-label font-normal">{{$detailsRow->p_type_name}}</label>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Category:</label>
                                                    <label class="col-sm-9 col-form-label font-normal">{{$detailsRow->p_cat_name}}</label>
                                                </div>
                                                <!-- <div class="row">
                                                    <label class="col-sm-3 col-form-label">Control:</label>
                                                    <label class="col-sm-9 col-form-label font-normal">Hidden</label>
                                                </div> -->
                                                <!-- <div class="row">
                                                    <label class="col-sm-3 col-form-label">Style:</label>
                                                    <label class="col-sm-9 col-form-label font-normal">Café
                                                        Style</label>
                                                </div> -->  
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label"> Description:</label>
                                                    <label class="col-sm-9 col-form-label font-normal">{{$detailsRow->description}}</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label class="col-sm-12 col-form-label">Living Room:</label>
                                                    <label class="col-sm-12 col-form-label font-normal">L = 1000mm W
                                                        x 995mm H / Astragal - Left Opening First</label>
                                                    <label class="col-sm-12 col-form-label font-normal">C = 1155mm W
                                                        x 990mm H / Astragal - Left Opening First</label>
                                                    <label class="col-sm-12 col-form-label font-normal">R = 1010mm W
                                                        x 985mm H / Astragal - Right Opening First</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <p class="supplier">Supplier: <strong>{{$detailsRow->supplier_name}}</strong></p>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Delivery date :</label>
                                                    <label class="col-sm-10 col-form-label font-normal">29/12/2021</label>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-sm-2 col-form-label">Label Blind :</label>
                                                    <label class="col-sm-8 col-form-label">
                                                        <input type="text" class="form-control" placeholder="Label this Shutter">
                                                    </label>
                                                    <div class="col-sm-2">
                                                        <button class="btn btn-success">Update</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label pl-0 mb-1">Special Delivery
                                                        Instructions (if any) :
                                                    </label>
                                                    <textarea class="form-control" rows="4"> </textarea>
                                                </div>
                                                <div class="button-action justify-content-between d-flex">
                                                    <button type="button" class="btn btn-success mr-2">Update
                                                    </button>
                                                    <span>
                                                        <button type="button" class="btn btn-info" type="button" data-toggle="collapse" data-target="#AddNewProduct" aria-expanded="false" aria-controls="AddNewProduct">Add New
                                                            Product</button>
                                                        <button type="button" class="btn btn-primary ml-2" type="button" data-toggle="collapse" data-target="#AddMisc" aria-expanded="false" aria-controls="AddMisc">Add Misc
                                                            Item</button>
                                                    </span>

                                                </div>
                                                <div class="card mt-3 mb-0">
                                                    <div class="card-body">
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Your Discounts</span>
                                                            <hr>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="label-title">Add Manual
                                                                        Discount</span>
                                                                    <input type="text" class="form-control" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <span class="label-title">Add Promitional
                                                                        Code</span>
                                                                    <input type="text" class="form-control" />
                                                                </div>
                                                            </div>

                                                            <div class="action-part">
                                                                <button class="btn btn-danger">Reset Discount
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="collapse mt-3" id="AddNewProduct">
                                                    <div class="card card-body m-0">
                                                        <p class="title">Admin Manual Order</p>

                                                        <div class="form-group  ">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <select class="select2 form-control">
                                                                    <option>test</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="collapse mt-3" id="AddMisc">
                                                    <div class="card card-body m-0">
                                                        AddMisc
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                            

                        </div>

                        <div class="price-breakdown card">
                            <div class="eatch-price">
                                <span class="title">Goods Total Price</span>
                                <span class="price">£xxx</span>
                            </div>
                            <div class="eatch-price">
                                <span class="title">Sales Discount</span>
                                <span class="price">£{{ $order->sale_discount }}</span>
                            </div>
                            <div class="eatch-price">
                                <span class="title">Express Service </span>
                                <span class="price">£0.00xxx</span>
                            </div>
                            <div class="eatch-price">
                                <span class="title">Goods Total </span>
                                <span class="price">£0.00xx</span>
                            </div>
                            <div class="eatch-price">
                                <span class="title">Promotional Discount</span>
                                <span class="price">-£0.00xx</span>
                            </div>
                            <div class="eatch-price">
                                <span class="title">Extra Discount</span>
                                <span class="price">-£{{ $order->extra_discount }}</span>
                            </div>
                            <div class="eatch-price border-0">
                                <span class="title">Sub Total</span>
                                <span class="price">£0.00xx</span>
                            </div>
                            <div class="eatch-price">
                                <span class="title">Delivery (UK Standard Delivery)</span>
                                <span class="price">£{{ $order->delivery_price }}</span>
                            </div>
                            <hr>

                            <div class="eatch-price border-0">
                                <span class="title"><strong>Total</strong></span>
                                <span class="price total">£{{ $order->total_price }}</span>
                            </div>
                        </div>
                        <div class="card individual-box  acknowledgment">
                            <div class="card-body">
                                <h2 class="heading ">
                                    EDI Acknowledgment / Delivery Confirmations
                                </h2>


                                <div class="table-responsive mt-3">
                                    <table class="table borderedless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">PO Number</th>
                                                <th scope="col">SAP Number</th>
                                                <th scope="col">Scheduled Date</th>
                                                <th scope="col">Delivery Details</th>
                                                <th scope="col">Delivery Code</th>
                                                <th scope="col">Carrier</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>10-12-2021</td>
                                                <td>1236547</td>
                                                <td>#3562568</td>
                                                <td>10-12-2021</td>
                                                <td>lorem details</td>
                                                <td>54321</td>
                                                <td>Currier Vison</td>
                                                <td>Delivered</td>
                                                <td>
                                                    <button class="btn btn-info"> Send XML</button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="user-action-part allmanual  pb-0">
                                    <button class="btn btn-outline-secondary mr-auto" type="button" data-toggle="collapse" data-target="#OpenNote" aria-expanded="false" aria-controls="OpenNote">
                                        Open note
                                    </button>
                                    <button class="btn btn-outline-primary">
                                        Send Purchase Order
                                    </button>
                                    <button class="btn btn-outline-success">
                                        Send Order Acknowledgment
                                    </button>
                                    <button class="btn btn-outline-primary">
                                        Send Quotation
                                    </button>

                                    <button class="btn btn-outline-warning">
                                        Print
                                    </button>

                                </div>
                                <div class="collapse mt-2" id="OpenNote">
                                    <div class="card card-body">

                                        <ul class="nav notes">
                                            <li class="nav-item">lorem ipsum notes sending providing</li>
                                            <li class="nav-item">lorem ipsum notes sending providing</li>
                                            <li class="nav-item">lorem ipsum notes sending providing</li>
                                            <li class="nav-item">lorem ipsum notes sending providing</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="user-action-part mt-3  pb-0">
                                    <button class="btn btn-info" type="button" style="line-height:16px">
                                        Send Manual Dispatch
                                        <small class="d-block">Admin only</small>
                                    </button>
                                </div>
                            </div>
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
        var base_url = "<?php echo URL::to('/') . '/admin'; ?>";

        $(".input_val, .order_info_submit_btn").hide();
        $('.edit_order_add').click(function() {
            $(".show_val").hide();
            $(".input_val, .order_info_submit_btn").show();
        });

        $('.change_status_input').hide();
        $(".change_status_btn").click(function() {
            $(".status_text, .change_status_btn").hide();
            $('.change_status_input').show();

        });

    });
</script>
@stop