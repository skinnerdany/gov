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
    fieldset{
        width: 50%;
        max-width: 350px;
    }
    .btn{
        display: inline-block;
        padding: .5em 1em;
        border: 1px solid #ccc;
        border-radius: 100px;
        background-color: #ccc;
        color: black;
        text-decoration: none;
    }
    .btn:hover{
        opacity: .7;
    }
</style>
<?php 
    $name           = core::app()->input->post['name'] ?? '';
    $second_name    = core::app()->input->post['second_name'] ?? '';
    $sex            = core::app()->input->post['sex'] ?? '';
    $passport       = core::app()->input->post['passport'] ?? '';
    $email          = core::app()->input->post['email'] ?? '';
    $phone          = core::app()->input->post['phone'] ?? '';
    $inn            = core::app()->input->post['inn'] ?? '';
    $organization_name = core::app()->input->post['organization_name'] ?? '';
    $car_number     = core::app()->input->post['car_number'] ?? '';
    $social_card    = core::app()->input->post['social_card'] ?? '';
    $troika         = core::app()->input->post['troika'] ?? '';
?>
<body>
    <?php echo $menu?>
    <form action="/?controller=dmitry&action=buildpass" method="POST">
        <fieldset>
            <legend>Данные пользователя</legend>
            <div class="input_block">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" value="<?php echo $name ?>" required>
            </div>
            <div class="input_block">
                <label for="second_name">Фамилия</label>
                <input type="text" name="second_name" id="second_name" value="<?php echo $second_name ?>" required>
            </div>
            <div class="input_block">
                <p>Пол:</p>
                <label style="display: inline-block">
                    <input type="radio" name="sex" value="1" <?php echo $sex == 1 ? 'checked' : ''?>>М
                </label>
                <label style="display: inline-block">
                    <input type="radio" name="sex" value="0" <?php echo $sex == 0 ? 'checked' : ''?>>Ж
                </label>
            </div>
            <div class="input_block">
                <label for="passport">Паспорт</label>
                <input type="text" name="passport" id="passport" value="<?php echo $passport ?>" required>
            </div>
            <div class="input_block">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $email ?>">
            </div>
            <div class="input_block">
                <label for="phone">Телефон</label>
                <input type="text" name="phone" id="phone" value="<?php echo $phone ?>">
            </div>
            <div class="input_block">
                <label for="inn">ИНН организации</label>
                <input type="text" name="inn" id="inn" required value="<?php echo $inn ?>">
            </div>
            <div class="input_block">
                <label for="organization_name">Название организации</label>
                <input type="text" name="organization_name" id="organization_name" value="<?php echo $organization_name ?>">
            </div>
            <div class="input_block">
                <label for="car_number">Номер автомобиля</label>
                <input type="text" name="car_number" id="car_number" value="<?php echo $car_number ?>">
            </div>
            <div class="input_block">
                <label for="social_card">Номер социальной карты</label>
                <input type="text" name="social_card" id="social_card" value="<?php echo $social_card ?>">
            </div>
            <div class="input_block">
                <label for="troika">Номер "Тройки"</label>
                <input type="text" name="troika" id="troika" value="<?php echo $troika ?>">
            </div>
            <input type="submit" class="btn input_block" value="Получить пропуск" name="go">
            <p><?php echo $error ?? ''?></p>
        </fieldset>
    </form>
</body>
</html>