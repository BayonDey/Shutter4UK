@extends('admin.layouts.app')
@section('content')
<?php
// echo '<pre>';
// print_r($proTemplate);
?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3>{{($proTemplate->id == 0) ? 'Create' : 'Edit'}} Product template</h3>
                        </div>
                        <div class="col-sm-5">
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

            <div class="card card-outline card-info spec-details">

                <div class="card-body">
                    <h3 class="heading">Edit Product Template </h3>
                    <form class="mt-4" action="{{route('store_pro_template')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="id" value="{{ $proTemplate->id }}">

                        <div class="add-more-data">
                            <div class="form-group">
                                <span class="label-title">Template Name </span>

                                <input type="text" class="form-control" name="name" value="{{ $proTemplate->name }}" autocomplete="off">
                                @if($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="button-action justify-content-start">
                                <a href="{{route('product-template-list')}}"><button type="button" class="btn btn-default">Cancel</button></a>

                                <button type="submit" class="btn btn-info mr-2">Save</button>
                            </div>
                        </div>
                        <?php
                        $selectedValId = [];
                        ?>
                        @if($proTemplate->id != 0)
                        <div class="row">

                            @if(count($proTemplate->landingValuefildIds) > 0)
                            <div class="col-md-12">
                                <h3 class="heading mt-3">Product Fields </h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input mt-2 selectAllCheckbox" title="Select all fields" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Template : {{ $proTemplate->name }}</label>
                                            <i class="fas fa-trash-alt text-danger ml-2 delete_fields" style="cursor: pointer;"></i>
                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="col-md-12">
                                    <hr>
                                </div> -->
                            </div>


                            @foreach($proTemplate->landingValuefildIds as $landField)
                            <?php
                            $selectedValId[] = $landField->field_id;
                            ?>
                            <div class="col-md-6">
                                <div class="add-more-data template-box p-2 mb-2">
                                    <label class="template-head " for="checkboxId__{{@$landField->id}}">{{@$landField->fieldName->field_name}}</label>
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="checkbox" value="{{@$landField->id}}" class="mt-2 ml-1 selectCheckbox" id="checkboxId__{{@$landField->id}}" />
                                        </div>
                                        <div class="col-11">
                                            <input type="text" class="form-control" name="landFieldId[{{@$landField->id}}]"  value="{{@$landField->value}}"  autocomplete="off">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="col-md-12">
                                <div class="button-action justify-content-start">
                                    <a href="{{route('product-template-list')}}"><button type="button" class="btn btn-default">Cancel</button></a>

                                    <button type="submit" class="btn btn-info mr-2">Save</button>
                                </div>
                            </div>
                            @endif

                        </div>
                        @endif
                    </form>

                    <div class="row">

                        @if($id > 0)
                        <div class="col-md-12">
                            <hr>
                            <div class="add-more-data template-box p-2 mb-2">
                                <label class="template-head " for="ImportantInfor"> Add Field</label>
                                <form action="{{ route('add_field_to_template') }}" method="POST">
                                    @csrf
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <input type="hidden" name="template_id" value="{{$id}}">
                                            <select type="text" name="field_id" class="select2 form-control">
                                                <option value="0">Pleade select...</option>
                                                @if(!empty($pFields))
                                                @foreach($pFields as $field)
                                                @if(!in_array($field->id, $selectedValId))
                                                <option value="{{ $field->id }}">{{ $field->field_name }}</option>
                                                @endif
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-info  ">Add field</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
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

        $(".selectAllCheckbox").click(function() {
            if ($(this).prop('checked') == true) {
                $(".selectCheckbox").prop('checked', true);
            } else {
                $(".selectCheckbox").prop('checked', false);
            }
        });
        $(".selectCheckbox").click(function() {
            if ($(this).prop('checked') == false) {
                $(".selectAllCheckbox").prop('checked', false);
            }
        });

        $(".delete_fields").click(function() {
            $.confirm({
                title: 'Delete fields',
                content: 'Are you sure you want to delete selected fields?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-red',
                        action: function() {
                            var selectedIds = [];
                            var i = 0;
                            $('.selectCheckbox').each(function() {
                                if ($(this).prop('checked') == true) {
                                    selectedIds[i++] = $(this).attr('id').split('__')[1];
                                }
                            });

                            if (selectedIds.length == 0) {
                                $.alert({
                                    // title: 'Alert!',
                                    content: 'No field selected! Please select first',
                                });
                            } else {
                                $.ajax({
                                    type: 'POST',
                                    url: base_url + '/deleteTemplateLandingFields_ajax',
                                    data: {
                                        _token: '<?= csrf_token() ?>',
                                        template_id: '<?= $id ?>',
                                        selectedIds: selectedIds,
                                    },
                                    success: function(data) {
                                        location.reload();
                                    }
                                });
                            }
                            console.log(selectedIds);
                        }
                    },
                    close: function() {}
                }
            });
        });

    });
</script>
@stop