@extends('admin.layouts.app')
@section('content')
<?php

use App\Model\MapSubGroupOption;
use App\Model\Option;

$li_groupDataFl = 0;
?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> {{ (@$guide->id > 0) ? 'Edit' : 'Add' }} Guide</h3>
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
                                <form action="{{route('guide_store')}}" method="POST" id="band_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <h3 class="heading mb-4">Guide Details</h3>
                                    <div class="row col-md-6">
                                        <input type="hidden" name="id" value="{{@$guide->id}}">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Text Name*</span>
                                                <input type="text" class="form-control" name="text" value="{{@$guide->text}}" />

                                                @if($errors->has('text'))
                                                <div class="error">{{ $errors->first('text') }}</div>
                                                @endif
                                            </div>
                                        </div><br>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Link</span>
                                                <input type="text" class="form-control" name="link" value="{{@$guide->link}}" />
                                                @if(@$guide->link != '')
                                                <a href="{{ URL::to('/').'/..' . @$guide->link }}" target="_blank">
                                                    <i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Open link"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">File</span>
                                                <input type="file" class="form-control" name="PDF_Upload" />


                                                @if(App\Utility::filePathShow(@$guide->PDF_Upload, 'v2_guide_text', 'file') != '')
                                                <a href="{{ App\Utility::filePathShow(@$guide->PDF_Upload, 'v2_guide_text', 'file') }}" target="_blank">
                                                    <i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="View PDF"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="button-action justify-content-end">

                                            <a href="{{route('guide_list' , ['TR' => @$guide->id > 0])}}">
                                                <button type="button" class="btn btn-default  ">Cancel</button>
                                            </a>
                                            <button type="submit" class="btn btn-info  ">{{ (@$guide->id > 0) ? 'Update' : 'Save' }}</button>
                                        </div>

                                    </div>


                                </form>

                                <hr>

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



    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop