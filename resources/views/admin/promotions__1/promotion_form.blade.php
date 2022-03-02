@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> {{(@$promotionData->id > 0) ? 'Edit promotion' : 'Create promotion'}}</h3>
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
                    {{--main details--}}
                    <div class="spec-details">
                        <form action="{{route('promotions_store')}}" method="POST" id="promotionData_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$promotionData->id}}">
                            <div class="individual-box card card-outline card-info">
                                <div class="card-body">
                                    <h3 class="heading mb-4">Promotion Details</h3>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Name*</span>
                                                    <input type="text" name="name" class="form-control" value="{{@$promotionData->name}}" />

                                                    @if($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Type*</span>
                                                    <select class="form-control select2" name="type" id="discount_type">
                                                        <option value="Percentage Off" {{ (@$promotionData->type == 'Percentage Off') ? 'selected' : '' }}>Percentage Off</option>
                                                        <option value="Exact Price Off" {{ (@$promotionData->type == 'Exact Price Off') ? 'selected' : '' }}>Exact Price Off</option>
                                                        <option value="Free Delivery" {{ (@$promotionData->type == 'Free Delivery') ? 'selected' : '' }}>Free Delivery</option>
                                                    </select>
                                                    @if($errors->has('type'))
                                                    <div class="error">{{ $errors->first('type') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Start Date*</span>
                                                    <input type="date" class="form-control" name="start_date" value="{{@$promotionData->start_date}}" />

                                                    @if($errors->has('start_date'))
                                                    <div class="error">{{ $errors->first('start_date') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">End Date*</span>
                                                    <input type="date" class="form-control" value="<?= @$promotionData->end_date ?>" name="end_date" />

                                                    @if($errors->has('end_date'))
                                                    <div class="error">{{ $errors->first('end_date') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6 discount_type_value">
                                                <div class="form-group">
                                                    <span class="label-title Percentage_Off" style="display: none;">Percentage Off (%)*</span>
                                                    <span class="label-title Exact_Price" style="display: none;">Price Off (£)*</span>
                                                    <input type="text" class="form-control  " name="x" value="{{@$promotionData->x}}" />

                                                    @if($errors->has('x'))
                                                    <div class="error">{{ $errors->first('x') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Promotion Code*</span>
                                                    <input type="text" class="form-control" value="<?= @$promotionData->code ?>" name="code" />

                                                    @if($errors->has('code'))
                                                    <div class="error">{{ $errors->first('code') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="button-action justify-content-end">
                                        <a href="{{route('promotions_list' )}}">
                                            <button type="button" class="btn btn-default mr-2">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-info  ">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>
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
        var discount_type = "<?= @$promotionData->type ?>";
        discount_type_value_show_hide(discount_type);


        $('#discount_type').change(function() {
            var discount_type = $(this).val();
            discount_type_value_show_hide(discount_type);
        });

    });

    
    function discount_type_value_show_hide(discount_type) {
        console.log(discount_type);
            if (discount_type == 'Percentage Off') {
                $(".Exact_Price").hide();
                $(".discount_type_value").show();
                $(".Percentage_Off").show();
            } else if (discount_type == 'Exact Price Off') {
                $(".Percentage_Off").hide();
                $(".discount_type_value").show();
                $(".Exact_Price").show();
            } else {
                $(".discount_type_value").hide();
            }
        }
</script>
@stop