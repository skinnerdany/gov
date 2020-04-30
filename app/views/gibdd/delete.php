<!DOCTYPE html>
<html>
    <head>
        <noscript>
            <meta http-equiv="refresh" content="1;URL=/user/nojs" />
        </noscript>
        <meta http-equiv="content-type" content="text\html;charset=utf-8" />
        <!-- <script src="/js/jquery.js"></script> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/ivan/style.css" >
    </head>
    <body>

            <?php
            $info = $result? 'Запись удалена': 'Запись не существует';
            ?>
            <div class="container main">
                <div class="row">
                    <div class="col-12 delete text-center">
                    <b><?php echo  "<span>". $info. "</span><br>Вы будете перенаправлены на другую страницу";?></b>
                    </div>
                </div>
            </div>
    </body>
</html>