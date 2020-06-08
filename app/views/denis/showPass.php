<h2 class="mb-3">Ваш персональный пропуск</h2>
<p><?php if(empty($passData)){
        echo '<p> Ошибка оформления пропуска </p>';
    } 
    echo $passData;
    ?>
</p>
<a href="index.php?controller=denis&action=createpass" class="btn btn-primary mb-3">Оформить пропуск</a>