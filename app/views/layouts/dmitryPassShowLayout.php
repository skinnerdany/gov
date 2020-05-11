<?php echo $menu?>
<form action="" method="get">
    <input type="text" placeholder="Введите номер пропуска" name="pass_id">
    <input type="submit" value="Найти" name="go">
    <p style = "color: red"> <?php echo $error; ?></p>
</form>


<?php echo $data ?? ''?>