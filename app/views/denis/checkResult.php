<?php 
    if(!empty($error)){
        echo '<h2 class="mb-3">Результат проверки цифрового пропуска</h2>';
        echo $error;
        echo '<br><br>';
    } 
    if(!empty($checkData)) {
        echo '<h2 class="mb-3">Результат проверки цифрового пропуска</h2>';
        if($checkData['expire_date'] > time()){
            echo '<p>Статус: Недействителен</p>';
        }
        if($checkData['create_date'] < time() && $checkData['expire_date'] > time()){
            echo '<p>Статус: Действителен c ' .$create_date. ' по ' .$expire_date.'</p>';
        }
        if($checkData['create_date'] > time()){
            echo '<p>Статус: Действителен c ' .$create_date. ' по ' .$expire_date.'</p>';
        }

        $create_date = $checkData['create_date'];
        $expire_date = $checkData['expire_date'];
        $second_name = $checkData['second_name'];
        $name = $checkData['name'];
        $phone = $checkData['phone'];
        $number = $checkData['number'] == "" ? 'НЕТ':$checkData['number'];
        $troika = $checkData['troika'] == null ? 'НЕТ':$checkData['troika'];
        $social_card = $checkData['social_card'] == null ? "НЕТ":$checkData['social_card'];
        $organization = $checkData['organization'] == "" ? 'НЕТ':$checkData['organization'];

        echo '<p>ФИО: ' .$second_name. ' ' .$name. '</p>';
        echo '<p>Телефон: ' .$phone. '</p>';
        echo '<p>Номер автомобиля: ' .$number. '</p>';
        echo '<p>Карта "Тройка": ' .$troika. '</p>';
        echo '<p>Социальная карта: ' .$social_card . '</p>';
        echo '<p>Работодатель: ' .$organization. '</p>';
    }
?>
<a href="index.php?controller=denis&action=createpass" class="btn btn-primary mb-3">Оформить пропуск</a>