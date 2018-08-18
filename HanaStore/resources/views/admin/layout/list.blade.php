@extends('admin.layout.master', ['currentPage' => 'list'])
@section('page-title', 'List products')
@section('content')
    <div class="bs-example">
        <div class="row">
            <div class="col-xs-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search&hellip;">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-outline-primary">Go</button>
                    </span>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Row</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>John</td>
                <td>Carter</td>
                <td>johncarter@mail.com</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Peter</td>
                <td>Parker</td>
                <td>peterparker@mail.com</td>
            </tr>
            <tr>
                <td>3</td>
                <td>John</td>
                <td>Rambo</td>
                <td>johnrambo@mail.com</td>
            </tr>
            </tbody>
        </table>
    </div>
    <style type="text/css">
        .bs-example {
            margin: 20px;
        }
    </style>
@endsection
