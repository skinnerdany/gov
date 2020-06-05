<form method="post">
    <div class="card w-50">
        <div class="card-header">
            <input name="newsDate" value=<?php echo date("Y-m-d H:i:s"); ?>>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <input type="text" name="newsTitle" class="w-50">
            </h5>
            <p class="card-text">
                <input type="text" name="newsContent" class="w-50">
            </p>
            <a href="index.php?controller=news&action=show" class="btn btn-primary">К новостям</a>
            <a type="submit" href="index.php?controller=news&action=add" name="go" class="btn btn-success">Добавить</a>
        </div>
    </div>
</form>