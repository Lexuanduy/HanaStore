<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{--CSS form checkbox & radios--}}
    <link href="{{ asset('css/form.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container py-3">
    <div class="row">
        <div class="mx-auto col-sm-6">
            <!--form new flowers-->
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0"><i class="fa fa-pagelines fa-2x text-danger"></i> New Flowers</h4>
                </div>

                <!--main form -->
                <div class="card-body">
                    <form class="needs-validation" role="form" novalidate>
                        <div class="form-group mb-3">
                            <label class="control-label" for="inputSuccess">Name</label>
                            <div class="input-group">
                                <div class="form-group input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>

                        <!-- props name of categories by id-->
                        <div class="form-group mb-3">
                            <label>Category</label>
                            <select class="form-control" required>
                                <option value="">Open this select menu</option>
                                <option value="1">Hoa sinh nhật</option>
                                <option value="2">Hoa khai trương</option>
                                <option value="3">Hoa giỏ</option>
                                <option value="4">Hoa nhập khẩu</option>
                                <option value="5">Hoa bó</option>
                                <option value="6">Hoa cưới</option>
                                <option value="7">Hoa chúc mừng</option>
                            </select>
                            <div class="invalid-feedback">
                                Please choose a category.
                            </div>
                        </div>
                        <!-- props name of categories by id-->

                        <!-- props name of collections by id-->
                        <div class="form-group mb-3">
                            <label>Collection</label>
                            <select class="form-control" required>
                                <option value="">Open this select menu</option>
                                <option value="1">Xuân - Spring</option>
                                <option value="2">Hạ - Summer</option>
                                <option value="3">Thu - Autumn</option>
                                <option value="4">Đông - Winter</option>
                            </select>
                            <div class="invalid-feedback">
                                Please choose a collection.
                            </div>
                        </div>
                        <!-- props name of collections by id-->

                        <div class="form-group mb-3">
                            <label class="control-label" for="inputError">Price</label>
                            <div class="input-group">
                                <input type="text" class="form-control" required>
                                <div class="form-group input-group-prepend">
                                    <span class="input-group-text">VND</span>
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a price.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" required>
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">
                                    Please choose an image.
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label" for="inputWarning">Sale</label>
                            <div class="input-group">
                                <input type="text" class="form-control" required>
                                <div class="form-group input-group-prepend">
                                    <span class="input-group-text">%</span>
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a sale.
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <input type="text" class="form-control" required>
                            <div class="invalid-feedback">
                                Please choose a description.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail</label>
                            <textarea class="form-control" rows="3" required></textarea>
                            <div class="invalid-feedback">
                                Please choose a detail.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Checkboxes</label>
                            <div class="mb-3">
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check" checked required> <span class="label-text">Option 01</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check" required> <span class="label-text">Option 02</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check" required> <span class="label-text">Option 03</span>
                                    </label>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Please choose at least one choice.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Radio Buttons</label>
                            <div class="form-check">
                                <label class="toggle">
                                    <input type="radio" name="toggle" checked required> <span class="label-text">Option 01</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="toggle">
                                    <input type="radio" name="toggle" required> <span class="label-text">Option 02</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="toggle">
                                    <input type="radio" name="toggle" required> <span class="label-text">Option 03</span>
                                </label>
                            </div>
                            <div class="invalid-feedback">
                                Please choose a choice.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</body>
</html>
