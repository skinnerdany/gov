<form method="get">
    <div class="card w-50">
        <div class="card-header">
            <input name="newsDate" value=<?php echo date("Y-m-d H:i:s"); ?>>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <input type="text" name="newsTitle" class="w-50" value="Заголовок">
            </h5>
            <p class="card-text">
                <textarea type="text" name="newsContent" class="w-50" placeholder="Краткое описание"></textarea>
            </p>
            <a href="index.php?controller=news&action=show" class="btn btn-primary">К новостям</a>
            <a href="index.php?controller=news&action=update" class="btn btn-warning">Обновить</a>
        </div>
    </div>
</form>