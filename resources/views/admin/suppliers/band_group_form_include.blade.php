<div id="BandsGroupBox" class="individual-box card card-outline card-info">

    <div class="box card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="heading"><?= ($grId == 0) ? 'Create New Group' : 'Edit Group' ?></h3>
            <a href="{{route('band_edit',['bandId'=>$band->id])}}" class="btn btn-default">
                <i class="fas fa-angle-double-left"></i> Go Back</a>
        </div>
        <div id="NewGroup">
            <form id="NewGroupForm" action="{{route('bandGroup_store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field()}}
                <input type="hidden" name="band_id" value="{{$band->id}}">
                <input type="hidden" name="group_id" value="{{@$la_groupData->group_id}}">
                <input type="hidden" name="parentOptionId" value="{{@$parentOptionId}}">


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <span class="label-title">Title* </span>
                            <input type="text" name="group_title" class="form-control " value="{{@$la_groupData->group_title}}">
                            @if($errors->has('group_title'))
                            <div class="error">{{ $errors->first('group_title') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="tooltip-use-only">
                                <span class="label-title">TAdmin Name<span class="text-red">*</span> </span>
                                <i class="fas fa-question-circle ttIcon" data-toggle="tooltip" data-placement="top" title="Note: The admin name is for use only by the admin to
                                    tell different groups apart that may have the same
                                    name, but contain different options (eg. Topical
                                    Blinds Shapes)"></i>
                            </div>
                            <input type="text" name="group_admin_name" class="form-control" value="{{@$la_groupData->group_admin_name}}">

                            @if($errors->has('group_admin_name'))
                            <div class="error">{{ $errors->first('group_admin_name') }}</div>
                            @endif
                        </div>
                    </div>

                    @if($grId > 0)
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="tooltip-use-only">
                                <span class="label-title text-red">XML Order Details Mapping </span>
                                <i class="fas fa-question-circle ttIcon" data-toggle="tooltip" data-placement="top" title="Note: If box checked then this group maps to EDI Order Details Section of
                                            XML. (Fabric Description &amp; Fabric Code)"></i>
                            </div>
                            <label class="form-control m-0 font-weight-normal">
                                <input type="checkbox" name="group_isatlas" {{  (@$la_groupData->group_isatlas == 1) ? 'checked' : '' }} > Tropical Atlas Digital
                                Print Blinds</label>
                        </div>

                    </div>
                    @endif

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="tooltip-use-only">
                                <span class="label-title">Group Type</span>
                                <i class="fas fa-question-circle ttIcon" data-toggle="tooltip" data-placement="top" title="
Note: There should only be one Width group type and one Height group type per band.
                                Please create a
                                maximum of one of each of these group types for this band."></i>
                            </div>

                            <select name="group_type" class="form-control select2 ">
                                <option value="Options" {{(@$la_groupData->group_type == 'Options') ? 'selected' : ''}}>
                                    Options
                                </option>
                                @if(@$parentOptionId == '')
                                <option value="Text" {{(@$la_groupData->group_type == 'Text') ? 'selected' : ''}}>
                                    Text
                                </option>
                                <option value="Width" {{(@$la_groupData->group_type == 'Width') ? 'selected' : ''}}>
                                    Width
                                </option>
                                <option value="Height" {{(@$la_groupData->group_type == 'Height') ? 'selected' : ''}}>
                                    Height
                                </option>
                                @endif
                            </select>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="tooltip-use-only">
                                <span class="label-title">Pre Price</span>
                                <i class="fas fa-question-circle ttIcon" data-toggle="tooltip" data-placement="top" title="Note: Tick the 'Pre Price' check box if you want to display this group when the page
                        loads. Do not tick
                        the check box if you want to display this group after the 'get price' button has
                        been
                        pressed."></i>
                            </div>

                            <label class="form-control m-0 font-weight-normal">
                                <input type="checkbox" name="pre_price" {{(@$la_groupData->pre_price == 1) ? 'checked' : ''}}>
                                Pre Price</label>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <span class="label-title">Popup URL</span>
                            <input type="text" name="popup_url" class="form-control  " value="{{@$la_groupData->popup_url}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            <span class="label-title">EDI Field</span>

                            <input type="text" name="group_edi_field" class="form-control  " value="{{@$la_groupData->group_edi_field}}">
                        </div>
                    </div>
                    @if($grId > 0)
                    <div class="col-md-4">
                        <div class="form-group">
                            <span class="label-title">Choice_</span>
                            <input type="text" name="choice_xml" value="{{@$la_groupData->choice_xml}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <span class="label-title">OptionName_</span>
                            <input type="text" name="optionname_xml" value="{{@$la_groupData->optionname_xml}}" class="form-control">
                        </div>
                    </div>

                    @endif

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="tooltip-use-only">
                                <span class="label-title">Popup Image </span>
                                <i class="fas fa-question-circle ttIcon" data-toggle="tooltip" data-placement="top" title="Note: image above required to enable sub option pop
                            up in front end"></i>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label class="file-upload-sec ">
                                        <input type="file" name="pop_image" id="pop_image" accept="image/*" hidden>
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </label>
                                </div>
                                <div class="col-md-5">
                                    <img src="{{App\Utility::filePathShow(@$la_groupData->pop_image, 'v2_group')}}" id="pop_image_pre" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <span class="label-title">Upload PDF Image</span>
                            <div class="row">
                                <div class="col-md-7">
                                    <label class="file-upload-sec ">
                                        <input type="file" name="UploadedPDF_File" id="UploadedPDF_File" accept="image/*" hidden>
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </label>
                                </div>
                                <div class="col-md-5">
                                    <img src="{{App\Utility::filePathShow(@$la_groupData->UploadedPDF_File, 'v2_group')}}" id="UploadedPDF_File_pre" alt="#" class="img-fluid">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <span class="label-title">Text For PDF</span>
                            <input type="text" name="textforpdf" class="form-control  " value="{{@$la_groupData->textforpdf}}">
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <span class="label-title">Description</span>
                            <textarea name="description" class="form-control ckeditor " rows="2">{{@$la_groupData->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="button-action mb-3">
                            <a href="{{route('band_edit',['bandId'=>$band->id])}}" class="btn btn-default mr-auto ">
                                Cancel
                            </a>
                            <input type="submit" class='btn btn-info' value="save">
                        </div>
                    </div>
                </div>
            </form>

            <h3 class="heading mb-4">Or Import A Group</h3>
            <div id="ImportGroup">
                <form id="ImportGroupForm" action="{{route('importGroupToBand')}}" method="post">
                    {{ csrf_field()}}

                    <div class="form-inline" style="align-items: inherit">
                        <input type="hidden" name="band_id" value="{{$band->id}}">
                        <select class='form-control select2' name="group_id">
                            <option value="">Please Select...</option>
                            @foreach($allGroup as $group)
                            <option value="{{$group->group_id}}">{{$group->group_admin_name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Import</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- <iframe frameborder="0" id="AddPopupForm_target" name="AddPopupForm_target" src="#" style="width:500;height:400;border:0px solid #fff;display:none;"></iframe> -->
    </div>
</div>