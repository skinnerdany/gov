<?php 

 $name = $_POST['name'];
 $second_name = $_POST['second_name'];
 $organization_name = $_POST['organization_name'];
 $createDate = ' ' . date("Y-m-d",$createDate);
 $expireDate = ' ' . date("Y-m-d",$expireDate);

?>


<h2>Ваш мобильный пропуск:</h2>
<p>Вы можете распечатать этот пропуск или сохранить на смартфон.</p>
<br/>
<ul>
    <li>НОМЕР ВАШЕГО ПРОПУСКА:<strong><?php echo ' ' . $pass; ?></strong></li>
    <li>Дата получения:<?php echo $createDate; ?></li>
    <li>Дата окончания:<?php echo $expireDate; ?></li>
    <li>Действителен для: <?php echo $name . ' ' .$second_name ; ?></li>
    <li>Организация: <?php echo $organization_name; ?></li>
</ul>
