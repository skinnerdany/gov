<?php 
    if(!empty($error)){
        echo '<h2 class="mb-3">Результат проверки цифрового пропуска</h2>';
        echo $error;
        echo '<br><br>';
    } else {
        echo '<h2 class="mb-3">Результат проверки цифрового пропуска</h2>';
        echo '<p>Статус:</p>';
        echo '<p>ФИО:</p>';
        echo '<p>Телефон:</p>';
        echo '<p>Пропуск действует:</p>';
        echo '<p>Номер автомобиля:</p>';
        echo '<p>Карта "Тройка":</p>';
        echo '<p>Социальная карта:</p>';
    }
?>

<a href="index.php?controller=denis&action=createpass" class="btn btn-primary mb-3">Оформить пропуск</a>