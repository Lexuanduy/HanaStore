@extends('admin.layouts.master-login', ['curentPage'=>'login'])
@section('page-title', 'HanaStore - Login')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <form action="/admin/login" method="post">
                    <div class="form-group">
                        <label></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection