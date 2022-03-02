@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>News Letter</h3>
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

                    <div class="card card-outline card-warning p-3">
                        <form action="{{route('newsLetter_store')}}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$newsLetter->template_id }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-title">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{@$newsLetter->title}}">

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- <label class="label-title">Content description</label> -->
                                        <textarea class="form-control ckeditor" name="description" rows="20">{{@$newsLetter->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="button-action">
                                        <a href="{{route('news_letter_list')}}">
                                            <button type="button" class="btn btn-default mr-auto">Go back</button>
                                        </a>
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



@endsection