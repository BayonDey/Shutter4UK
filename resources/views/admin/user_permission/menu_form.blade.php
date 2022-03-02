@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> {{(@$menu->id > 0) ? 'Edit menu' : 'Add menu'}}</h3>
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
                        <form action="{{route('storeMenu')}}" method="POST" id="menu_form">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$menu->id}}">
                            <div class="individual-box card card-outline card-info">
                                <div class="card-body">
                                    <h3 class="heading">Menu Details</h3>
                                    <div class="row">
                                        <div class="row col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Menu name</span>
                                                    <input type="text" class="form-control" value="<?= @$user->sections ?>" name="sections" />

                                                    @if($errors->has('sections'))
                                                    <div class="error">{{ $errors->first('sections') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Section key</span>
                                                    <input type="text" class="form-control" value="<?= @$user->section_key ?>" name="section_key" />

                                                    @if($errors->has('section_key'))
                                                    <div class="error">{{ $errors->first('section_key') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">URL</span>
                                                    <input type="text" class="form-control  " name="url" />

                                                    @if($errors->has('url'))
                                                    <div class="error">{{ $errors->first('url') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Parent menu</span>
                                                    <select class="form-control  " name="parent_id">
                                                        <option value="0">Select...</option>
                                                        @if(count($parentMenus) > 0)
                                                        @foreach($parentMenus as $menu)
                                                        <option value="{{$menu->id}}">{{$menu->sections}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                    @if($errors->has('parent_id'))
                                                    <div class="error">{{ $errors->first('parent_id') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Icon class</span>
                                                    <input type="text" class="form-control  " name="icon_class" />

                                                    @if($errors->has('icon_class'))
                                                    <div class="error">{{ $errors->first('icon_class') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="button-action justify-content-end">
                                        <a href="{{route('menu_list' )}}"><button type="button" class="btn btn-default mr-2">Cancel</button></a>
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