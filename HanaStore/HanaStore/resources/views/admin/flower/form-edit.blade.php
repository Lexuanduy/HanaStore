@extends('admin.layouts.master', ['currentPage'=>'form-edit'])
@section('page-title', 'Edit product')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding: 10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" name="form-edit">
                                <input type="hidden" name="id-product-edit">
                                <div class="row">
                                    <div class="form-group col-xs-6 has-warning">
                                        <label class="control-label">{{__('content.ten')}}:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Product name">
                                    </div>
                                    <div class="form-group col-xs-6 has-warning">
                                        <label class="control-label">{{__('content.danh.muc')}}:</label>
                                        <select class="form-control" name="categoryId">
                                            <option value="0" class="form-control" selected>None</option>
                                            {{--@foreach($categories as $item)--}}
                                                {{--<option value="{{$item->id}}" class="form-control">{{$item->name}}</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 has-warning">
                                        <label class="control-label">{{__('content.gia')}}:</label>
                                        <input type="text" name="price" class="form-control" placeholder="Price">
                                        <label class="text-danger"></label>
                                    </div>
                                    <div class="form-group col-xs-6 has-warning">
                                        <label class="control-label">Collection:</label>
                                        <select class="form-control" name="collectionId">
                                            <option value="0" class="form-control" selected>None</option>
                                            {{--@foreach($collections as $item)--}}
                                                {{--<option value="{{$item->id}}" class="form-control">{{$item->name}}</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 has-warning">
                                        <label class="control-label">Sale:</label>
                                        <input type="text" name="sale" class="form-control" placeholder="Sale">
                                    </div>
                                    <div class="form-group col-xs-6 has-warning">
                                        <label class="control-label">{{__('content.thong.tin')}}:</label>
                                        <input type="text" name="description" class="form-control" placeholder="Description">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 has-warning">
                                        <label class="control-label">{{__('content.anh')}}:</label> <br>
                                        <span class="btn btn-default btn-file">
                                        <i class="pe-7s-upload"></i> Choose...<input type="file" name="images" directory multiple>
                                    </span>
                                        <span class="filename text-muted" id="file-name">Nothing selected...</span>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <img src="" id="review-image" class="thumbnail hidden imgAvatar" style="height: 120px;margin-top: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-6 has-warning">
                                        <label class="control-label">{{__('content.chi.tiet')}}:</label>
                                        <textarea name="detail" id="" cols="30" rows="9" class="form-control" placeholder="Something..."></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary" type="submit" style="width: 100px">Save</button>&nbsp;&nbsp;
                                        <button class="btn btn-default" type="reset" style="width: 100px" id="btn-reset">Reset</button>
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