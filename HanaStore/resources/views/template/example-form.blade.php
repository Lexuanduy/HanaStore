<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Example Form</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form-example.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
              integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <script src="{{asset('js/app.js')}}"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Example Modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Example</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--form example include email, password, text area, check box and radios button-->
                <div class="col-md-8">
                    <form action="/form/example" method="GET">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputTextField4" class="col-sm-2 col-form-label">Bio</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control"placeholder="Bio"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputTextField4" class="col-sm-2 col-form-label">Bio</label>
                            <div class="col-sm-10">
                                <select class="custom-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputTextField4" class="col-sm-2 col-form-label">Checkout</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check" checked> <span class="label-text">Option 01</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check"> <span class="label-text">Option 02</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check"> <span class="label-text">Option 03</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check" disabled> <span class="label-text">Option 04</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputTextField4" class="col-sm-2 col-form-label">Radios</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <label class="toggle">
                                        <input type="radio" name="toggle" checked> <span class="label-text">Option 01</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="toggle">
                                        <input type="radio" name="toggle"> <span class="label-text">Option 02</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="toggle">
                                        <input type="radio" name="toggle"> <span class="label-text">Option 03</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="toggle">
                                        <input type="radio" name="toggle" disabled> <span class="label-text">Option 04</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Buy Flower now!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
