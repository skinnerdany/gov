
<!DOCTYPE html>
<html>
    <head>
        <noscript>
            <meta http-equiv="refresh" content="1;URL=/user/nojs" />
        </noscript>
        <meta http-equiv="content-type" content="text\html;charset=utf-8" />
        <!-- <script src="/js/jquery.js"></script> -->
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/ivan/style.css" >
    </head>
    <body>
    <div class="container main">
    <div class="row">
        <div class="col-12">
        <h1>Выдача и проверка пропусков</h1>
        </div>
    </div>
    <div class="row menu" >
        <div class="col-12">
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['action'] === 'getpass'? 'active' :'' ?>  " href="?controller=ivan&action=getpass">Получить пропуск</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['action'] === 'checkpass'? 'active' :'' ?>" href="?controller=ivan&action=checkpass">Проверить пропуск</a>
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
    <script src="/js/ivanScript.js"></script>
</html>