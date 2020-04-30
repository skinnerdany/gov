<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пропуск ФП Дмитрий</title>
</head>
<style>
    .input_block{
        margin-top: 2em;
    }
    label{
        display: block;
    }
</style>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Данные пользователя</legend>
            <div class="input_block">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="input_block">
                <label for="second_name">Фамилия</label>
                <input type="text" name="second_name" id="second_name">
            </div>
            <div class="input_block">
                <label for="passport">Паспорт</label>
                <input type="text" name="passport" id="passport">
            </div>
            <div class="input_block">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="input_block">
                <label for="phone">Телефон</label>
                <input type="text" name="phone" id="phone">
            </div>
            <div class="input_block">
                <label for="inn">ИНН организации</label>
                <input type="text" name="inn" id="inn">
            </div>
            <div class="input_block">
                <label for="organization_name">Название организации</label>
                <input type="text" name="organization_name" id="organization_name">
            </div>
            <div class="input_block">
                <label for="car_number">Номер автомобиля</label>
                <input type="text" name="car_number" id="car_number">
            </div>
            <div class="input_block">
                <label for="social_card">Номер социальной карты</label>
                <input type="text" name="social_card" id="social_card">
            </div>
            <div class="input_block">
                <label for="troika">Номер "Тройки"</label>
                <input type="text" name="troika" id="troika">
            </div>
        </fieldset>
    </form>
</body>
</html>