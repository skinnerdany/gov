<h2 class="mb-3">Запрос цифрового пропуска на передвижение по городу</h2>
<a type="button" href="index.php?controller=denis&action=checkpass" class="btn btn-success mb-3">Проверить</a>
<p>Тип цифрового пропуска</p>
<select class="custom-select mb-3">
    <option value="Цифровой пропуск для работающих">Цифровой пропуск для работающих</option>
    <option value="Цифровой пропуск для неработающих">Цифровой пропуск для неработающих</option>
</select>
<form action="post" class="needs-validation" novalidate>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Фамилия</label>
            <input 
                type="text" 
                class="form-control" 
                id="validationCustom01" 
                placeholder="Петров"
                name="second_name"
                required
                value=<?php echo $post['second_name'] ?? "" ?>
            >
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom02">Имя</label>
            <input 
                type="text" 
                class="form-control" 
                id="validationCustom02" 
                placeholder="Петр"
                name="name"
                required
                value=<?php echo $post['name'] ?? "" ?>
            >
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom03">Телефон</label>
            <input 
                type="text" 
                class="form-control" 
                id="validationCustom03" 
                placeholder="Телефон"
                name="phone"
                required
                value=<?php echo $post['phone'] ?? "" ?>
            >
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom04">Электронная почта</label>
            <input 
                type="email" 
                class="form-control" 
                id="validationCustom04" 
                placeholder="Электронная почта"
                name="email"
                required
                value=<?php echo $post['email'] ?? "" ?>
            >
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
    </div>
    <p>Документ, удостоверяющий личность</p>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom05">Тип документа</label>
            <select class="custom-select" id="validationCustom05" placeholder="Тип документа" required>
                <option>Паспорта гражданина РФ</option>
            </select>
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom06">Номер документа</label>
            <input 
                type="text" 
                class="form-control" 
                id="validationCustom06" 
                placeholder="Номер документа"
                name="passport"
                required
                value=<?php echo $post['passport'] ?? "" ?> 
            >
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline mb-3">
        <input type="checkbox" id="customCheckInline1" name="customCheck1" class="custom-control-input">
        <label class="custom-control-label" for="customCheckInline1">Передвигаюсь на личном или служебном транспорте</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline mb-3">
        <input type="checkbox" id="customCheckInline2" name="customCheck2" class="custom-control-input">
        <label class="custom-control-label" for="customCheckInline2">Передвигаюсь на общественном транспорте</label>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom08">Государственный номер автомобиля</label>
            <input 
                type="text" 
                class="form-control" 
                id="validationCustom08" 
                placeholder="Номер автомобиля"
                name="number"
                required
                value=<?php echo $post['number'] ?? "" ?> 
            >
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom09">Номер карты "Тройка"</label>
            <input 
                type="text" 
                class="form-control" 
                id="validationCustom09" 
                placeholder="Номер карты 'Тройка'"
                name="troika"
                required
                value=<?php echo $post['troika'] ?? "" ?>  
            >
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom10">Номер социальной карты</label>
            <input 
                type="text" 
                class="form-control" 
                id="validationCustom10" 
                placeholder="Номер социальной карты"
                name="social_card"
                required
                value=<?php echo $post['social_card'] ?? "" ?>  
            >
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom11">Работодатель</label>
            <input 
                type="text" 
                class="form-control" 
                id="validationCustom11" 
                placeholder="Работодатель"
                name="organization"
                required
                value=<?php echo $post['organization'] ?? "" ?>  
            >
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom12">ИНН организации</label>
            <input 
                type="text" 
                class="form-control" 
                id="validationCustom12" 
                placeholder="ИНН организации"
                name="inn"
                required
                value=<?php echo $post['inn'] ?? "" ?>  
            >
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
            <label for="validationCustom13">Дата начала действия</label>
            <input 
                type="date" 
                class="form-control" 
                id="validationCustom13" 
                placeholder="Дата начала действия"
                name="create_date"
                required
                value=<?php echo $post['create_date'] ?? "" ?>  
            >
            <div class="valid-feedback">
                Заполнено верно!
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom14">Дата окончания действия</label>
            <input 
                type="text" 
                class="form-control" 
                id="validationCustom14" 
                placeholder="Дата окончания действия"
                name="expire_date" 
                value="14.06.2020" 
                readonly
            >
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Получить</button>
</form>