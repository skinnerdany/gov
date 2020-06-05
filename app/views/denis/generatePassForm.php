<?php
    $worker = isset($post['worker']) && $post['worker'] === 'on' ? 'checked' : ''; 
    $notworker = isset($post['notworker']) && $post['notworker'] === 'on' ? 'checked' : ''; 
    $const = isset($post['type_pass']) && $post['type_pass'] === 'const' ? 'on' : ''; 
    $temp = isset($post['type_pass']) && $post['type_pass'] === 'temp' ? 'on' : ''; 
?>

<h2 class="mb-3">Запрос цифрового пропуска на передвижение по городу</h2>
<a type="button" href="index.php?controller=denis&action=checkpass" class="btn btn-success mb-3">Проверить</a>
<p>Тип цифрового пропуска</p>
<select class="custom-select mb-3" id="type_pass" name="type_pass">
    <option value="const" value=<?php echo $const ?? 'on' ?>>Цифровой пропуск для работающих</option>
    <option value="temp" value=<?php echo $temp ?? 'on' ?>>Цифровой пропуск для неработающих</option>
</select>
<form method="post" class="needs-validation" novalidate>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="second_name">Фамилия</label>
            <input type="text" class="form-control" id="second_name" placeholder="Петров" name="second_name" required value=<?php echo $post['second_name'] ?? "" ?>>
            <div class="invalid-feedback">
                Заполните поле!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" placeholder="Петр" name="name" required value=<?php echo $post['name'] ?? "" ?>>
            <div class="invalid-feedback">
                Заполните поле!
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" id="phone" placeholder="Телефон" name="phone" required value=<?php echo $post['phone'] ?? "" ?>>
            <div class="invalid-feedback">
                Введите 10 цифр телефона!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="email">Электронная почта</label>
            <input type="email" class="form-control" id="email" placeholder="Электронная почта" name="email" required value=<?php echo $post['email'] ?? "" ?>>
            <div class="invalid-feedback">
                Введите верный email!
            </div>
        </div>
    </div>
    <p>Документ, удостоверяющий личность</p>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="document_type">Тип документа</label>
            <select class="custom-select" id="document_type" placeholder="Тип документа" required>
                <option>Паспорта гражданина РФ</option>
            </select>
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="passport">Номер документа</label>
            <input type="text" class="form-control" id="passport" placeholder="Номер документа" name="passport" required value=<?php echo $post['passport'] ?? "" ?>>
            <div class="invalid-feedback">
                Введите 9 цифр паспорта!
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check mb-3">
            <input type="checkbox" id="worker" name="workerCheck" class="form-check-input" required value=<?php echo $post['workerCheck'] ?? "" ?>>
            <label class="form-check-label" for="worker" style="cursor: pointer;">Передвигаюсь на личном или служебном транспорте</label>
            <div class="invalid-feedback">
                Выберите способ передвижения!
            </div>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" id="notworker" name="notworkerCheck" class="form-check-input" required value=<?php echo $post['notworkerCheck'] ?? "" ?>>
            <label class="form-check-label" for="notworker" style="cursor: pointer;">Передвигаюсь на общественном транспорте</label>
            <div class="invalid-feedback">
                Выберите способ передвижения!
            </div>
        </div>
    </div>
    <div class="form-row" id="personal" style="display: none;">
        <div class="col-md-6 mb-3">
            <label for="number">Государственный номер автомобиля</label>
            <input type="text" class="form-control" id="number" placeholder="Номер автомобиля" name="number" required value=<?php echo $post['number'] ?? "" ?>>
            <div class="invalid-feedback">
                Введите верный номер автомобиля!
            </div>
        </div>
    </div>
    <div class="form-row" id="public" style="display: none;">
        <div class="col-md-6 mb-3">
            <label for="troika">Номер карты "Тройка"</label>
            <input type="text" class="form-control" id="troika" placeholder="Номер карты 'Тройка'" name="troika" required value=<?php echo $post['troika'] ?? "" ?>>
            <div class="invalid-feedback">
                Введите 7 цифр!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="social_card">Номер социальной карты</label>
            <input type="text" class="form-control" id="social_card" placeholder="Номер социальной карты" name="social_card" required value=<?php echo $post['social_card'] ?? "" ?>>
            <div class="invalid-feedback">
                Введите 7 цифр!
            </div>
        </div>
    </div>
    <div class="form-row" id="const_pass" style="display: flex;">
        <div class="col-md-6 mb-3">
            <label for="organization">Работодатель</label>
            <input type="text" class="form-control" id="organization" placeholder="Работодатель" name="organization" required value=<?php echo $post['organization'] ?? "" ?>>
            <div class="invalid-feedback">
                Введите свою организацию!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="inn">ИНН организации</label>
            <input type="text" class="form-control" id="inn" placeholder="ИНН организации" name="inn" required value=<?php echo $post['inn'] ?? "" ?>>
            <div class="invalid-feedback">
                Введите верный ИНН!
            </div>
        </div>
    </div>
    <p>Срок действия</p>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="create_date">Дата начала действия</label>
            <input type="date" class="form-control" id="create_date" placeholder="Дата начала действия" name="create_date" required value=<?php echo $post['create_date'] ?? "" ?>>
            <div class="invalid-feedback">
                Выберите дату начала действия!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="expire_date">Дата окончания действия</label>
            <input type="date" class="form-control" id="expire_date" placeholder="Дата окончания действия" name="expire_date" required value=<?php echo $post['create_date'] ?? "" ?>>
            <div class="invalid-feedback">
                Проверьте тип пропуска!
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-3" name="go">Получить</button>
</form>