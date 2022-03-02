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
                        <div class="col-sm-8">
                            <h3> Manage Homepage Slide</h3>
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

            {{--main details--}}
            <div class="spec-details">
                <div class="individual-box card card-outline card-warning">
                    <div class="card-body">
                        <a href="{{route('blinds_glossary')}}" class="btn btn-info mb-3">
                            <i class="fas fa-angle-double-left"></i> Go Back </a>

                        <form action="{{route('blindsGlossary_child_save')}}" method="POST" id="band_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$glossary->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="label-title">Title</span>
                                        <input type="text" name="title" class="form-control" value="{{@$glossary->title}}">
                                        @if($errors->has('title'))
                                        <div class="error">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="label-title">Description</span>
                                        <textarea name="description" cols="30" rows="20" class="form-control ckeditor">{{@$glossary->description}}</textarea>
                                        @if($errors->has('description'))
                                        <div class="error">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="button-action">
                                        <a href="{{route('blinds_glossary')}}"><button type="button" class="btn btn-default mr-auto">Cancel</button></a>
                                        <button type="submit" class="btn btn-info">Save</button>
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