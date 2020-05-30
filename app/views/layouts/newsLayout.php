<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Новости</title>
</head>

<body>
    <div class="container">

        <?php if (isset($_SESSION["message"])) : ?>
            <div class="alert w-50 alert-<?= $_SESSION["msg_type"] ?>">
                <?php
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
                ?>
            </div>
        <?php endif; ?>

        <h2>Новости</h2>
        <p>Добро пожаловать на главную страницу нашего новостного портала!</p>
        <?php echo $content; ?><br>
        © <?php echo date("Y"); ?> Новости портала.
    </div>
</body>

</html>