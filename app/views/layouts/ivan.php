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
    <div class="container main">
    <div class="row">
        <div class="col-12">
        <h1>Таблица данных ГИБДД</h1>
        </div>
    </div>
    <div class="row menu" >
        <div class="col-12">
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="index.php?controller=gibdd&action=add">Добавить</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index.php?controller=gibdd&action=show">Посмотреть</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=gibdd&action=search">Поиск</a>
            </li> 
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php echo $content ?>
        </div>

    </div>

</div>

        
    </body>
</html>