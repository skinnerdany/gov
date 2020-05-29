<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Оформите пропуск</title>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="container w-75 p-3">
            <h2>Запрос цифрового пропуска на передвижение по городу</h2>
            <button type="button" class="btn btn-primary">Покинуть</button>
            <p>Тип цифрового пропуска</p>
            <select class="custom-select">
                <option value="Цифровой пропуск для работающих">Цифровой пропуск для работающих</option>
                <option value="Цифровой пропуск для неработающих">Цифровой пропуск для неработающих</option>
            </select>
            <form class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Фамилия</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Петров" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Имя</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Петр" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Отчество</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Петрович" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Телефон</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="Телефон" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Электронная почта</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Электронная почта" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="customCheckInline1" name="customCheck1" class="custom-control-input">
                    <label class="custom-control-label" for="customCheckInline1">Передвигаюсь на личном или служебном транспорте</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="customCheckInline2" name="customCheck2" class="custom-control-input">
                    <label class="custom-control-label" for="customCheckInline2">Передвигаюсь на общественном транспорте</label>
                </div>
            </form>
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