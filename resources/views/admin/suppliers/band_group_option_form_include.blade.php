<div id="GroupOptionBox" class="individual-box card card-outline card-info">
    <div class="box card-body">
        <h3 class="heading mb-4"><?= ($optionId == 0) ? 'Create Option' : 'Edit Option' ?></h3> &nbsp;&nbsp;:
        <span data-toggle="tooltip" data-placement="top"
              title="Group name">{{@$la_optionGroup->group_admin_name}}</span>

        <form id="OptionForm" action="{{route('bandGroupOption_store')}}" enctype="multipart/form-data" method="post">
            <div cellpadding="0" cellspacing="0" class="full">
                {{ csrf_field()}}
                <input type="hidden" name="band_id" value="{{$band->id}}">
                <input type="hidden" name="group_id" value="{{@$groupId}}">
                <input type="hidden" name="option_id" value="{{@$optionId}}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="side label-title">Option Name*</div>

                            <input class="form-control" type="text" name="option_name"
                                   value="{{@$la_optionData->option_name}}" class="input">

                            @if($errors->has('option_name'))
                                <div class="error">{{ $errors->first('option_name') }}</div>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="side label-title">Configuration Default</div>
                            <label class="form-control" for="test">
                                <input type="checkbox" id="test"
                                       name="configdefault" {{(@$la_optionData->configdefault == 1) ? 'checked' : ''}}>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="side label-title">Image</div>
                            <div class="row">
                                <div class="col-md-9">
                                    <label class="file-upload-sec">
                                        <input type="file" name="image_url" id="image_url" hidden>
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </label>
                                </div>
                                <div class="col-md-3">
                                        <img src="{{App\Utility::filePathShow(@$la_optionData->image_url, 'v2_option')}}"
                                             id="image_url_pre" alt="#" class="img-fluid">
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="side label-title">Price Modification</div>
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" type="text" name="price_mod"
                                           value="{{@$la_optionData->price_mod}}" class="input"/>
                                </div>
                                <div class="col-6 pl-0">
                                    <select class="form-control" name="price_mod_factor">
                                        <option value="pc" {{(@$la_optionData->price_mod_factor == 'pc') ? 'selected' : ''}}>
                                            %
                                        </option>
                                        <option value="ep" {{(@$la_optionData->price_mod_factor == 'pc') ? 'selected' : ''}}>
                                            exact price
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-1"><em><strong>Price Modification</strong> allows you to specify an
                                    addition to the price of the blind, either percentage of total price, or as
                                    an exact price</em></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="side label-title">EDI Field</div>
                            <input class="form-control" type="text" name="option_edi_field"
                                   value="{{@$la_optionData->option_edi_field}}" class="input">
                            <div class="form-check">
                                <input type="checkbox" value="1"
                                       name="validatetooptonxml"
                                       {{(@$la_optionData->validatetooptonxml == 1) ? 'checked' : ''}}
                                       class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    Validate to XML Options
                                    <span class="edi_code_no" style="margin-left: 0;margin-right: 72px;"></span></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-action">
                    <a href="{{route('band_edit', ['bandId' => $band->id, 'opTR' => $optionId])}}"
                       class="btn btn-default">« Go back</a>
                    <button type="submit" class="btn btn-info ml-auto">Save</button>
                </div>

            </div>
        </form>

    </div>
</div>