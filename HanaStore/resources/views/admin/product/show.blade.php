@extends('admin.layout.app', [
    'currentPage' => 'show',
    'current_menu' => 'product_manager',
    'current_sub_menu' => 'show_item',
])
@section('page-title', 'Show product')
@section('content')
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-6">
             <div class="card " style="width: 50rem;">
                     <img class="img-thumbnail " src="{{$product -> images}}" alt="">
             </div>

         </div>
         <div class="col-md-6">
             <div>
             <h2 class="text-uppercase">{{$product -> name}}</h2>

             </div>

             <div>
                 <a href="" class="badge badge-light">{{$categories -> name}}</a>
                 <a href="" class="badge badge-light">{{$collection -> name}}</a>
             </div>

             <div style="height: 50px;" >
                 <h4 >{{$product -> detail}}</h4>
             </div>
             <div >
                 <h2 >${{$product -> price}}</h2>
             </div>

             <div>
                 <td > @if($product -> status == 1)
                         <h5 class="font-weight-bold" style="color: green">Còn hàng </h5>
                 @elseif($product-> status == 2)
                         <h5 class="font-weight-bold" style="color: red">Hết hàng </h5>
                 @endif </td>
             </div>
         </div>

     </div>

 </div>

@endsection
