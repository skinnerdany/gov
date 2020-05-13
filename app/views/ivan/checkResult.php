<?php

if(!empty($error)){
    echo "<div class='error_check'>";
    echo "<p><b> {$error}</b> </p>";
    echo "<p><a href='http://project/index.php?controller=ivan&action=checkpass'>Вернуться к проверке</a></p>";
    echo "</div>";
}
if(!empty($checkData)){
    
    $create_date = date("Y-m-d ", $checkData['create_date']);
    $expire_date = date("Y-m-d ", $checkData['expire_date']);
    $text = "Статус";
    if(time()< $checkData['create_date'] ){
        echo "<p class='life_time'>{$text} - <b>пропуск будет активен с {$create_date}</b></p>";
    }
    if( time() > ($checkData['expire_date'] + 60*60*24)){
        echo "<p class='life_time'>{$text} - <b>пропуск просрочен</b></p>";
    }
    if(
        time() > $checkData['create_date'] &&
        time() < ($checkData['expire_date'] + 60*60*24)
     ){
        echo "<p class='life_time'>{$text} - <b>пропуск действителен</b></p>";
    }

    $troika = $checkData['troika']==0 ? "НЕТ":$checkData['troika'];
    $social_card = $checkData['social_card']==0 ? "НЕТ":$checkData['social_card'];
    $car_number = $checkData['car_number']== "" ? "НЕТ":$checkData['car_number'];
    $organization_name = $checkData['organization_name']== "" ? "НЕТ":$checkData['organization_name'];
    $inn = $checkData['inn']== 0 ? "НЕТ":$checkData['inn'];
    $tax_id = $checkData['tax_id']== 0 ? "НЕТ":$checkData['tax_id'];

    echo "<div class='check_pass'>";
    echo "<p><b>Номер пропуска: </b> {$checkData['pass_id']}</p>";
    echo "<p><b>Имя: </b> {$checkData['name']}</p>";
    echo "<p><b>Фамилия: </b> {$checkData['second_name']}</p>";
    echo "<p><b>Паспортные данные: </b> {$checkData['passport']}</p>";
    echo "<p><b>Телефон: </b> {$checkData['phone']}</p>";
    echo "<p><b>Email: </b> {$checkData['email']}</p>";
    echo "<p><b>Карта тройка: </b> {$troika}</p>";
    echo "<p><b>Социальная карта: </b> {$social_card}</p>";
    echo "<p><b>Личное транспортное средство: </b> {$car_number}</p>";
    echo "<p><b>Организация: </b> {$organization_name}</p>";
    echo "<p><b>ИНН организации: </b> {$inn}</p>";
    echo "<p><b>ID организации: </b> {$tax_id}</p>";
    echo "<p><b>Начало действия пропуска: </b> {$create_date}</p>";
    echo "<p><b>Конец действия пропуска: </b> {$expire_date}</p>";
    echo "</div>";

}


