<?php 

// $name = $_POST['name'];
// $second_name = $_POST['second_name'];
// $organization_name = $_POST['organization_name'];
 $createDateFormat = ' ' . date("Y-m-d",$createDate);
 $expireDateFormat = ' ' . date("Y-m-d",$expireDate);

?>


<h2>Ваш пропуск действителен:</h2>
<p>Вы можете распечатать этот пропуск или сохранить на смартфон.</p>
<br/>
<ul>
    <li>НОМЕР ВАШЕГО ПРОПУСКА:<strong><?php echo ' ' . $passvalue; ?></strong></li>
    <li>Дата получения:<?php echo $createDateFormat; ?></li>
    <li>Дата окончания:<?php echo $expireDateFormat; ?></li>
    <li>Действителен для: <?php echo $name . ' ' .$second_name ; ?></li>
    <li>Организация: <?php echo $organization_name; ?></li>
</ul>

