@extends('admin.layout.master')
@section('page-title','List Collection')
@section('content')
    <table class="table table-striped">
        <thead>
        <tr class="row">
            <th class="col-md-1"></th>
            <th class="col-md-1">{{__('Id')}}</th>
            <th class="col-md-2">{{__('Image')}}</th>
            <th class="col-md-2">{{__('Collection')}}</th>
            <th class="col-md-3">{{__('Description')}}</th>
            <th class="col-md-2">{{__('Action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($collection as $item)
            <tr class="row" id="row-item-{{$item->id}}">
                <td class="col-md-1 text-center">
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="check" > <span class="label-text"></span>
                        </label>
                    </div>
                </td>
                <td class="col-md-1">{{$item->id}}</td>
                <td class="col-md-2">
                    <div class="card"
                         style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
                    </div>
                </td>
                <td class="col-md-2">{{$item->name}}</td>
                <td class="col-md-3">{{$item->description}}</td>
                <td class="col-md-2">
                    <a href="#" class="fas fa-edit fa-2x " style="margin-right: 15px;"></a>
                    <a href="#" id="{{$item-> id}}" class="fas fa-trash-alt fa-2x"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection