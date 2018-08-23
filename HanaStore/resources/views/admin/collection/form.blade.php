@extends('admin.layout.master', [
    'currentPage' => 'form',
    'current_menu' => 'collection_manager',
    'current_sub_menu' => 'create_new',
])
@section('page-title', 'Create New Collection ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--main form -->
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Vui lòng sửa các lỗi bên dưới và thử lại.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="/admin/collection" class="form-horizontal bg-info"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-header card-header-text text-center" data-background-color="green">
                        <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> Create Collection</h4>
                    </div>

                    <div class="card-content">
                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Name</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating" {{$errors->has('name')?' has-error':''}}>
                                    <input type="text" name="name" class="form-control" required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Upload image</label>
                            <div class="form-group">
                                <div class="row ml-1 custom-file">
                                    <input type="file" name="images" class="mr-2"><span>Choose file...</span>
                                    @if($errors->has('images'))
                                        <label class="text-danger">*{{$errors->first('images')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Description</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <input type="text" name="description" class="form-control" required>
                                    @if($errors->has('description'))
                                        <label class="text-danger">*{{$errors->first('description')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" value="Submit" class="btn btn-fill btn-instagram">Create
                                    <div class="ripple-container"></div>
                                </button>
                                <button type="reset" value="Reset" class="btn btn-fill btn-danger">Reset
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--<style>--}}
        {{--/*basic settings */--}}

        {{--a:focus {--}}
            {{--outline: none !important;--}}
            {{--outline-offset: none !important;--}}
        {{--}--}}

        {{--body {--}}
            {{--background: #f5f6f5;--}}
            {{--color: #333;--}}
        {{--}--}}

        {{--/* helper classses */--}}

        {{--/* input [type = file]--}}
        {{------------------------------------------------- */--}}

        {{--input[type=file] {--}}
            {{--display: block !important;--}}
            {{--right: 1px;--}}
            {{--top: 1px;--}}
            {{--height: 34px;--}}
            {{--opacity: 0;--}}
            {{--width: 100%;--}}
            {{--background: none;--}}
            {{--position: absolute;--}}
            {{--overflow: hidden;--}}
            {{--z-index: 2;--}}
        {{--}--}}

        {{--.control-fileupload {--}}
            {{--display: block;--}}
            {{--border: 1px solid #d6d7d6;--}}
            {{--background: #FFF;--}}
            {{--border-radius: 4px;--}}
            {{--width: 100%;--}}
            {{--height: 36px;--}}
            {{--line-height: 36px;--}}
            {{--padding: 0px 10px 2px 10px;--}}
            {{--overflow: hidden;--}}
            {{--position: relative;--}}


        {{--&:before, input, label {--}}
             {{--cursor: pointer !important;--}}
         {{--}--}}
        {{--/* File upload button */--}}
        {{--&:before {--}}
             {{--/* inherit from boostrap btn styles */--}}
             {{--padding: 4px 12px;--}}
             {{--margin-bottom: 0;--}}
             {{--font-size: 14px;--}}
             {{--line-height: 20px;--}}
             {{--color: #333333;--}}
             {{--text-align: center;--}}
             {{--text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);--}}
             {{--vertical-align: middle;--}}
             {{--cursor: pointer;--}}
             {{--background-color: #f5f5f5;--}}
             {{--background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);--}}
             {{--background-repeat: repeat-x;--}}
             {{--border: 1px solid #cccccc;--}}
             {{--border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);--}}
             {{--border-bottom-color: #b3b3b3;--}}
             {{--border-radius: 4px;--}}
             {{--box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);--}}
             {{--transition: color 0.2s ease;--}}

             {{--/* add more custom styles*/--}}
             {{--content: 'Browse';--}}
             {{--display: block;--}}
             {{--position: absolute;--}}
             {{--z-index: 1;--}}
             {{--top: 2px;--}}
             {{--right: 2px;--}}
             {{--line-height: 20px;--}}
             {{--text-align: center;--}}
         {{--}--}}
        {{--&:hover, &:focus {--}}
        {{--&:before {--}}
             {{--color: #333333;--}}
             {{--background-color: #e6e6e6;--}}
             {{--color: #333333;--}}
             {{--text-decoration: none;--}}
             {{--background-position: 0 -15px;--}}
             {{--transition: background-position 0.2s ease-out;--}}
         {{--}--}}
        {{--}--}}

        {{--label {--}}
            {{--line-height: 24px;--}}
            {{--color: #999999;--}}
            {{--font-size: 14px;--}}
            {{--font-weight: normal;--}}
            {{--overflow: hidden;--}}
            {{--white-space: nowrap;--}}
            {{--text-overflow: ellipsis;--}}
            {{--position: relative;--}}
            {{--z-index: 1;--}}
            {{--margin-right: 90px;--}}
            {{--margin-bottom: 0px;--}}
            {{--cursor: text;--}}
        {{--}--}}
        {{--}--}}
    {{--</style>--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
            {{--<!--main form -->--}}
            {{--<div class="card">--}}
                {{--@if ($errors->any())--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--Vui lòng sửa các lỗi bên dưới và thử lại.--}}
                        {{--<ul>--}}
                            {{--@foreach ($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--<form method="POST" action="/admin/collection" class="form-horizontal bg-info"--}}
                      {{--enctype="multipart/form-data">--}}
                    {{--{{csrf_field()}}--}}
                    {{--<div class="card-header card-header-text text-center" data-background-color="green">--}}
                        {{--<h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> Create collection </h4>--}}
                    {{--</div>--}}

                    {{--<!--form edit flowers-->--}}
                    {{--<div class="card-content">--}}
                        {{--<div class="row">--}}
                            {{--<label class="col-sm-2 label-on-left" for="inputSuccess">Name</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<div class="form-group label-floating" {{$errors->has('name')?' has-error':''}}>--}}
                                    {{--<input type="text" name="name" class="form-control" required>--}}
                                    {{--<span class="material-input"></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row">--}}
                                                     {{--<label class="col-sm-2 label-on-left" for="inputSuccess">Image</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<div class="form-group label-floating">--}}
                                    {{--<label class="btn btn-default">--}}
                                        {{--Chọn file <input type="file" name="images" class="form-control" required>--}}
                                        {{--<span >   <input type="file"></span>--}}
                                    {{--</label>--}}
                                    {{--<input type="file">--}}

                                    {{--<span class="control-fileupload">--}}
                                    {{--<label for="file" >Choose a file :</label>--}}
                                        {{--<input type="file" id="file">--}}
                                      {{--</span>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row">--}}
                            {{--<label class="col-sm-2 label-on-left" for="inputSuccess">Description</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<div class="form-group label-floating">--}}
                                    {{--<input type="text" name="description" class="form-control" required>--}}
                                    {{--@if($errors->has('description'))--}}
                                        {{--<label class="text-danger">*{{$errors->first('description')}}</label>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-sm-2"></div>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<button type="submit" value="Submit" class="btn btn-fill btn-instagram">Create--}}
                                    {{--<div class="ripple-container"></div>--}}
                                {{--</button>--}}
                                {{--<button type="reset" value="Reset" class="btn btn-fill btn-danger">Reset--}}
                                    {{--<div class="ripple-container"></div>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<script>--}}
        {{--$(function() {--}}
            {{--$('input[type=file]').change(function(){--}}
                {{--var t = $(this).val();--}}
                {{--var labelText = 'File : ' + t.substr(12, t.length);--}}
                {{--$(this).prev('label').text(labelText);--}}
            {{--})--}}
        {{--});--}}
    {{--</script>--}}
@endsection
