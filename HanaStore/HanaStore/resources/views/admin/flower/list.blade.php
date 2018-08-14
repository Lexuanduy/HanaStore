@extends('admin.layouts.master', ['currentPage' => 'list-product'])

@section('page-title', 'List product')

@section('content')
    {{--content--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="row">
                                <th>&nbsp;</th>
                                <th class="text-center">{{__('content.ma')}}</th>
                                <th class="text-center">{{__('content.ten')}}</th>
                                <th class="text-center">{{__('content.anh')}}</th>
                                <th class="text-center">{{__('content.gia')}}</th>
                                <th class="text-center">{{__('content.danh.muc')}}</th>
                                <th class="text-center">Sale</th>
                                <th class="text-center">Collection</th>
                                <th class="text-center">{{__('content.ngay.tao')}}</th>
                                <th class="text-center">{{__('content.trang.thai')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach($products as $item)--}}
                                {{--<tr class="row" id="row-item-{{$item->id}}">--}}
                                    {{--<td class="text-center">--}}
                                        {{--<div class="checkbox">--}}
                                            {{--<input id="checkbox{{$item->id}}" type="checkbox"--}}
                                                   {{--class="check-item">--}}
                                            {{--<label for="checkbox{{$item->id}}"></label>--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">{{$item -> id}}</td>--}}
                                    {{--<td class="text-center">{{$item-> name}}</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<div class="card"--}}
                                             {{--style="width: 100px; height: 100px;border-radius: 5px; margin-left: 40px; margin-top: 20px;">--}}
                                            {{--<div style="height: 100px;--}}
                                                    {{--background-image: url('{{asset('img/product/'. $item->images)}}');--}}
                                                    {{--background-size: cover;width: 100px;border-radius: 5px;">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">{{$item-> price}}</td>--}}
                                    {{--<td class="text-center">{{$item->category-> name}}</td>--}}
                                    {{--<td class="text-center">{{$item->sale}}</td>--}}
                                    {{--<td class="text-center">{{$item->collection->name}}</td>--}}
                                    {{--<td class="text-center"> @if($item->status == 1) Còn hàng--}}
                                        {{--@elseif($item-> status == 2) Hết hàng--}}
                                        {{--@endif </td>--}}
                                    {{--<td class="td-actions text-right text-center">--}}
                                        {{--<button type="button" rel="tooltip"--}}
                                                {{--title="{{__('content.tooltip.sua')}}"--}}
                                                {{--class="btn btn-info btn-simple btn-xs btn-edit">--}}
                                            {{--<a href="#"> <i class="fa fa-edit"></i></a>--}}
                                        {{--</button>--}}
                                        {{--<button type="button" rel="tooltip"--}}
                                                {{--title="{{__('content.tooltip.xoa')}}"--}}
                                                {{--class="btn btn-danger btn-simple btn-xs btn-delete"--}}
                                                {{--id="{{$item-> id}}">--}}
                                            {{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}
                                        {{--</button>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="checkbox form-group col-md-2 ">
                                <input id="checkbox-all" type="checkbox" class="form-control">
                                <label for="checkbox-all">{{__('content.tat.ca')}}</label>
                            </div>
                            <div class="form-group col-md-3">
                                <select name="" id="select-action" class="form-control selcls">
                                    <option value="0">{{__('content.chon.phuong.thuc')}}</option>
                                    <option value="1">{{__('content.xoa.muc.da.chon')}}</option>
                                    <option value="2">{{__('content.chuc.nang.khac')}}</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary"
                                        id="btn-apply">{{__('content.thuc.hien')}}</button>
                            </div>
                            <div class="col-md-4 form-group text-center">
                                {{--{{$products->links()}}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--end content--}}
@endsection