@extends('admin.layouts.app')
@section('content')
<?php

use App\Model\MapSubGroupOption;
use App\Model\Option;

$li_groupDataFl = 0;
?>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #059503;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #f32121;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> Edit Band</h3>
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
                        <div class="individual-box card card-outline card-info">
                            <div class="card-body">
                                <form action="{{route('bandUpdate_store')}}" method="POST" id="band_form"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <h3 class="heading mb-4">Band Details </h3>
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{$band->id}}">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Band Name*</span>
                                                <input type="text" class="form-control  " name="name"
                                                    value="{{@$band->name}}" />

                                                @if($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <span class="label-title">Supplier*</span>
                                                <select class="form-control select2" name="supplier_id"
                                                    id="supplier_id">
                                                    @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->supplier_id }}" {{($band->supplier_id
                                                        == $supplier->supplier_id) ? 'selected' : '' }}>
                                                        {{ $supplier->supplier_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('supplier_id'))
                                                <div class="error">{{ $errors->first('supplier_id') }}</div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Product Type</span>
                                                <select class="form-control select2" name="product_type_id"
                                                    id="product_type_id">
                                                    <option value="0">Select...</option>

                                                    @foreach($product_types as $type)
                                                    <option value="{{ $type->id }}" {{($band->product_type_id ==
                                                        $type->id) ? 'selected' : '' }}>
                                                        {{ $type->pname }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_type_id'))
                                                <div class="error">{{ $errors->first('product_type_id') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Choose XML Format</span>
                                                <select class="form-control select2" name="xml_format" id="xml_format">
                                                    <option value="0" {{ ($band->xml_format == 0) ? 'selected' : '' }}>
                                                        Default</option>
                                                    <option value="1" {{ ($band->xml_format == 1) ? 'selected' : '' }}>
                                                        New Excel Roof XML</option>
                                                    <option value="2" {{ ($band->xml_format == 2) ? 'selected' : '' }}>
                                                        Atlas XML</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button-action justify-content-end">

                                        <a href="{{route('band_list',['tr'=> $band->id, 'supplierId'=>$band->supplier_id] )}}"
                                            class="btn btn-default mr-auto ">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-info  ">Save</button>
                                    </div>

                                </form>

                                <hr>

                                <form action="{{route('enableWebUpdate')}}" method="POST" id="band_group_option_form"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="band_id" value="{{$band->id}}">
                                    <h3 class="heading mb-4">Band Group

                                    </h3>
                                    <a href="{{route('band_edit',['bandId'=>$band->id, 'grId'=>0] )}}"
                                        style="float: right;" class='add_new_group'>+ Add a new group </a> <br><br>

                                    <div class="row">

                                        <table class='table'>
                                            @if(count($bandGroups) == 0)
                                            <tr>
                                                <td>
                                                    <div>
                                                        Band has no group associated with it, &nbsp;&nbsp; <a
                                                            href="#">Add a new group </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td colspan="3"></td>
                                                <td>Disable Group</td>
                                                <td>EDI code</td>
                                                <td>
                                                    <input type="checkbox" name="" id="all_web" data-toggle="tooltip"
                                                        data-placement="top" title="Select All">
                                                    <button type="submit" class='btn btn-sm btn-default'>Enable
                                                        Web</button>
                                                </td>
                                            </tr>
                                            <?php
                                            $groupKeyAc = 0;
                                            ?>
                                            @foreach($bandGroups as $groupKey=>$group)
                                            <?php
                                            $groupData = $group->groupName;
                                            // if ($groupData->deleted == 0) {
                                            $li_groupDataFl = 1;
                                            $groupOptios = $groupData->groupOptios;

                                            ?>
                                            <tr id="grTR__{{$groupData->group_id}}">
                                                <td>
                                                    <span data-toggle="tooltip" data-placement="top"
                                                        title="Group name"><i class='fa fa-layer-group'></i> &nbsp;
                                                        {{$groupData->group_admin_name}}</span>
                                                    <span data-toggle="tooltip" data-placement="top" title="Group type">
                                                        &nbsp; ({{$groupData->group_type}})</span>
                                                </td>
                                                <td>

                                                    <div class="action-button-wrap">

                                                        <a data-toggle="tooltip" data-placement="top" title="Edit group"
                                                            href="{{route('band_edit',['bandId'=>$band->id, 'grId'=>$groupData->group_id])}}"
                                                            class="btn btn-outline-info"><i class="fa fa-edit"></i></a>

                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="Remove group"
                                                            href="{{route('band_group_remove', ['id'=> $groupData->group_id, 'bandId'=> $band->id, 'flagId' => 0, 'group'])}}"
                                                            class="btn btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to remove this group ?')"><i
                                                                class="fa fa-trash-alt"></i></a>

                                                        @if($groupKey < (count($bandGroups) - 1)) <a
                                                            class="btn btn-outline-primary"
                                                            href="{{route('band_group_move',['groupId'=>$groupData->group_id, 'bandId'=> $band->id,'position'=>$group->position, 'moveFlag'=>'down'])}}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Move down"><i
                                                                class="fa fa-caret-square-down"></i></a>

                                                            @endif

                                                            @if($groupKeyAc > 0 )
                                                            <a class="btn btn-outline-primary"
                                                                href="{{route('band_group_move',['groupId'=>$groupData->group_id, 'bandId'=> $band->id,'position'=>$group->position, 'moveFlag'=>'up'])}}"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Move up"><i
                                                                    class="fa fa-caret-square-up"></i></a>
                                                            @endif

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="action-button-wrap">
                                                        @if($groupData->group_type == 'Options')
                                                        <a data-toggle="tooltip" data-placement="top" title="Add option"
                                                            href="{{route('band_edit', ['bandId' => $band->id, 'groupId'=> $groupData->group_id, 'optionId' => 0])}}"
                                                            class="btn btn-outline-success">Add option</a>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" class='enableDisable'
                                                            id='enableDisable__{{$groupData->group_id}}'
                                                            {{($groupData->deleted == 1) ? 'checked' : ''}}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="action-button-wrap" style="text-align: center;">
                                                        @if($groupData->group_edi_field !='')
                                                        <i class='fa fa-check-circle btn-outline-success'
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="EDI available"></i>
                                                        @else
                                                        <i class='fa fa-times-circle btn-outline-danger'
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="EDI not available"></i>
                                                        @endif
                                                </td>
                                                <td>
                                                    <input type="checkbox"
                                                        name="group_enableordisable[{{$groupData->group_id}}]"
                                                        class='web_group' {{($groupData->enableordisable == '0') ?
                                                    'checked' : ''}}>

                                                </td>
                                            </tr>

                                            @if(!empty($groupOptios))
                                            @foreach($groupOptios as $option)
                                            <?php
                                            if ($option->deleted == 0) {
                                                $la_subGroups = MapSubGroupOption::where('option_id', $option->option_id)->where('removed', 0)->orderBy('position')->get();
                                            ?>
                                            <tr id="opTR__{{$option->option_id}}">
                                                <td style="padding-left: 50px;">| &nbsp; {{$option->option_name}}
                                                    @if($option->configdefault == 1)
                                                    <span>(Default)</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="action-button-wrap">
                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="Edit option"
                                                            href="{{route('band_edit', ['bandId' => $band->id, 'groupId'=> $groupData->group_id, 'optionId' => $option->option_id])}}"
                                                            class="btn btn-outline-warning"><i
                                                                class="fa fa-edit"></i></a>

                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="Delete option"
                                                            href="{{route('band_group_option_delete', ['optionId'=> $option->option_id, 'bandId'=> $band->id])}}"
                                                            class="btn btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to delete this option ?')"><i
                                                                class="fa fa-trash-alt"></i></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="action-button-wrap">
                                                        <a href="{{route('band_edit',['bandId'=>$band->id, 'grId'=> 0, 'parentOptionId' => $option->option_id] )}}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Add sub group" class="btn btn-outline-primary">Add
                                                            sub group</a>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td style="text-align: center;">
                                                    @if($option->option_edi_field !='')
                                                    <i class='fa fa-check-circle btn-outline-success'
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="EDI available"></i>
                                                    @else
                                                    <i class='fa fa-times-circle btn-outline-danger'
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="EDI not available"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="checkbox"
                                                        name="option_disableid[{{$option->option_id}}]"
                                                        class='web_option' {{($option->disableid == '0') ? 'checked' :
                                                    ''}}>
                                                </td>
                                            </tr>


                                            <!-- //=============== START:: Sub group under option ======// -->
                                            @if(!empty($la_subGroups))
                                            @foreach($la_subGroups as $subGroup)
                                            <?php
                                                $subGroupData = $subGroup->subGroupName;
                                                // if ($subGroupData->deleted == 0) {
                                                $la_subGrOptions = Option::where('group_id', $subGroupData->group_id)->get();
                                                ?>
                                            <tr id="grTR__{{$subGroupData->group_id}}">
                                                <td style="padding-left: 90px;">|| &nbsp;
                                                    {{$subGroupData->group_admin_name}}
                                                    <input type="hidden" value="{{$subGroupData->group_id}}">
                                                </td>
                                                <td>
                                                    <div class="action-button-wrap">
                                                        <a href="{{route('band_edit',['bandId'=>$band->id, 'grId'=> $subGroupData->group_id, 'parentOptionId' => $option->option_id] )}}"
                                                            class="btn btn-outline-primar" data-toggle="tooltip"
                                                            data-placement="top" title="Edit sub group"><i
                                                                class="fa fa-edit"></i></a>

                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="Remove sub group"
                                                            href="{{route('band_group_remove', ['id'=> $subGroupData->group_id, 'bandId'=> $band->id, 'flagId' => $option->option_id, 'sub_group'])}}"
                                                            class="btn btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to remove this sub group ?')"><i
                                                                class="fa fa-trash-alt"></i></a>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="action-button-wrap">
                                                        <a href="{{route('band_edit', ['bandId' => $band->id, 'groupId'=> $subGroupData->group_id, 'optionId' => 0])}}"
                                                            class="btn btn-outline-info" data-toggle="tooltip"
                                                            data-placement="top" title="Add sub option">Add sub
                                                            option</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" class='enableDisable'
                                                            id='enableDisable__{{$subGroupData->group_id}}'
                                                            {{($subGroupData->deleted == 1) ? 'checked' : ''}}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td style="text-align: center;">
                                                    @if($subGroupData->group_edi_field !='')
                                                    <i class='fa fa-check-circle btn-outline-success'
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="EDI available"></i>
                                                    @else
                                                    <i class='fa fa-times-circle btn-outline-danger'
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="EDI not available"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="checkbox"
                                                        name="group_enableordisable[{{$subGroupData->group_id}}]"
                                                        class='web_group' {{($subGroupData->enableordisable == '0') ?
                                                    'checked' : ''}}>
                                                </td>
                                            </tr>


                                            <!-- //=============== START:: sub option under sub group  ======// -->
                                            @if(!empty($la_subGrOptions))
                                            @foreach($la_subGrOptions as $subGrOption)
                                            <?php if ($subGrOption->deleted == 0) { ?>
                                            <tr>
                                                <td style="padding-left: 120px;"><i class="far fa-circle nav-icon"
                                                        style="font-size: 10px;"></i> &nbsp;
                                                    {{$subGrOption->option_name}}
                                                    @if($subGrOption->configdefault == 1)
                                                    <span>(Default)</span>
                                                    @endif
                                                    <input type="hidden" value="{{$subGrOption->option_id}}">
                                                </td>
                                                <td>
                                                    <div class="action-button-wrap">
                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="Edit sub option"
                                                            href="{{route('band_edit', ['bandId' => $band->id, 'groupId'=> $subGroupData->group_id, 'optionId' => $subGrOption->option_id])}}"
                                                            class="btn btn-outline-warning"><i
                                                                class="fa fa-edit"></i></a>

                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="Delete sub option"
                                                            href="{{route('band_group_option_delete', ['optionId'=> $subGrOption->option_id, 'bandId'=> $band->id])}}"
                                                            class="btn btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to delete this option ?')"><i
                                                                class="fa fa-trash-alt"></i></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="action-button-wrap">

                                                    </div>
                                                </td>
                                                <td></td>

                                                <td style="text-align: center;">
                                                    @if($subGrOption->option_edi_field !='')
                                                    <i class='fa fa-check-circle btn-outline-success'
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="EDI available"></i>
                                                    @else
                                                    <i class='fa fa-times-circle btn-outline-danger'
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="EDI not available"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="checkbox"
                                                        name="option_disableid[{{$subGrOption->option_id}}]"
                                                        class='web_option' {{($subGrOption->disableid == '0') ?
                                                    'checked' : ''}}>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            @endforeach
                                            @endif
                                            <!-- //=============== END:: sub option under sub group ======// -->
                                            <?php
                                                // }
                                                ?>
                                            @endforeach
                                            @endif
                                            <!-- //=============== END:: Sub group under option ======// -->
                                            <?php } ?>
                                            @endforeach
                                            @endif
                                            <?php
                                            $groupKeyAc++;
                                            // } 
                                            ?>

                                            @endforeach

                                            @endif
                                        </table>


                                    </div>


                                </form>


                                <!-- // =========== START:: Band Group Form======// -->
                                @include('admin.suppliers.band_group_form_include')
                                <!-- // =========== END:: Band Group Form======// -->



                                <!-- // =========== START:: Band Group option Form======// -->
                                @include('admin.suppliers.band_group_option_form_include')
                                <!-- // =========== END:: Band Group option Form======// -->

                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{route('band_edit',['bandId'=>$band->id, 'grId'=>0] )}}"
                                        class='add_new_group'>+ Add a new group </a>

                                    <a
                                        href="{{route('band_list',['tr'=> $band->id, 'supplierId'=>$band->supplier_id] )}}">«
                                        back to band list</a>
                                </div>
                            </div>



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
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";

        var banfGroupForm = 0;
        var bandGr = '<?= count($bandGroups) ?>';
        var bandGrFilter = '<?= $li_groupDataFl ?>';
        var grId = '<?= $grId ?>';
        if (bandGr == 0) {
            banfGroupForm = 1;
        } else if (bandGrFilter == 0) {
            banfGroupForm = 1;
        } else if (grId != '') {
            banfGroupForm = 1;
        }


        $("#BandsGroupBox").hide();
        if (banfGroupForm == 1) {
            $(".add_new_group").hide();
            $("#band_group_option_form").hide();
            $("#BandsGroupBox").show();

            imagePreview(pop_image, pop_image_pre);
            imagePreview(UploadedPDF_File, UploadedPDF_File_pre);
        }

        $("#GroupOptionBox").hide();
        var optionId = '<?= $optionId ?>'
        var groupId = '<?= $groupId ?>'
        if ((optionId != '') && (groupId != '')) {
            $("#band_group_option_form").hide();
            $("#GroupOptionBox").show();

            imagePreview(image_url, image_url_pre);
        }



        $('#all_web').click(function() {
            if ($(this).prop('checked') == true) {
                $(".web_group, .web_option").prop('checked', true);
            } else {
                $(".web_group, .web_option").prop('checked', false);
            }
        });

        $('.web_group, .web_option').click(function() {
            if ($(this).prop('checked') == false) {
                $("#all_web").prop('checked', false);
            }
        });



        function imagePreview(imgId, imgPreviewId) {
            imgId.onchange = evt => {
                const [file] = imgId.files
                if (file) {
                    imgPreviewId.src = URL.createObjectURL(file)
                }
            }
        }


        var activeGrTR = '<?= @$activeGrTR ?>';
        var activeOpTR = '<?= @$activeOpTR ?>';
        $("#grTR__" + activeGrTR).addClass('activeTR');
        $("#opTR__" + activeOpTR).addClass('activeTR');

        $('.enableDisable').change(function() {
            var thisId = $(this).attr('id');
            var grId = thisId.split('__')[1];
            $.ajax({
                type: 'GET',
                url: base_url + '/bandGroupEnableDisable_ajax/' + grId,
                success: function(data) {
                    var data = jQuery.parseJSON(data);

                    alert(data.msg)
                }
            });
            console.log('okkk');
        });
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop