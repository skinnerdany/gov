<?php
    
/* array (size=14)
  'pass_id' => string 'f51f0ba429d832f028f73d21e3a1b975' (length=32)
  'passport' => string '4508' (length=4)
  'expire_date' => string '1590002336' (length=10)
  'create_date' => string '1588706336' (length=10)
  'name' => string 'DMITRII' (length=7)
  'second_name' => string 'NIKOLAEV' (length=8)
  'email' => string 'bulki86@gmail.com' (length=17)
  'phone' => string '9150348182' (length=10)
  'tax_id' => string '6' (length=1)
  'inn' => string '22838314' (length=8)
  'organization_name' => string 'Резиновые изделия' (length=33)
  'car_number' => string 'cdd1122' (length=7)
  'social_card' => string '5341' (length=4)
  'troika' => string '51234' (length=5) */

  
if(count($data) != 0){

    $name           = $data['name'];
    $second_name    = $data['second_name'];
    $phone          = $data['phone'];
    $email          = $data['email'];
    $social_card    = $data['social_card'] == 0 ? 'Нет' : $data['social_card'];
    $troika         = $data['troika'] == 0 ? 'Нет' : $data['troika'];
    $car_number     = strlen($data['car_number']) == 0 ? 'Нет' : $data['car_number'];
    $expire_date    = date('d.m.y', $data['expire_date']);

?>

    <p>Имя: <?php echo $name?></p>
    <p>Фамилия: <?php echo $second_name?></p>
    <p>Телефон: <?php echo $phone?></p>
    <p>Email: <?php echo $email?></p>
    <p>Социальная карта: <?php echo $social_card?></p>
    <p>Тройка: <?php echo $troika?></p>
    <p>Автомобиль: <?php echo $car_number?></p>
    <p>Действителен до <?php echo $expire_date?></p>


<?php 
}