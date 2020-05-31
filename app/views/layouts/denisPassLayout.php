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
            <h2 class="mb-3">Запрос цифрового пропуска на передвижение по городу</h2>
            <button type="button" class="btn btn-success mb-3">Проверить</button>
            <p>Тип цифрового пропуска</p>
            <select class="custom-select mb-3">
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
                        <label for="validationCustom03">Отчество</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Петрович" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Телефон</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Телефон" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Электронная почта</label>
                        <input type="email" class="form-control" id="validationCustom04" placeholder="Электронная почта" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                </div>
                <p>Документ, удостоверяющий личность</p>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Тип документа</label>
                        <select class="custom-select" id="validationCustom03" placeholder="Тип документа" required>
                            <option value="Цифровой пропуск для работающих">Паспорта гражданина РФ</option>
                        </select>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Номер документа</label>
                        <input type="email" class="form-control" id="validationCustom04" placeholder="Номер документа" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline mb-3">
                    <input type="checkbox" id="customCheckInline1" name="customCheck1" class="custom-control-input" onclick="dynInput(this);">
                    <label class="custom-control-label" for="customCheckInline1">Передвигаюсь на личном или служебном транспорте</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline mb-3">
                    <input type="checkbox" id="customCheckInline2" name="customCheck2" class="custom-control-input" onclick="dynInput(this);">
                    <label class="custom-control-label" for="customCheckInline2">Передвигаюсь на общественном транспорте</label>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom05">Номер водительского удостоверения</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Номер водительского удостоверения" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom06">Государственный номер автомобиля</label>
                        <input type="text" class="form-control" id="validationCustom06" placeholder="Государственный номер автомобиля" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom05">Номер карты "Тройка"</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Номер карты 'Тройка'" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom06">Номер социальной карты</label>
                        <input type="text" class="form-control" id="validationCustom06" placeholder="Номер социальной карты" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom07">Работодатель</label>
                        <input type="text" class="form-control" id="validationCustom07" placeholder="Работодатель" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom08">ИНН организации</label>
                        <input type="text" class="form-control" id="validationCustom08" placeholder="ИНН организации" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline mb-3">
                        <input type="checkbox" id="customCheckInline3" name="customCheck3" class="custom-control-input">
                        <label class="custom-control-label" for="customCheckInline3">Предприятие непрерывного цикла</label>
                    </div>
                </div>
                <p>Срок действия</p>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom09">Дата начала действия</label>
                        <input type="date" class="form-control" id="validationCustom09" placeholder="Дата начала действия" required>
                        <div class="valid-feedback">
                            Заполнено верно!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom10">Дата окончания действия</label>
                        <input type="text" class="form-control" id="validationCustom10" placeholder="Дата окончания действия" value="14.06.2020" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Получить</button>
            </form>
        </div>
    </div>
    <script src="/js/denisScript.js"></script>
</body>

</html>